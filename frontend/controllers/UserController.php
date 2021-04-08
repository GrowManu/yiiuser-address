<?php

namespace frontend\controllers;

use Yii;
use common\models\UserSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\User;

class UserController extends Controller{
        /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Address models.
     * @return mixed
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
    
    public function actionView($id) {
        $model = User::findIdentity($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate(){
        $model = User::findIdentity(Yii::$app->user->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/area', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
}
