<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'allow'=>true,
                        'roles'=>['@'],
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
     * Displays a list of User models.
     *
     * This function is responsible for handling the action when the 'index' action is triggered.
     * It creates a new UserSearch model and uses it to search and filter User models based on the
     * provided query parameters. The search results are then passed to the 'index' view for rendering.
     *
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     *
     * This function retrieves a User model based on the provided ID and renders the 'view' page.
     *
     * @param integer $id The primary key of the User model to be displayed.
     *
     * @return mixed The result of the rendering process. If successful, it will return the 'view' page with the User model data.
     *
     * @throws NotFoundHttpException If the requested User model cannot be found.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     *
     * @throws \yii\web\BadRequestHttpException if the request method is not POST.
     * @throws \yii\base\InvalidConfigException if the 'request' application component is not configured.
     * @throws \yii\base\Exception if the model cannot be saved.
     * @throws \yii\web\NotFoundHttpException if the 'view' or 'create' view file does not exist.
     */
    public function actionCreate()
    {
        // Create a new User model
        $model = new User();

        // Check if the model is loaded with POST data
        if ($model->load(Yii::$app->request->post())) {
            // If the model is saved successfully, redirect to the 'view' page with the new model's ID
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // If the model cannot be saved, throw an exception
                throw new \yii\base\Exception('Failed to save the User model.');
            }
        } else {
            // If the model is not loaded with POST data, render the 'create' view with the new model
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id The primary key of the User model to be updated.
     *
     * @return mixed
     *
     * @throws \yii\web\BadRequestHttpException If the request method is not POST.
     * @throws \yii\base\InvalidConfigException If the 'request' application component is not configured.
     * @throws \yii\base\Exception If the model cannot be saved.
     * @throws \yii\web\NotFoundHttpException If the 'view' or 'update' view file does not exist.
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id The primary key of the User model to be deleted.
     *
     * @return mixed The result of the redirect process. If successful, it will redirect to the 'index' page.
     *
     * @throws \yii\web\NotFoundHttpException If the User model with the given ID cannot be found.
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id The primary key of the User model to be found.
     *
     * @return User The loaded model.
     *
     * @throws NotFoundHttpException If the model cannot be found.
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
