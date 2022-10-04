<?php

namespace app\controllers;

use app\models\ReportReply;
use app\models\ReportTool;
use app\models\ReportToolSearch;
use app\models\ShopUsers;
use app\models\WebOrders;
use app\models\WebUsersBalance;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
require __DIR__ .'/../web/smtpauth/vendor/autoload.php';
/**
 * ReportController implements the CRUD actions for ReportTool model.
 */
class ReportController extends Controller
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
     * Lists all ReportTool models.
     *
     * @return string
     */
//    public function actionIndex()
//    {
//
//            $searchModel = new ReportToolSearch();
//            if (ShopUsers::is_LoggedIn() && ShopUsers::is_admin()) {
//                $dataProvider = $searchModel->search($this->request->queryParams);
//                return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//            } else if (ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()) {
//                $dataProvider = $searchModel->search_customer($this->request->queryParams);
//                return $this->render('buyer_report_index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//        }else if (ShopUsers::is_LoggedIn() && ShopUsers::is_support()) {
//                $dataProvider = $searchModel->search($this->request->queryParams);
//                return $this->render('index', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//        }else{
//            return $this->redirect(['user/login']);
//        }
//    }
//
//    public function actionSetReport(){
//
//        if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()) {
//            if (\Yii::$app->request->get()) {
//                $params = $this->request->get();
//                $query = WebOrders::findOne(['id' => $params['order_id']]);
//                if ($query->report_time > date("Y-m-d H:i:s")) {
//                    $model = new ReportTool();
//                    if ($this->request->isPost) {
//                        $model = new ReportTool();
//                        if ($model->load($this->request->post())) {
//                            $ticket_reply = new ReportReply();
//                            if ($model->load(Yii::$app->request->post())) {
//                                $model->buyer_id = Yii::$app->session->get('user_id');
//                                $model->buyer_username = Yii::$app->session->get('buyer_username');
//                                $model->buyer_email = Yii::$app->session->get('buyer_email');
//                                $model->order_id = $params['order_id'];
//                                $model->tool_id = $params['tool_id'];
//                                $model->tool_type = $params['tool_type'];
//                                $model->shop_name= $_SERVER['SERVER_NAME'];
//                                $model->is_solved = 0;
//                                $model->is_refunded = 0;
//                                $model->refund_amount = 0;
//                                $model->created_at = date("Y-m-d H:i:s");
//                                if ($model->save()) {
//                                    $order = WebOrders::findOne(['id' => $params['order_id']]);
//                                    $order->is_reported = "Yes";
//                                    $order->save();
//                                    $ticket_reply->user_id = Yii::$app->session->get('user_id');
//                                    $ticket_reply->buyer_useremail = Yii::$app->session->get('buyer_email');
//                                    $ticket_reply->report_id = $model->id;
//                                    $ticket_reply->message = $model->report_descriptio;
//                                    $ticket_reply->created_at = date("Y-m-d H:i:s");
//                                    $ticket_reply->save();
//                                    $ticket_reply2 = new ReportReply();
//                                    $ticket_reply2->user_id = -1;
//                                    $ticket_reply2->buyer_useremail = "support@marketplace.com";
//                                    $ticket_reply2->report_id = $model->id;
//                                    $ticket_reply2->message = "Dear buyer, please be patient.\nSeller have 12hr time, for answer your report,**.";
//                                    $ticket_reply2->created_at = date("Y-m-d H:i:s");
//                                    $ticket_reply2->save();
//                                    //   $this->Telgrm($model->id, $model->order_id, $model->tool_type, $model->report_description, $model->customer_email, "No");
//
//                                    return $this->redirect(['index']);
//                                }
//                            }
//                        } else {
//                            $model->loadDefaultValues();
//                        }
//
//                    }
//                    return $this->render('create1', [
//                        'model' => $model,
//                    ]);
//                }else{
//                    return $this->render('expire');
//                }
//            }
//        }else{
//            return $this->redirect(['user/login']);
//        }
//
//    }
//
//
//    public function actionSolved(){
//
//        if((ShopUsers::is_LoggedIn() && ShopUsers::is_admin()) || (ShopUsers::is_support() && ShopUsers::is_LoggedIn()) ) {
//            if($this->request->post()){
//                $params = $this->request->post();
//                $query = ReportTool::findOne(['id'=>$params['id']]);
//                $query->is_solved=1;
//                $query->save();
//
//
//
////                $notify = new Notifications();
////                $notify->recipient_id=$query->customer_id;
////                $notify->sender=1;
////                $notify->message="Your Report is Solved";
////                $notify->is_read="No";
////                $notify->created_at = date("Y-m-d H:i:s");
////                $notify->updated_at = date("Y-m-d H:i:s");
////                $notify->save();
//              //  $q = ReportReply::find()->where(['report_id'=>$query->id,'user_id'=>1])->orderBy(['id' => SORT_DESC])->one();
//
//           //     $this->Telgrm($query->id,$query->order_id,$query->tool_type,$q->message,$query->customer_email,"Yes");
//
//             //   $this->seller_tele($query->customer_email);
//
//                return "solve";
//            }
//        }
//        else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){
//            return $this->render('notfound');
//        }
//        else{
//            return $this->redirect(['user/login']);
//        }
//
//
//    }
////
////
//    public function actionRefund()
//    {
//        if ((ShopUsers::is_LoggedIn() && ShopUsers::is_admin()) || (ShopUsers::is_LoggedIn() && ShopUsers::is_support())  ) {
//            if ($this->request->post()) {
//                $params = $this->request->post();
//                $query = ReportTool::findOne(['id' => $params['id']]);
//                $order = WebOrders::findOne(['id' => $params['order_id']]);
//                $query->is_refunded = 1;
//                $query->refund_amount = (string)$order->price;
//                $query->save();
//                if ($order->save()) {
//                    $balance = new WebUsersBalance();
//                    $balance->username = $query->buyer_username;
//                    $balance->order_id = $query->order_id;
//                    $balance->amount = $query->refund_amount;
//                    $balance->created_at = date("Y-m-d H:i:s");
//                    $balance->payment_transaction_id = 0;
//                    $balance->user_email = $query->buyer_email;
//                    $balance->shop_name = $_SERVER['SERVER_NAME'];
//                    $balance->save();
//                    $msg = "Hay Mr. ".Yii::$app->session->get('buyer_username') ."\n".'<b>'."We Review your Order  and We decied to Refund Your Total Amount is : " . $query->refund_amount.'</b>'. '<br/>'.'<br/>'.'<b>'.'Smtp MarketPlace'.'</b>';  ;
//                   // $this->SenMail(Yii::$app->session->get('buyer_email'),"",$query->order_id,'Order Refund of Order ID  '. $query->order_id ." ". Yii::$app->params['sender_name']);
//
////                    $this->Telgrm($query->id, $query->order_id, $query->tool_type, "Your Payment is refund ", $query->customer_email, "Yes");
////                    $this->seller_tele($query->customer_email);
//
//
//                    return "refund";
//                }
//            }
//        }
//    }
//
//
//    public function SenMail($to_email,$message,$order_id,$subject){
//
//        $host = Yii::$app->params['host'];
//        $username=Yii::$app->params['username'];
//        $password =Yii::$app->params['password'];
//        $mail = new PHPMailer(true);
//        try {
//            $mail->SMTPDebug = 0;
//            $mail->isSMTP();                                            //Send using SMTP
//            $mail->Host       = $host;      //Set the SMTP server to send through
//            $mail->Username   = $username;                    //SMTP username
//            $mail->Password   = $password;                           //SMTP password
//            $mail->Port=587;
//            $mail->SMTPAuth   = true;
//            $mail->Timeout    =   10; // set the timeout (seconds)
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//            $mail->setFrom(Yii::$app->params['from_email'], Yii::$app->params['sender_name']);
//            $mail->addAddress($to_email);
//            $mail->isHTML(true);
//            $mail->Subject = $subject;
//            $mail->Body=$message;
//            $mail->send();
//
//        } catch (Exception $e) {
//            echo  "Not Working";
//            exit();
//        }
//
//    }
//
////    /**
////     * Displays a single ReportTool model.
////     * @param int $id ID
////     * @return string
////     * @throws NotFoundHttpException if the model cannot be found
////     */
////    public function actionView($id)
////    {
////        return $this->render('view', [
////            'model' => $this->findModel($id),
////        ]);
////    }
////
////    /**
////     * Creates a new ReportTool model.
////     * If creation is successful, the browser will be redirected to the 'view' page.
////     * @return string|\yii\web\Response
////     */
////    public function actionCreate()
////    {
////        $model = new ReportTool();
////
////        if ($this->request->isPost) {
////            if ($model->load($this->request->post()) && $model->save()) {
////                return $this->redirect(['view', 'id' => $model->id]);
////            }
////        } else {
////            $model->loadDefaultValues();
////        }
////
////        return $this->render('create', [
////            'model' => $model,
////        ]);
////    }
////
////    /**
////     * Updates an existing ReportTool model.
////     * If update is successful, the browser will be redirected to the 'view' page.
////     * @param int $id ID
////     * @return string|\yii\web\Response
////     * @throws NotFoundHttpException if the model cannot be found
////     */
////    public function actionUpdate($id)
////    {
////        $model = $this->findModel($id);
////
////        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
////            return $this->redirect(['view', 'id' => $model->id]);
////        }
////
////        return $this->render('update', [
////            'model' => $model,
////        ]);
////    }
////
////    /**
////     * Deletes an existing ReportTool model.
////     * If deletion is successful, the browser will be redirected to the 'index' page.
////     * @param int $id ID
////     * @return \yii\web\Response
////     * @throws NotFoundHttpException if the model cannot be found
////     */
////    public function actionDelete($id)
////    {
////        $this->findModel($id)->delete();
////
////        return $this->redirect(['index']);
////    }
////
////    /**
////     * Finds the ReportTool model based on its primary key value.
////     * If the model is not found, a 404 HTTP exception will be thrown.
////     * @param int $id ID
////     * @return ReportTool the loaded model
////     * @throws NotFoundHttpException if the model cannot be found
////     */
//    protected function findModel($id)
//    {
//        if (($model = ReportTool::findOne(['id' => $id])) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
