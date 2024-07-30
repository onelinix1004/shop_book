<?php

namespace backend\controllers;

use Yii;
use backend\models\Orders;
use backend\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'allow'=>true,
                        'roles'=>['@'],
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
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }

    /**
     * This function returns an array of action configurations for this controller.
     *
     * The 'error' action is configured to handle exceptions and render the 'error' view.
     *
     * @return array the action configurations.
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
     * Displays a list of Orders models based on the search/filter criteria.
     *
     * @return mixed
     *
     * @throws \yii\web\NotFoundHttpException if the page does not exist.
     */
    public function actionIndex()
    {
        // Create a new OrdersSearch model to handle search/filter criteria.
        $searchModel = new OrdersSearch();

        // Use the search method of the OrdersSearch model to get the data provider for the grid view.
        // The search method uses the query parameters from the current request.
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Render the 'index' view with the search model and data provider.
        // The 'index' view displays a list of Orders models based on the search/filter criteria.
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     *
     * @param integer $id The primary key of the Orders model to be displayed.
     *
     * @return mixed The result of rendering the 'view' view with the found model.
     * If the model is not found, the browser will be redirected to the 'index' page.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     *
     * @throws \yii\web\BadRequestHttpException if the request method is not POST.
     * @throws \yii\base\InvalidConfigException if the 'Orders' model cannot be found in the Yii application.
     * @throws \yii\base\ExitException if the redirection fails.
     */
    public function actionCreate()
    {
        // Create a new instance of the Orders model
        $model = new Orders();

        // Check if the request method is POST and the model is loaded with data from the request
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // If the model is saved successfully, redirect the browser to the 'view' page with the new model's ID
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // If the model is not saved, render the 'create' view with the model
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Orders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id The primary key of the Orders model to be updated.
     *
     * @return mixed
     *
     * @throws \yii\web\NotFoundHttpException If the model cannot be found.
     * @throws \yii\base\InvalidConfigException If the 'Orders' model cannot be found in the Yii application.
     * @throws \yii\base\ExitException If the redirection fails.
     */
    public function actionUpdate($id)
    {
        // Find the existing Orders model based on the provided ID
        $model = $this->findModel($id);

        // Check if the request method is POST and the model is loaded with data from the request
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // If the model is saved successfully, redirect the browser to the 'view' page with the updated model's ID
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // If the model is not saved, render the 'update' view with the model
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Orders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id The primary key of the Orders model to be deleted.
     *
     * @return mixed The result of redirecting the browser to the 'index' page.
     *
     * @throws \yii\web\NotFoundHttpException If the model cannot be found.
     * @throws \yii\base\ExitException If the redirection fails.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id The primary key of the Orders model to be found.
     *
     * @return Orders The loaded model.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
