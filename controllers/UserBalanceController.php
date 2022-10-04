<?php

namespace app\controllers;

use app\models\ShopUsers;
use app\models\WebPaymentTransaction;
use app\models\WebUsersBalance;
use app\models\WebUsersBalanceSearch;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use BTCPayServer\Client\Invoice;
use BTCPayServer\Client\InvoiceCheckoutOptions;
use BTCPayServer\Util\PreciseNumber;

require __DIR__ . '/../web/btcpay/vendor/autoload.php';
/**
 * UserBalanceController implements the CRUD actions for WebUsersBalance model.
 */
class UserBalanceController extends Controller
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
     * Lists all WebUsersBalance models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WebUsersBalanceSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionAddBalance()
    {
        if (ShopUsers::is_LoggedIn()) {
            $model = WebUsersBalance::find()->where(['username'=>Yii::$app->session->get('username')])->all();
            return $this->render('add_balance',[
                'model'=>$model,
            ]);

        } else {
            $this->redirect((["user/login"]));
        }

    }

    /**
     * Displays a single WebUsersBalance model.
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
     * Creates a new WebUsersBalance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WebUsersBalance();

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
     * Updates an existing WebUsersBalance model.
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

    /**
     * Deletes an existing WebUsersBalance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



// BTCPay Methods
    public function actionBtc(){
        if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()) {
            if ($this->request->post()) {
                $params = $this->request->post();
                try {
                    $client = new Invoice(WebPaymentTransaction::$host, WebPaymentTransaction::$apiKey);
                    // Setup custom checkout options, defaults get picked from store config.

                    $rand = md5(microtime(true) . mt_Rand() . $params['amount']);

                    $checkoutOptions = new InvoiceCheckoutOptions();
                    $checkoutOptions
                        ->setSpeedPolicy($checkoutOptions::SPEED_HIGH)
                        ->setPaymentMethods(['BTC'])
                        ->setRedirectURL(Yii::$app->params['base_url'] . '/user-balance/checkout-complete?code=' . $rand . "&user=" . Yii::$app->session->get('user_id'));

                    $info = $client->createInvoice(
                        WebPaymentTransaction::$storeId,
                        WebPaymentTransaction::$currency,
                        PreciseNumber::parseString($params['amount']),
                        'AddBalance-121-' . mt_rand(0, 1000000),
                        Yii::$app->session->get('buyer_email'),
                        null,
                        $checkoutOptions
                    );

                    $extra = [
                        "id" => $info['id'],
                        "storeId" => $info['storeId'],
                        "amount" => $info['amount'],
                        "status" => $info['status'],
                        "createdTime" => $info['createdTime']
                    ];
                    $model = new WebPaymentTransaction();
                    $model->user_id = Yii::$app->session->get('user_id');
                    $model->user_name = Yii::$app->session->get('buyer_username');
                    $model->payment_amount = $params['amount'];
                    $model->payment_method = "BTCPay";
                    $model->source_currency = "BTC";
                    $model->target_currency = "USD";
                    $model->secure_code = $rand;
                    $model->payment_data = json_encode($extra);
                    $model->status = "Pending";
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->save();
                    return $info["checkoutLink"];
                } catch (\Exception $e) {
                    echo "Error: " . $e->getMessage();
                    exit();
                }
            }
        }else{
            $this->redirect((["user/login"]));
        }
    }


    public function actionCheckoutComplete(){
        if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()) {
            if (Yii::$app->request->get()) {
                try {
                    $params = Yii::$app->request->get();
                    $model = WebPaymentTransaction::findOne(['user_id' => $params['user'], 'secure_code' => $params['code']]);
                    if ($model) {
                        $info = json_decode($model->payment_data);
                        try {
                            $client = new Invoice(WebPaymentTransaction::$host, WebPaymentTransaction::$apiKey);
                            $invoice = $client->getInvoice(WebPaymentTransaction::$storeId, $info->id);

                            if ($invoice['status'] == "Expired" ||
                                $invoice['status'] == "New" ||
                                $invoice['status'] == "Pending" ||
                                $invoice['status'] == "Invalid") {
                                $model->status = $invoice['status'];
                                $model->save();
                                $this->redirect(["user-balance/add-balance"]);

                            } else if ($invoice['status'] == 'Settled' || $invoice['status'] == "Processing") {
                                $model->status = "Paid";
                                if ($model->save()) {
                                    $query = WebUsersBalance::findOne(['payment_transaction_id' => $model->id]);
                                    if ($query) {
                                        $this->redirect(["user-balance/add-balance"]);
                                    } else {
                                        $invoice = $client->getInvoice(WebPaymentTransaction::$storeId, $info->id);
                                        if ($invoice['status'] == 'Settled') {
                                            $balance = new WebUsersBalance();
                                            $uses = ShopUsers::findOne(['id' => $params['user']]);
                                            $balance->username = $uses->username;
                                            $balance->user_email = $uses->email;
                                            $balance->amount = (int)$info->amount;
                                            $balance->payment_transaction_id = $model->id;
                                            $balance->order_id = 0;
                                            $balance->shop_name = $_SERVER['SERVER_NAME'];
                                            $balance->created_at = date('Y-m-d H:i:s');
                                            $balance->save();
                                            print_r($balance);
                                            exit();
                                        }else{
                                            $this->redirect(["user-balance/add-balance"]);
                                        }
                                    }
                                }
                                $this->redirect(["user-balance/add-balance"]);

                            }
                        } catch (\Exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    } else {
                        $this->redirect(["user-balance/add-balance"]);
                    }
                } catch (\Exception $e) {
                    echo "Some thing Wrong";
                    exit();
                }
            } else {
                echo "Bad Request";
                exit();
            }
        }else{
            $this->redirect((["user/login"]));
        }


    }




    // PM Payment Methods

    public function actionPaymentSuccess()
    {
        $params = $params = Yii::$app->request->queryParams;
        //add in table
        $record = WebPaymentTransaction::add_pm_transaction([
            'amount' => $params['PAYMENT_AMOUNT'],
            'user_id' => $params['PAYMENT_ID'],
            'status' => 'completed',
            'response' => [
                'PAYEE_ACCOUNT' => $params['PAYEE_ACCOUNT'],
                'PAYMENT_AMOUNT' => $params['PAYMENT_AMOUNT'],
                'PAYMENT_UNITS' => $params['PAYMENT_UNITS'],
                'SUGGESTED_MEMO' => $params['SUGGESTED_MEMO'],
                'PAYMENT_BATCH_NUM' => $params['PAYMENT_BATCH_NUM']
            ]
        ]);

        //add balance in user account
        $balance = new WebUsersBalance();
        $uses= ShopUsers::findOne(['id'=>$record->user_id]);
        $balance->username =  $uses->username;
        $balance->user_email=$uses->email;
        $balance->amount = $record->payment_amount;
        $balance->payment_transaction_id = $record->id;
        $balance->order_id=0;
        $balance->shop_name=$_SERVER['SERVER_NAME'];
        $balance->created_at = date('Y-m-d H:i:s');
        $balance->save();

        $this->redirect(["user-balance/add-balance"]);
    }

    public function actionPaymentFailed()
    {
        $params = $params = Yii::$app->request->queryParams;

        //add in table
        WebPaymentTransaction::add_pm_transaction([
            'amount' => $params['PAYMENT_AMOUNT'],
            'user_id' => $params['PAYMENT_ID'],
            'status' => 'failed',
            'response' => [
                'PAYEE_ACCOUNT' => $params['PAYEE_ACCOUNT'],
                'PAYMENT_AMOUNT' => $params['PAYMENT_AMOUNT'],
                'PAYMENT_UNITS' => $params['PAYMENT_UNITS'],
                'SUGGESTED_MEMO' => $params['SUGGESTED_MEMO'],
                'PAYMENT_BATCH_NUM' => $params['PAYMENT_BATCH_NUM']
            ]
        ]);

        $this->redirect(["user-balance/add-balance"]);

    }



        public function actionHistory(){
        if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){

            $model = WebUsersBalance::find()->where(['username'=>Yii::$app->session->get('buyer_username')])->all();
            if($model){
                return  $this->render('history',[
                    'model'=>$model,
                ]);

            }else{
                return  $this->render('history',[
                    'model'=>"",
                ]);
            }

        }else{

            return $this->redirect(['user/login']);
        }

        }



    /**
     * Finds the WebUsersBalance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return WebUsersBalance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebUsersBalance::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
