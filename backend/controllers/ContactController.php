<?php

namespace backend\controllers;

use Yii;
use backend\models\Contact;
use backend\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
{
    /**
     * @inheritdoc
     */
    

    /**
     * Lists all Contact models.
     * @return mixed
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
     * Declares external actions for the controller.
     *
     * This method returns an array of external action configurations.
     * Each array element represents the configuration for a single action.
     * In this case, it configures the 'error' action to use the 'yii\web\ErrorAction' class.
     *
     * @return array The configuration array for external actions.
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
     * Lists all Contact models.
     *
     * This function initializes a search model and data provider for the Contact model,
     * and renders the 'index' view with these models.
     *
     * @return mixed The rendered 'index' view with the search model and data provider.
     */
    public function actionIndex()
    {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contact model.
     *
     * This function renders the 'view' view with the model corresponding to the provided ID.
     *
     * @param integer $id The ID of the Contact model to be displayed.
     * @return mixed The rendered 'view' view with the Contact model.
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     * @throws \yii\web\BadRequestHttpException if the request method is not POST.
     */
    public function actionCreate()
    {
        // Initialize a new Contact model
        $model = new Contact();

        // Check if the model is loaded with POST data
        if ($model->load(Yii::$app->request->post())) {
            // If the model is loaded and saved successfully, redirect to the 'view' page with the new model's ID
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        // If the model is not loaded or not saved, render the 'create' view with the model
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contact model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id The ID of the Contact model to be updated.
     * @return mixed
     * @throws \yii\web\BadRequestHttpException if the request method is not POST.
     */
    public function actionUpdate($id)
    {
        // Find the Contact model based on the provided ID
        $model = $this->findModel($id);

        // Check if the model is loaded with POST data
        if ($model->load(Yii::$app->request->post())) {
            // If the model is loaded and saved successfully, redirect to the 'view' page with the updated model's ID
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            // If the model is not loaded or not saved, render the 'update' view with the model
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Contact model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
