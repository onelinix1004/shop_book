<?php

namespace backend\controllers;

use Yii;
use backend\models\OrdersItem;
use backend\models\OrdersItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrdersItemController implements the CRUD actions for OrdersItem model.
 */
class OrdersItemController extends Controller
{
    /**
     * Configures the behaviors for this controller.
     *
     * @return array the behaviors.
     *
     * @see \yii\base\Controller::behaviors()
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
     * Each action is defined as a key-value pair, where the key is the action name and the value is an array of configuration settings.
     *
     * @return array An array of action configurations.
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
     * Displays a list of OrdersItem models.
     *
     * This function is responsible for handling the index action, which renders a list of OrdersItem models.
     * It uses a search model to filter and sort the data, and then passes the search model and data provider to the view.
     *
     * @return mixed
     *
     * @throws NotFoundHttpException If the requested page does not exist.
     */
    public function actionIndex()
    {
        // Create a new instance of the OrdersItemSearch model
        $searchModel = new OrdersItemSearch();

        // Use the search model to filter and sort the data based on the query parameters
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Render the 'index' view with the search model and data provider
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrdersItem model.
     *
     * This function is responsible for rendering a detailed view of a specific OrdersItem model based on its primary key.
     * It uses the findModel method to retrieve the model from the database and then passes it to the 'view' view.
     *
     * @param integer $id The primary key of the OrdersItem model to be displayed.
     *
     * @return mixed The result of the render method, which renders the 'view' view with the model data.
     *
     * @throws NotFoundHttpException If the requested OrdersItem model cannot be found.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OrdersItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     *
     * @throws \yii\web\NotFoundHttpException If the requested page does not exist.
     */
    public function actionCreate()
    {
        // Create a new instance of the OrdersItem model
        $model = new OrdersItem();

        // Check if the model is loaded with data from a POST request and saved successfully
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // If successful, redirect to the 'view' page with the ID of the newly created model
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // If not successful, render the 'create' view with the model data
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OrdersItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id The primary key of the OrdersItem model to be updated.
     *
     * @return mixed
     *
     * @throws NotFoundHttpException If the requested OrdersItem model cannot be found.
     */
    public function actionUpdate($id)
    {
        // Find the existing model using the provided ID
        $model = $this->findModel($id);

        // Check if the model is loaded with data from a POST request and saved successfully
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // If successful, redirect to the 'view' page with the ID of the updated model
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // If not successful, render the 'update' view with the model data
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OrdersItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id The primary key of the OrdersItem model to be deleted.
     *
     * @return mixed The result of the redirect method, which redirects to the 'index' page.
     *
     * @throws NotFoundHttpException If the requested OrdersItem model cannot be found.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrdersItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id The primary key of the OrdersItem model to be found.
     *
     * @return OrdersItem The loaded model.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     */
    protected function findModel($id)
    {
        if (($model = OrdersItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
