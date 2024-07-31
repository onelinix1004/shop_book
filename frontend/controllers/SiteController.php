<?php

namespace frontend\controllers;

use Yii;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\Category;
use backend\models\Product;
use backend\models\Contact;
use frontend\components\Cart;
use backend\models\Comment;
use backend\models\Review;
use backend\models\View;
use frontend\modes\CommentForm;

/**
 * Site controller handles various actions related to site functionality such as viewing products,
 * user authentication, and contact forms.
 */
class SiteController extends Controller
{
    /**
     * Defines the behaviors for the SiteController.
     *
     * @return array The configuration for the behaviors.
     *
     * This function configures two behaviors:
     * - AccessControl: Controls access to certain actions based on user roles.
     * - VerbFilter: Specifies the allowed HTTP request methods for each action.
     *
     * The AccessControl behavior allows access to the 'logout' and 'signup' actions for guest users (denoted by '?') and authenticated users (denoted by '@').
     * The VerbFilter behavior allows both POST and GET requests for the 'logout' action.
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays the products in a specific category.
     *
     * @param int $id The ID of the category.
     * @return string The rendered view of the category page.
     *
     * This function retrieves all products belonging to a specific category and calculates the total number of items in the cart.
     * It then renders the 'category' view with the necessary data.
     */
    public function actionCategory($id)
    {
        $cart = new Cart();
        $total = $cart->getTotalItem();
        $products = Product::find()
            ->where(['category_id' => $id])
            ->all();
        $count = Product::find()
            ->where(['category_id' => $id])
            ->count();

        return $this->render('category', [
            'products' => $products,
            'total' => $total,
            'count' => $count,
        ]);
    }

    /**
     * Displays the details of a specific product.
     *
     * @param int $id The ID of the product.
     * @return string The rendered view of the product details page.
     *
     * @throws \Exception If the view object cannot be saved.
     */
    public function actionView($id)
    {
        $cart = new Cart();
        $total = $cart->getTotalItem();
        $product = Product::findOne($id);
        $category = Product::find()
            ->where(['category_id' => $product->category_id])
            ->limit(3)
            ->all();
        $reviews = Review::find()
            ->where(['product_id' => $id])
            ->all();
        $view = View::find()
            ->where(['product_id' => $id])
            ->one();

        if ($view === null) {
            $view = new View();
            $view->product_id = $id;
            $view->count = 0;
        }

        $averageRating = 0;
        if (!empty($reviews)) {
            $totalRating = array_sum(array_column($reviews, 'rating'));
            $averageRating = $totalRating / count($reviews);
        }

        $reviewModel = new Review();
        $userId = Yii::$app->user->id;
        $existingReview = Review::findOne(['user_id' => $userId, 'product_id' => $id]);

        if ($existingReview) {
            if ($reviewModel->load(Yii::$app->request->post())) {
                $existingReview->rating = $reviewModel->rating;
                $existingReview->comment = $reviewModel->comment;
                $existingReview->created_at = time();
                $existingReview->save();
                return $this->refresh();
            }
        } else {
            if ($reviewModel->load(Yii::$app->request->post())) {
                $reviewModel->product_id = $id;
                $reviewModel->user_id = $userId;
                $reviewModel->created_at = time();
                $reviewModel->save();
                return $this->refresh();
            }
        }

        return $this->render('view', [
            'product' => $product,
            'category' => $category,
            'total' => $total,
            'reviews' => $reviews,
            'view' => $view,
            'averageRating' => $averageRating,
            'reviewModel' => $reviewModel,
        ]);
    }
    /**
     * Displays a flipbook view of a specific product.
     *
     * @param int $id The ID of the product.
     * @return string The rendered view of the flipbook page.
     * @throws \Exception If the view object cannot be saved.
     */
    public function actionFlipbook($id)
    {
        // Find the product by its ID
        $product = Product::findOne($id);

        // Find the view record for the product
        $view = View::find()
            ->where(['product_id' => $id])
            ->one();

        // If no view record exists, create a new one
        if (!$view) {
            $view = new View();
            $view->product_id = $id;
            $view->count = 0;
            $view->last_access_time = date('Y-m-d H:i:s');
            $view->save(false, ['product_id', 'count', 'last_access_time']);
        }

        // Calculate the time difference between the last access time and the current time
        $lastAccessTime = strtotime($view->last_access_time ?? date('Y-m-d H:i:s'));
        $currentTime = time();
        $timeDiff = $currentTime - $lastAccessTime;

        // If the time difference is greater than or equal to 5 seconds, increment the view count and update the last access time
        if ($timeDiff >= 5) {
            $view->count += 1;
            $view->last_access_time = date('Y-m-d H:i:s');
        }

        // Do not save the view object if the time difference is less than 5 seconds
        if ($timeDiff >= 5) {
            $view->save();
        }

        // Render the flipbook view with the product and view data
        return $this->render('flipbook', [
            'product' => $product,
            'view' => $view,
        ]);
    }

