<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Orders;
use backend\models\OrdersItem;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use backend\models\Product;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Configures the behaviors for the controller.
     *
     * @return array The behaviors configuration.
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','logout'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if (Yii::$app->user->can('admin')) {
                                return true;
                            }
                        }
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
     * This function returns an array of action configurations for the controller.
     *
     * The 'error' action is defined to handle exceptions and display error pages.
     * It uses the 'yii\web\ErrorAction' class to handle the error action.
     *
     * @return array The action configurations.
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays the backend homepage.
     *
     * This function retrieves and processes data for various charts and tables on the homepage.
     * It includes data for earnings, category sales, recent orders, best-rated products, and most viewed products.
     *
     * @return string The rendered homepage view with the processed data.
     */
    public function actionIndex()
    {
        // Line chart data for earnings
        $orders = OrdersItem::findBySql("
        SELECT
            CAST(DATE_FORMAT(FROM_UNIXTIME(o.created_at), '%Y-%m-%d %H:%i:%s') as DATE) as date,
            SUM(o.price) as total_price
        FROM orders_item o
        GROUP BY date
        ORDER BY date
    ")
            ->asArray()
            ->all();

        $earningsData = [];
        $labels = [];
        foreach ($orders as $order) {
            $date = date('d/m/Y', strtotime($order['date']));
            $labels[] = $date;
            $earningsData[] = $order['total_price'];
        }

        // Pie chart data for category sales
        $categoryData = OrdersItem::find()
            ->select(['category.name', 'SUM(orders_item.price) AS total'])
            ->innerJoin('product', 'orders_item.product_id = product.id')
            ->innerJoin('category', 'product.category_id = category.id')
            ->innerJoin('orders', 'orders_item.orders_id = orders.id')
            ->groupBy(['category.name'])
            ->asArray()
            ->all();

        $categoryLabels = Category::find()->select('name')->column(); // Extract array of category names from Category model

        $colorCount = count($categoryLabels);
        $bgColors = [];
        for ($i = 1; $i <= $colorCount; $i++) {
            $bgColors[] = 'hsl(' . (360 / $colorCount * $i) . ', 70%, 50%)';
        }

        // Recent orders data
        $activity = Orders::findBySql("
        SELECT orders.*, user.username
        FROM orders
        JOIN user ON user.id = orders.user_id
        ORDER BY orders.updated_at DESC
        LIMIT 5
    ")
            ->asArray() // Chuyển đổi kết quả thành mảng
            ->all();

        // Best-rated products data
        $bestRatingProducts = Product::find()
            ->select(['p.name','p.image' ,'AVG(r.rating) AS avg_rating'])
            ->from('product p')
            ->innerJoin('reviews r', 'p.id = r.product_id')
            ->groupBy('p.id')
            ->orderBy(['avg_rating' => SORT_DESC])
            ->limit(10)
            ->asArray()
            ->all();

        // Most viewed products data
        $bestViewProducts = Product::find()
            ->select(['p.id', 'p.name', 'SUM(v.count) AS total_views'])
            ->from('product p')
            ->innerJoin('views v', 'p.id = v.product_id')
            ->groupBy('p.id')
            ->orderBy(['total_views' => SORT_DESC])
            ->limit(10)
            ->asArray()
            ->all();

        // Render index view with data
        return $this->render('index', [
            'data' => $earningsData,
            'labels' => $labels,
            'categoryLabels' => $categoryLabels,
            'bgColors' => $bgColors,
            'orders' => $orders,
            'activity' => $activity,
            'categoryData' => $categoryData,
            'bestRatingProducts' => $bestRatingProducts,
            'bestViewProducts' => $bestViewProducts,
        ]);
    }

    /**
     * Displays the login page for the backend application.
     *
     * This function handles the login process for the backend application.
     * It sets the layout to 'login' and checks if the user is already logged in.
     * If the user is not logged in, it creates a new LoginForm model and attempts to load and validate the form data.
     * If the form data is valid and the user is successfully logged in, it redirects to the backend homepage.
     * Otherwise, it renders the login view with the LoginForm model.
     *
     * @return string The rendered login view or the redirect response.
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Performs the logout action for the backend application.
     *
     * This function logs out the current user by calling the logout method on the Yii::$app->user component.
     * After the user is logged out, it redirects the user to the homepage using the goHome method.
     *
     * @return string The redirect response to the homepage.
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
