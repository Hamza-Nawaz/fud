<?php

namespace app\controllers;

use app\models\Accounts;
use app\models\ShopUsers;
use app\models\ToolsLicense;
use app\models\ToolsLicenseSearch;
use PharIo\Manifest\License;
use yii\base\InlineAction;
use yii\filters\VerbFilter;
use yii\validators\ImageValidator;
use yii\web\Controller;

class ToolsLicenseController extends Controller
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
     * Lists all SoftwaresTools models.
     *
     * @return string
     */


    public function actionIndex(){
            if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
                $model = ToolsLicense::find()
                    ->where(['user_name'=>\Yii::$app->session->get('buyer_email')])
                    ->andWhere(['seller_email'=>\Yii::$app->params['seller_email']])
                    ->andWhere(['shop_name'=>$_SERVER['SERVER_NAME']])
                    ->all();
                if($model){
                    return $this->render('buyer_index',[
                       'model'=>$model,
                        'error'=>"",
                    ]);

                }else{
                    return $this->render('buyer_index',[
                        'model'=>"-1",
                        'error'=>'',
                    ]);
                }

            }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()){
                $searchModel = new ToolsLicenseSearch();
                $dataProvider = $searchModel->search($this->request->queryParams);
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);

            }else{
                return  $this->redirect(['user/login']);
            }
    }

            public function actionCreate(){
                if(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()){
                    $model = new ToolsLicense();

                    if ($this->request->isPost) {
                        $params = $this->request->post();
                        $user = ShopUsers::findOne(['email'=>$params['ToolsLicense']['user_name']]);
                        if($user){
                            $url = 'http://license.7x8yg.com/web/license-api/get-license?email=' . $params['ToolsLicense']['license_email']."&seller_email=".\Yii::$app->params['seller_email'];
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HEADER, false);
                            $data = curl_exec($curl);
                            curl_close($curl);
                            $res=json_decode($data);
                            if($data=="404"){
                                $url = 'http://amazonsmtp.com/web/api/get-license?email=' .$params['ToolsLicense']['license_email'];
                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_HEADER, false);
                                $rem = curl_exec($curl);
                                $rex= json_decode($rem);
                                curl_close($curl);
                                if($rem=="404") {
                                    return $this->render('create', [
                                        'model' => $model,
                                        'error' => "License Email Not Found",
                                    ]);
                                }else{

                                    for($i=0;$i<count($rex);$i++){

                                        $query = new ToolsLicense();
                                        $q= ToolsLicense::findOne(['license_email'=>$rex[$i]->email ,'tool_name'=>$rex[$i]->software ]);

                                        if(!$q) {

                                            $query->user_name = $user->email;
                                            $query->license_email = $rex[$i]->email;
                                            $query->license_key = $rex[$i]->token;
                                            $query->tool_id = 0;
                                            $query->tool_name = $rex[$i]->software;
                                            $query->user_id = $user->id;
                                            $query->rest_count = 0;
                                            $query->shop_name=$_SERVER['SERVER_NAME'];
                                            $query->seller_email=\Yii::$app->params['seller_email'];
                                            $query->expiry_date = date("Y-m-d H:i:s");
                                            $query->created_at = date("Y-m-d H:i:s");

                                            $query->save();
                                        }

                                    }
                                }
                            }else{

                                for($i=0;$i<count($res);$i++){

                                    $query = new ToolsLicense();
                                    $q= ToolsLicense::findOne(['license_email'=>$res[$i]->email ,'tool_name'=>$res[$i]->software ]);

                                    if(!$q) {

                                        $query->user_name = $user->email;
                                        $query->license_email = $res[$i]->email;
                                        $query->license_key = $res[$i]->token;
                                        $query->tool_id = 0;
                                        $query->tool_name = $res[$i]->software;
                                        $query->user_id = $user->id;
                                        $query->rest_count = 0;
                                        $query->shop_name=$_SERVER['SERVER_NAME'];
                                        $query->seller_email=\Yii::$app->params['seller_email'];
                                        $query->expiry_date = date("Y-m-d H:i:s");
                                        $query->created_at = date("Y-m-d H:i:s");

                                        $query->save();
                                    }

                                }

                                $url = 'http://amazonsmtp.com/web/api/get-license?email=' .$params['ToolsLicense']['license_email'];
                                $curl = curl_init();
                                curl_setopt($curl, CURLOPT_URL, $url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_HEADER, false);
                                $rem = curl_exec($curl);
                                $rex= json_decode($rem);
                                curl_close($curl);
                                if($rem=="404") {

                                }else{

                                    for($i=0;$i<count($rex);$i++){

                                        $query = new ToolsLicense();
                                        $q= ToolsLicense::findOne(['license_email'=>$rex[$i]->email ,'tool_name'=>$rex[$i]->software ]);

                                        if(!$q) {

                                            $query->user_name = $user->email;
                                            $query->license_email = $rex[$i]->email;
                                            $query->license_key = $rex[$i]->token;
                                            $query->tool_id = 0;
                                            $query->tool_name = $rex[$i]->software;
                                            $query->user_id = $user->id;
                                            $query->rest_count = 0;
                                            $query->shop_name=$_SERVER['SERVER_NAME'];
                                            $query->seller_email=\Yii::$app->params['seller_email'];
                                            $query->expiry_date = date("Y-m-d H:i:s");
                                            $query->created_at = date("Y-m-d H:i:s");

                                            $query->save();
                                        }

                                    }
                                }


                            }
                        }else{
                            return $this->render('create', [
                                'model' => $model,
                                'error'=>"User Not Found",
                            ]);

                        }
                            return $this->redirect(['index']);
                        }

                    return $this->render('create', [
                        'model' => $model,
                        'error'=>"",
                    ]);



                }else{
                    return  $this->redirect(['user/login']);
                }
            }


            public function actionGet(){
                if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
                    if(\Yii::$app->request->post()){
                        $params = \Yii::$app->request->post();
                        try {
                            if($params['em']){

                            $url = 'http://license.7x8yg.com/web/license-api/get-license?email=' . $params['em']."&seller_email=".\Yii::$app->params['seller_email'];
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HEADER, false);
                            $data = curl_exec($curl);
                            curl_close($curl);
                                if($data!="404") {
                                    return $this->render('index', [
                                        'model' => json_decode($data),
                                        'error' => '',
                                    ]);


                                }else{

                                    $url = 'http://amazonsmtp.com/web/api/get-license?email=' . $params['em'];
                                    $curl = curl_init();
                                    curl_setopt($curl, CURLOPT_URL, $url);
                                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($curl, CURLOPT_HEADER, false);
                                    $data = curl_exec($curl);
                                    curl_close($curl);
                                    if($data!="404") {
                                        return $this->render('index', [
                                            'model' => json_decode($data),
                                            'error' => '',
                                        ]);

                                }else{
                                        return $this->render('index', [
                                            'model' =>"",
                                            'error' => 'Not Found',
                                        ]);
                                    }
                                }
                        }else{
                                return $this->render('index',[
                                    'model'=>'',
                                    'error'=>'Some thing wrong',
                                ]);
                            }
                        }catch (\Exception $EX){
                            return $this->render('index',[
                                'model'=>'',
                                'error'=>'Some thing wrong',
                            ]);
                        }

                    }else{
                        return $this->render('index',[
                            'model'=>'',
                            'error'=>''
                        ]);
                    }
                }else{

                }

            }


            public function actionReset(){
                    if(ShopUsers::is_LoggedIn()){
                        if(\Yii::$app->request->post());
                        $params = \Yii::$app->request->post();
                        $url = 'http://license.7x8yg.com/web/license-api/rest-lice?email=' . $params['license_email']."&token=".$params['license_key'];
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $data = curl_exec($curl);
                        curl_close($curl);
                        if($data=="404"){
                            $url = 'http://amazonsmtp.com/web/api/my-rest-token?email=' . $params['license_email']."&token=".$params['license_key'];
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, $url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HEADER, false);
                            $data = curl_exec($curl);
                            curl_close($curl);
                            if($data=="404"){

                            }else{
                                $model = ToolsLicense::findOne(['license_email' => $params['license_email'], 'license_key' => $params['license_key']]);
                                $model->license_key = trim($data);
                                $model->save();
                            }

                        }else {

                            $model = ToolsLicense::findOne(['license_email' => $params['license_email'], 'license_key' => $params['license_key']]);
                            $model->license_key = trim($data);
                            $model->save();
                            //   return $this->redirect(['tools-license/index']);
                        }
                    }else{
                        return $this->redirect(['login']);
                    }


            }


            


}