    /**
     * Displays the homepage.
     *
     * This function retrieves the latest 40 products from the database and renders the 'index' view with the products data.
     *
     * @return string The rendered view of the homepage.
     */
    public function actionIndex()
    {
        // Retrieve the latest 40 products from the database
        $products = Product::find()
            ->limit(40)
            ->all();

        // Render the 'index' view with the products data
        return $this->render('index', [
            'products' => $products,
        ]);
    }

    /**
     * Displays a list of products.
     *
     * This function retrieves the latest 20 products from the database and the total count of products.
     * It then renders the 'products' view with the products data and the total count.
     *
     * @return string The rendered view of the products page.
     */
    public function actionProducts()
    {
        // Retrieve the latest 20 products from the database
        $products = Product::find()
            ->limit(20)
            ->all();

        // Retrieve the total count of products
        $count = Product::find()->count();

        // Render the 'products' view with the products data and the total count
        return $this->render('products', [
            'products' => $products,
            'count' => $count,
        ]);
    }


    /**
     * Logs in a user.
     *
     * This function handles the user login process. It checks if the user is already logged in,
     * if not, it creates a new LoginForm model and attempts to load and validate the user's input.
     * If the input is valid and the user is successfully logged in, it redirects the user back to their previous page.
     * Otherwise, it renders the login view with the LoginForm model.
     *
     * @return string|\yii\web\Response The rendered view of the login page or a redirect response.
     */
    public function actionLogin()
    {
        // Check if the user is already logged in
        if (!Yii::$app->user->isGuest) {
            // Redirect the user to the homepage if they are already logged in
            return $this->goHome();
        }

        // Create a new LoginForm model
        $model = new LoginForm();

        // Attempt to load and validate the user's input
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Redirect the user back to their previous page if the login is successful
            return $this->goBack();
        } else {
            // Render the login view with the LoginForm model if the input is invalid
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * This function destroys the user's session and redirects them to the homepage.
     *
     * @return \yii\web\Response A redirect response to the homepage.
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays the contact page and handles the contact form submission.
     *
     * @return string|\yii\web\Response The rendered view of the contact page or a redirect response.
     *
     * This function creates a new instance of the Cart, ContactForm, and Contact models.
     * It also retrieves the total number of items in the cart.
     * If the contact form is submitted and validated, it retrieves the post data,
     * populates the Contact model with the form data, and saves it to the database.
     * It then sets a success or error flash message and refreshes the page.
     * If the contact form is not submitted or is not valid, it renders the 'contact' view with the ContactForm and total item count.
     */
    public function actionContact()
    {
        $cart = new Cart();
        $model = new ContactForm();
        $total = $cart->getTotalItem();
        $contact = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post()['ContactForm'];
            $contact->name = $post['name'];
            $contact->email = $post['email'];
            $contact->phone = $post['phone'];
            $contact->body = $post['body'];
            $contact->created_at = time();
            $contact->updated_at = time();

            if ($contact->save(false)) {
                Yii::$app->session->setFlash('success', 'Yêu cầu của bạn đã được gửi đi thành công.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                'total' => $total,
            ]);
        }
    }

    /**
     * Displays the about page.
     *
     * This function retrieves the total number of items in the cart and renders the 'about' view with the total item count.
     *
     * @return string The rendered view of the about page.
     */
    public function actionAbout()
    {
        $cart = new Cart();
        $total = $cart->getTotalItem();
        return $this->render('about', ['total' => $total]);
    }

    /**
     * Signs user up.
     *
     * This function handles the signup process for new users. It creates a new SignupForm model,
     * loads the post data into the model, validates the data, and attempts to sign up the user.
     * If the signup is successful, it logs the user in and redirects them to the homepage.
     * If the signup is not successful, it renders the signup view with the SignupForm model.
     *
     * @return string|\yii\web\Response The rendered view of the signup page or a redirect response.
     */
    public function actionSignup()
    {
        // Create a new SignupForm model
        $model = new SignupForm();

        // Load the post data into the model
        if ($model->load(Yii::$app->request->post())) {
            // Validate the data and attempt to sign up the user
            if ($user = $model->signup()) {
                // Log the user in and redirect them to the homepage
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        // Render the signup view with the SignupForm model if the signup is not successful
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests a password reset for a user.
     *
     * This function handles the password reset request process. It creates a new instance of the PasswordResetRequestForm model,
     * loads the post data into the model, validates the data, and attempts to send a password reset email to the user.
     * If the email is successfully sent, it sets a success flash message and redirects the user to the homepage.
     * If the email is not sent, it sets an error flash message.
     *
     * @return string|\yii\web\Response The rendered view of the password reset request page or a redirect response.
     */
    public function actionRequestPasswordReset()
    {
        // Create a new instance of the PasswordResetRequestForm model
        $model = new PasswordResetRequestForm();

        // Load the post data into the model
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Validate the data and attempt to send a password reset email
            if ($model->sendEmail()) {
                // Set a success flash message and redirect the user to the homepage
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                // Set an error flash message
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        // Render the password reset request view with the PasswordResetRequestForm model
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password for a user using a password reset token.
     *
     * @param string $token The password reset token.
     * @return string|\yii\web\Response The rendered view of the reset password page or a redirect response.
     * @throws BadRequestHttpException If the token is invalid.
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}

?>
