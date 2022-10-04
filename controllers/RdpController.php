<?php

namespace app\controllers;

use app\models\ShopUsers;
use yii\filters\VerbFilter;
use yii\web\Controller;

class RdpController extends Controller
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

    public function actionIndex(){
        if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
            if(\Yii::$app->request->post()) {
                $params = \Yii::$app->request->post();
                try {
                    if($params["ip"]) {
                        $url = 'http://5.161.109.65:7000/restart/rdp_restart?address=' . $params['ip'];
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $rem = curl_exec($curl);
                        curl_close($curl);

                        return $this->render('index', [
                            'error' => $rem
                        ]);
                    }else{
                        return $this->render('index', [
                            'error' => "Enter Valid IP Address"
                        ]);
                    }
                } catch (\Exception $ex) {
                    return $this->render('index', [
                        'error' => "Some thing Wrong"
                    ]);
                }
            } else{

                return $this->render('index',[
                    'error'=>""
                ]);
            }

        }else if(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()){
            if(\Yii::$app->request->post()) {
                $params = \Yii::$app->request->post();
                try {
                    if($params["ip"]) {
                        $url = 'http://5.161.109.65:7000/restart/rdp_restart?address=' . $params['ip'];
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $rem = curl_exec($curl);
                        curl_close($curl);

                        return $this->render('index', [
                            'error' => $rem
                        ]);
                    }else{
                        return $this->render('index', [
                            'error' => "Enter Valid IP Address"
                        ]);
                    }
                } catch (\Exception $ex) {
                    return $this->render('index', [
                        'error' => "Some thing Wrong"
                    ]);
                }
            } else{

                return $this->render('index',[
                    'error'=>""
                ]);
            }

        } else{
            return  $this->redirect(['user/login']);
        }


    }
}