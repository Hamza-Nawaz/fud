<?php

namespace app\controllers;

use app\models\ShopUsers;
use app\models\SoftwaresTools;
use app\models\SoftwaresToolsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoftwaresToolsController implements the CRUD actions for SoftwaresTools model.
 */
class SoftwaresToolsController extends Controller
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
    public function actionIndex()
    {
        if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){
            $query =  SoftwaresTools::find()
                ->all();
            return $this->render('buyer_index',[
                'model'=>$query,
            ]);

        }else if(ShopUsers::is_LoggedIn() && ShopUsers::is_admin()) {
            $searchModel = new SoftwaresToolsSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()) {
            $query =  SoftwaresTools::find()
                ->all();
            return $this->render('seller_index',[
                'model'=>$query,
            ]);
        }else{
            return  $this->redirect(['user/login']);
        }
    }

        public function actionSenders(){
                if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
                    $query =  SoftwaresTools::find()
                        ->where(['software_type'=>'Sender'])
                        ->all();
                        return $this->render('buyer_index',[
                            'model'=>$query,
                            ]);
                }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()){
                    $query =  SoftwaresTools::find()
                        ->where(['software_type'=>'Sender'])
                        ->all();
                    return $this->render('seller_index',[
                        'model'=>$query,
                    ]);
                }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_admin()) {
                    $query =  SoftwaresTools::find()
                        ->where(['software_type'=>'Sender'])


                        ->all();
                    return $this->render('seller_index',[
                        'model'=>$query,
                    ]);

                }else{
                    return  $this->redirect(['user/login']);
                }

        }

        public function actionVerifiers(){
            if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
                $query =  SoftwaresTools::find()
                    ->where(['software_type'=>'Verifier'])->all();
                return $this->render('buyer_index',[
                    'model'=>$query,
                ]);
            }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_admin()){

            }elseif(ShopUsers::is_LoggedIn() && ShopUsers::is_seller()) {
                $query =  SoftwaresTools::find()
                    ->where(['software_type'=>'Verifier'])->all();
                return $this->render('seller_index',[
                    'model'=>$query,
                ]);

            }else{
                return  $this->redirect(['user/login']);
            }
        }





    /**
     * Displays a single SoftwaresTools model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SoftwaresTools model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SoftwaresTools();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SoftwaresTools model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

//    /**
//     * Deletes an existing SoftwaresTools model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param int $id ID
//     * @return \yii\web\Response
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the SoftwaresTools model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SoftwaresTools the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SoftwaresTools::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
