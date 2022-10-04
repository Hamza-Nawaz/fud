<?php

namespace app\controllers;

use app\models\ShopUsers;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DashboardController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ShopUsers models.
     *
     * @return string
     */


    public function actionIndex(){
        if(ShopUsers::is_LoggedIn() && ShopUsers::is_admin()){
            return $this->render('index_admin');
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){
            return $this->redirect(['softwares-tools/index']);
        }else if(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()) {

            return $this->redirect(['softwares-tools/index']);
        }elseif(ShopUsers::is_support() && ShopUsers::is_LoggedIn()){
            return $this->redirect(['report/index']);

        }else{
            return  $this->redirect(['user/login']);
        }
    }





}