<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\User;
use common\models\UserSearch;
use backend\models\Admin;
use yii\filters\AccessControl;


/**
 * Admin controller
 */
class AdminController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['users', 'banned', 'view', 'ban', 'unban'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    // Links users and banned
    public function actionUsers() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search_notbanned(Yii::$app->request->queryParams);

        return $this->render('users', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionBanned() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search_banned(Yii::$app->request->queryParams);

        return $this->render('banned', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    // buttons view, ban and unban
    public function actionView($id) {
        $model = User::findIdentity($id);
        return $this->render('view', [
                    'model' => $model,
        ]);
    }


    public function actionBan($id) {
        $model = new Admin;
        $model->ban($id);
        
        return $this->redirect('users');
    }

    public function actionUnban($id){
        $model = new Admin;
        $model->unban($id);
        
        return $this->redirect('banned');
    }
}
