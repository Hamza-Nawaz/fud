<?php

namespace app\controllers;

use app\models\Accounts;
use app\models\ShopUsers;
use app\models\SoftwaresTools;
use app\models\ToolsLicense;
use app\models\WebOrders;
use app\models\WebOrdersSearch;
use app\models\WebUsersBalance;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ .'/../web/smtpauth/vendor/autoload.php';
/**
 * OrdersController implements the CRUD actions for WebOrders model.
 */
class OrdersController extends Controller
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

//    /**
//     * Lists all WebOrders models.
//     *
//     * @return string
//     */
    public function actionIndex()
    {
        if (ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {

            $searchModel = new WebOrdersSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('buyer_index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } elseif (ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {

            $searchModel = new WebOrdersSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->redirect(['user/login']);

        }
    }
//
//    /**
//     * Displays a single WebOrders model.
//     * @param int $id ID
//     * @return string
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//
    public function actionBuy()
    {
        if (ShopUsers::is_LoggedIn()) {
            if ($this->request->post()) {
                $params = $this->request->post();
                $tool = Accounts::findOne(['id' => $params['id']]);
                $user_balane = WebUsersBalance::check_balance();
                if ($user_balane >= $tool->price) {
                    if ($tool->is_taken == 1) {
                        return "Sold";
                    }
                    $tool->is_taken = 1;
                    $tool->save();
                    $order = new WebOrders();
                    $order->username = \Yii::$app->session->get('buyer_username');
                    $order->user_email = \Yii::$app->session->get('user_email');
                    $order->account_id = $params['id'];
                    $order->product_type = $tool->product_type;
                    $order->category_name = $tool->category_name;
                    $order->product_details = $tool->data_log;
                    $order->price = $tool->price;
                    $order->is_reported = "No";
                    $order->is_refunded = "No";
                    $order->status = "Complete";
                    $order->shop_name = $_SERVER['SERVER_NAME'];
                    $order->created_at = date("Y-m-d H:i:s");
                    $order->report_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +5 minutes"));
                    if ($order->save()) {
                        $balance = new WebUsersBalance();
                        $balance->username = \Yii::$app->session->get('buyer_username');
                        $balance->user_email = \Yii::$app->session->get('buyer_email');
                        $balance->payment_transaction_id = 0;
                        $balance->amount = (int)("-" . $tool->price);
                        $balance->order_id = $order->id;
                        $balance->shop_name = $_SERVER['SERVER_NAME'];
                        $balance->created_at = date('Y-m-d H:i:s');
                        $balance->save();
                    }
                    $this->SenMail(Yii::$app->session->get('buyer_email'),"",$order->id);
                    return "Buy";
                } else {
                    return "not_enough_balance";
                }
            }
        } else {
            return $this->redirect(['user/login']);
        }
    }
//
//
    public function actionToolsBuy()
    {
        if (ShopUsers::is_LoggedIn()) {
            if ($this->request->post()) {
                $params = $this->request->post();
                if ($params['email']) {
                    $tool = SoftwaresTools::findOne(['id' => $params['id']]);
                    $user_balane = WebUsersBalance::check_balance();
                    if ($user_balane >= $tool->price) {
                        $em = ToolsLicense::findOne(['user_name' => $params['email'], 'tool_id' => $tool->id]);
                        if ($em) {
                            return "-1";
                        }
                        $tool->total_downloads = $tool->total_downloads + 1;
                        $tool->save();
                        $order = new WebOrders();
                        $order->username = \Yii::$app->session->get('buyer_username');
                        $order->user_email = \Yii::$app->session->get('user_email');
                        $order->account_id = $params['id'];
                        $order->product_type = $tool->software_type;
                        $order->category_name = $tool->name;
                        $order->product_details = $tool->download_link;
                        $order->price = $tool->price;
                        $order->is_reported = "No";
                        $order->is_refunded = "No";
                        $order->status = "Complete";
                        $order->shop_name = $_SERVER['SERVER_NAME'];
                        $order->created_at = date("Y-m-d H:i:s");
                        $order->report_time = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +5 minutes"));
                        if ($order->save()) {
                            $balance = new WebUsersBalance();
                            $balance->username = \Yii::$app->session->get('buyer_username');
                            $balance->user_email = \Yii::$app->session->get('buyer_email');
                            $balance->payment_transaction_id = 0;
                            $balance->amount = (int)("-" . $tool->price);
                            $balance->order_id = $order->id;
                            $balance->shop_name = $_SERVER['SERVER_NAME'];
                            $balance->created_at = date('Y-m-d H:i:s');
                            $balance->save();

                            $url = 'http://license.7x8yg.com/web/license-api/create-license';
                            $post = [
                                'email' => $params['email'],
                                'seller_email' => \Yii::$app->params['seller_email'],
                                'code' => $tool->software_code,
                            ];
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
                            $response = curl_exec($ch);

                            $model = new ToolsLicense();
                            $model->user_id = \Yii::$app->session->get('user_id');
                            $model->user_name = \Yii::$app->session->get('buyer_email');
                            $model->license_email = $params['email'];
                            $model->tool_name = $tool->name;
                            $model->tool_id = $tool->id;
                            $model->license_key = $response;
                            $future_timestamp = strtotime("+1 year");
                            $data = date("Y-m-d H:i:s", $future_timestamp);
                            $model->expiry_date = $data;
                            $model->rest_count = 0;
                            $model->shop_name=$_SERVER['SERVER_NAME'];
                            $model->seller_email = Yii::$app->params['seller_email'];
                            $model->created_at = date("Y-m-d H:i:s");
                            $model->save();

                            $this->SenMail(Yii::$app->session->get('buyer_email'), "License KEY : " . "\n" . $model->license_key . "\n" . "License Email " . "\n" . $model->license_email, $order->id);

                        }
                        return "Buy";
                    } else {
                        return "not_enough_balance";
                    }
                }else{
                    return "-2";
                }
            }
        } else {
            return $this->redirect(['user/login']);
        }
    }
//
//    public function actionCus()
//    {
//        $url = 'http://license.7x8yg.com/web/license-api/create-license';
//        $post = [
//            'email' => \Yii::$app->session->get('buyer_email'),
//            'seller_email' => \Yii::$app->params['seller_email'],
//            'code' => "hsv4s",
//        ];
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
//        $response = curl_exec($ch);
//
//        $model = new ToolsLicense();
//        $model->user_id = \Yii::$app->session->get('user_id');
//        $model->user_name = \Yii::$app->session->get('buyer_email');
//        $model->tool_name = "HeartSenderV4 With SMS";
//        $model->tool_id = 1;
//        $model->license_key = $response;
//        $future_timestamp = strtotime("+1 year");
//        $data = date("Y-m-d H:i:s", $future_timestamp);
//        $model->expiry_date = $data;
//        $model->rest_count = 0;
//        $model->created_at = date("Y-m-d H:i:s");
//        $model->save();
//
//        print_r($response);
//        exit();
//    }
//
        public function actionDetails(){
            if(ShopUsers::is_LoggedIn()){
                $params= \Yii::$app->request->get();
                $query = WebOrders::find()
                    ->where(['id'=>$params['id']])
                    ->all();
                return $this->render('details',[
                    'model'=>$query,
                ]);

            }

        }
//
//
//
    public function SenMail($to_email,$message,$order_id){

        $host = Yii::$app->params['host'];
        $username=Yii::$app->params['username'];
        $password =Yii::$app->params['password'];
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $host;      //Set the SMTP server to send through
            $mail->Username   = $username;                    //SMTP username
            $mail->Password   = $password;                           //SMTP password
            $mail->Port=587;
            $mail->SMTPAuth   = true;
            $mail->Timeout    =   10; // set the timeout (seconds)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->setFrom(Yii::$app->params['from_email'], Yii::$app->params['sender_name']);
            $mail->addAddress($to_email);
            $mail->isHTML(true);
            $mail->Subject = 'Your Order '. $order_id . Yii::$app->params['sender_name'];
           if($message=="") {
               $mail->Body = "Hay ! Mr " . Yii::$app->session->get('buyer_username') . "\n" . '<b>' . "Thank you for Purchasing" . '</b>' . "\n" . "" .
                   '<br/>' . '<br/>' . '<b>' . 'Smtp MarketPlace' . '</b>';
           }else{
               $mail->Body = "Hay ! Mr " . Yii::$app->session->get('buyer_username') . "\n" . '<b>' . "Thank you for Purchasing" . '</b>' . "\n" . "" .
                   '<br/>' . '<br/>' . '<b>' . 'Smtp MarketPlace' . '</b>';
           }
            $mail->send();

        } catch (Exception $e) {
            echo  "Not Working";
            exit();
        }

    }
//
//    /**
//     * Deletes an existing WebOrders model.
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
//
//    /**
//     * Finds the WebOrders model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param int $id ID
//     * @return WebOrders the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = WebOrders::findOne(['id' => $id])) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
