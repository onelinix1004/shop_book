<?php

namespace backend\controllers;
//Điều này có nghĩa là class này sẽ nằm trong thư mục "backend\controllers" 

use Yii;

// sử dụng các tính năng và framework của YII2
use backend\models\Category;

//import các lớp "Category" từ thư mục "backend\models", cho phép sử dụng chúng trong controller này.
use backend\models\CategorySearch;

//import các lớp "CategorySearch" từ thư mục "backend\models", cho phép sử dụng chúng trong controller này.
use yii\web\Controller;

//import các lớp liên quan đến Controller của Yii2.
use yii\web\NotFoundHttpException;

//import các lớp liên quan đến NotFoundHttpException của Yii2.
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoryController implements the CRUD actions for Category model.
 * Các phương thức (actions):
 *     + Đoạn mã chứa các phương thức để thực hiện các hành động CRUD (Create, Read, Update, Delete)
 *       với thực thể "Category".
 *
 * Behavior (Hành vi):
 * Phương thức behaviors() định nghĩa các hành vi (behaviors) được áp dụng cho controller. Ở đây, có hai hành vi chính:
 * + Hành vi "access": Áp dụng kiểm soát truy cập để quản lý quyền truy cập vào các hành động trong controller.
 * Người dùng cần phải đăng nhập để thực hiện các hành động, và chỉ người dùng có quyền "admin" mới được phép truy cập.
 * + Hành vi "verbs": Xác định các phương thức HTTP (GET, POST) cho từng hành động trong controller.
 * Trong trường hợp này, phương thức "logout" có thể được gọi bằng cả POST và GET.
 *
 * Các hành động chính:
 * actionIndex(): Hiển thị danh sách các mô hình "Category" thông qua giao diện "index" và hỗ trợ tìm kiếm.
 * actionView($id): Hiển thị thông tin chi tiết của một mô hình "Category" cụ thể thông qua giao diện "view".
 * actionCreate(): Tạo một mô hình "Category" mới và lưu vào cơ sở dữ liệu. Nếu việc tạo thành công, sẽ chuyển hướng đến trang hiển thị thông tin chi tiết của mô hình vừa tạo.
 * actionUpdate($id): Cập nhật thông tin của mô hình "Category" hiện có với dữ liệu được gửi từ form. Nếu cập nhật thành công, sẽ chuyển hướng đến trang hiển thị thông tin chi tiết của mô hình vừa cập nhật.
 * actionDelete($id): Xóa một mô hình "Category" cụ thể khỏi cơ sở dữ liệu.
 *
 *
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            /**
             * Hành vi "access" (Kiểm soát truy cập):
             * Đoạn mã sử dụng hành vi "AccessControl" để kiểm soát quyền truy cập vào các hành động trong controller.
             * Có hai tập luật (rules) được định nghĩa:
             *  +Tập luật thứ nhất cho phép truy cập vào các hành động "login" và "error" mà không cần xác thực (allow = true).
             *  +Tập luật thứ hai cho phép truy cập vào các hành động còn lại (nằm trong mảng 'actions')
             * chỉ khi người dùng đã đăng nhập (roles=['@']). Điều này đảm bảo rằng chỉ có người dùng đã đăng nhập mới có thể truy cập vào các hành động CRUD.
             *
             * Đặc biệt, có một "matchCallback" được sử dụng trong tập luật thứ hai. Nó cho phép định nghĩa
             *  một hàm callback (hàm được đưa vào như một closure) để kiểm tra điều kiện tùy
             * chỉnh cho việc cho phép truy cập. Trong trường hợp này, nếu người dùng có quyền "admin"
             * (được xác định bởi Yii::$app->user->can('admin')), thì hành động sẽ được cho phép truy cập (return true)
             * . Ngược lại, nếu người dùng không có quyền "admin", thì hành động sẽ bị từ chối truy cập (return false).
             */
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
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
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * This function is used to define the actions that can be accessed by the controller.
     * In this case, it defines an 'error' action that will be handled by the yii\web\ErrorAction class.
     *
     * @return array An array of action configurations, where the keys are the action IDs and the values are the corresponding configurations.
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
     * Displays a list of Category models with search and pagination support.
     *
     * @return mixed
     * @throws NotFoundHttpException If the requested page does not exist.
     */
    public function actionIndex()
    {
        // Create a new CategorySearch model to handle search and pagination.
        $searchModel = new CategorySearch();

        // Perform a search using the query parameters from the request.
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Render the 'index' view with the search model and data provider.
        // The 'index' view will display the list of categories with search and pagination support.
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     *
     * @param integer $id The primary key of the Category model to be displayed.
     *
     * @return mixed
     * @throws NotFoundHttpException If the requested Category model with the given ID does not exist.
     *
     * This function retrieves a Category model with the given ID from the database.
     * If the model is found, it renders the 'view' view with the model data.
     * If the model is not found, it throws a 404 HTTP exception.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * This function handles the creation of a new Category model.
     * If the creation is successful, the user will be redirected to the 'view' page.
     *
     * @return mixed
     *
     * @throws \yii\web\BadRequestHttpException If the request method is not POST.
     * @throws \yii\web\NotFoundHttpException If the requested page does not exist.
     *
     * @throws \yii\base\InvalidConfigException If the 'Category' model class is not found.
     * @throws \yii\base\UnknownPropertyException If the 'Category' model does not have the specified property.
     * @throws \yii\base\InvalidCallException If a property or method is not accessible.
     * @throws \yii\db\Exception If there is a database error when saving the model.
     *
     * @throws \yii\base\Exception If the redirection fails.
     * @throws \yii\web\ResponseException If the response is already sent.
     */
    public function actionCreate()
    {
        // Create a new Category model
        $model = new Category();

        // Check if the request method is POST and the model is loaded with data from the request
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // If the model is saved successfully, redirect the user to the 'view' page with the ID of the newly created model
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // If the model is not saved, render the 'create' view with the model data
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id The primary key of the Category model to be updated.
     *
     * @return mixed
     * @throws NotFoundHttpException If the requested Category model with the given ID does not exist.
     *
     * This function retrieves a Category model with the given ID from the database.
     * If the model is found and the request method is POST, the model's attributes will be loaded with data from the request,
     * and if the model is saved successfully, the user will be redirected to the 'view' page with the ID of the updated model.
     * If the model is not saved or the request method is not POST, the 'update' view will be rendered with the model data.
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id The primary key of the Category model to be deleted.
     *
     * @return mixed
     * @throws NotFoundHttpException If the requested Category model with the given ID does not exist.
     *
     * This function retrieves a Category model with the given ID from the database, deletes it,
     * and then redirects the user to the 'index' page.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id The primary key of the Category model to be found.
     *
     * @return Category The loaded model.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     *
     * This function is used to retrieve a Category model with a given ID from the database.
     * If the model is found, it is returned. If the model is not found, a 404 HTTP exception is thrown.
     * This function is used as a helper method to ensure that the requested Category model exists before processing any data.
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
