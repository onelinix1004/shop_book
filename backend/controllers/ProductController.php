<?php

namespace backend\controllers;

use Yii;
use backend\controllers\Comment;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * Configures the behaviors for this controller.
     *
     * @return array the behaviors
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule,$action){
                            if (Yii::$app->user->can('admin')){
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
     * This function returns an array of action configurations for this controller.
     *
     * The 'error' action is configured to use the 'yii\web\ErrorAction' class.
     *
     * @return array the action configurations
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
     * Lists all Product models.
     * @return mixed
     */


    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     *
     * @param integer $id The primary key of the Product model to be displayed.
     * @return mixed The result of rendering the 'view' view with the Product model data.
     * @throws NotFoundHttpException If the requested Product model cannot be found.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * This function handles the creation of a new Product model.
     * If the creation is successful, the user will be redirected to the 'index' page.
     *
     * @return mixed
     * - If the request is a POST, the function will attempt to load the POST data into the Product model,
     *   handle uploaded files, save the model, and redirect the user accordingly.
     * - If the request is not a POST, the function will render the 'create' view with a new Product model.
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            // Get the uploaded image file
            $model->file = UploadedFile::getInstance($model, 'file');
            // Get the uploaded PDF file
            $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile');

            // If an image file is uploaded
            if ($model->file) {
                // Generate a unique name for the image file
                $imageName = 'product' . rand(1, 100000);
                // Save the image file to the specified directory
                $model->file->saveAs(Yii::getAlias('@frontend/web/upload/') . $imageName . '.' . $model->file->extension);
                // Set the image attribute of the model to the saved image file path
                $model->image = 'upload/' . $imageName . '.' . $model->file->extension;
            }

            // If a PDF file is uploaded
            if ($model->pdfFile) {
                // Generate a unique name for the PDF file
                $pdfName = 'pdf' . rand(1, 100000);
                // Save the PDF file to the specified directory
                $model->pdfFile->saveAs(Yii::getAlias('@frontend/web/pdf/') . $pdfName . '.' . $model->pdfFile->extension);
                // Set the pdf attribute of the model to the saved PDF file path
                $model->pdf = '/pdf/' . $pdfName . '.' . $model->pdfFile->extension;
            }

            // Set the created_at and updated_at attributes to the current timestamp
            $model->created_at = time();
            $model->updated_at = time();

            // Save the model to the database
            if ($model->save(false)) {
                // Set a success flash message and redirect the user to the 'index' page
                Yii::$app->session->setFlash('success', 'Đã thêm thành công ' . $model->name . '!');
                return $this->redirect(['index']);
            } else {
                // Set an error flash message if the model could not be saved
                Yii::$app->session->setFlash('error', 'Lỗi khi lưu sản phẩm!');
            }
        }

        // Render the 'create' view with the new Product model
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing Product model.
     *
     * @param integer $id The primary key of the Product model to be updated.
     * @return mixed
     * - If the request is a POST, the function will attempt to load the POST data into the Product model,
     *   handle uploaded files, save the model, and redirect the user accordingly.
     * - If the request is not a POST, the function will render the 'update' view with the existing Product model.
     * @throws NotFoundHttpException If the requested Product model cannot be found.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile'); // Thêm phần này để xử lý tệp PDF

            if ($model->file) {
                $imageName = 'product' . rand(1, 100000);
                $model->file->saveAs('upload/' . $imageName . '.' . $model->file->extension);
                $model->image = 'upload/' . $imageName . '.' . $model->file->extension;
            }

            if ($model->pdfFile) {
                $pdfName = 'pdf' . rand(1, 100000);
                $model->pdfFile->saveAs(Yii::getAlias('@frontend/web/pdf/') . $pdfName . '.' . $model->pdfFile->extension);
                $model->pdf = '/pdf/' . $pdfName . '.' . $model->pdfFile->extension;
            }

            $model->updated_at = time();

            if ($model->save(false)) {
                Yii::$app->session->setFlash('success', 'Đã cập nhật thành công ' . $model->name . '!');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('error', 'Lỗi khi cập nhật sản phẩm!');
            }
        }

        return $this->render('update', ['model' => $model]);
    }



    /**
     * Displays a list of the top 10 most purchased products.
     *
     * This function retrieves the top 10 products from the database based on the 'sales_count' attribute,
     * which represents the number of times each product has been purchased. The products are sorted in descending order
     * of sales count, and only the first 10 products are returned. The retrieved products are then rendered in a view
     * named 'buybook' with the list of top 10 products passed as a parameter.
     *
     * @return mixed The result of rendering the 'buybook' view with the list of top 10 products.
     */
    public function actionBuybook()
    {
        // Retrieve the top 10 products based on sales count
        $top10Products = Product::find()
            ->orderBy(['sales_count' => SORT_DESC]) // Sort in descending order by sales count
            ->limit(10) // Limit the result to 10 products
            ->all();

        // Render the 'buybook' view with the list of top 10 products
        return $this->render('buybook', ['top10Products' => $top10Products]);
    }


    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id The primary key of the Product model to be deleted.
     * @return mixed
     * - If the deletion is successful, the function will redirect the browser to the 'index' page.
     * - If the deletion is not successful, the function will not return anything.
     * @throws NotFoundHttpException If the requested Product model cannot be found.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Đã xóa thành công !');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id The primary key of the Product model to be found.
     *
     * @return Product The loaded model.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
