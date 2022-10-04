<?php


namespace app\controllers;


use app\models\Notifications;
use app\models\Orders;
use app\models\ReportReply;
use app\models\ReportTool;
use app\models\ShopUsers;
use app\models\WebOrders;
use Yii;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ReportReplyController extends  Controller
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
//     * Lists all UserTickets models.
//     * @return mixed
//     */
//    public  function actionIndex()
//    {
//        if (ShopUsers::is_LoggedIn() && ShopUsers::is_support()) {
//
//            $model = new ReportReply();
//            $params = Yii::$app->request->queryParams;
//            $id = "";
//            $user_id = "";
//            if ($params != NULL) {
//                $id = $params['id'];
//                $user_id = $params['user_id'];
//            }
//            if ($model->load(Yii::$app->request->post())) {
//
//                $id = Yii::$app->request->post()['ReportReply']["report_id"];
//                $user_id = Yii::$app->request->post()['ReportReply']["customer_id"];
//                $model->user_id = Yii::$app->session->get('user_id');
//                $model->buyer_useremail = Yii::$app->session->get('user_email');
//                $model->created_at = date("Y-m-d H:i:s");
//                $model->save();
//
//
//
//
////                $notify = new Notifications();
////                $notify->recipient_id=(int)$user_id;
////                $notify->sender=(string)Yii::$app->session->get('user_id');
////                $notify->message="Admin Reply Your Report";
////                $notify->is_read="No";
////                $notify->created_at = date("Y-m-d H:i:s");
////                $notify->updated_at = date("Y-m-d H:i:s");
////                $notify->save();
//
//
//
//                return $this->redirect(['index', 'id' => $id, 'user_id' => $user_id]);
//            }
//            $title= ReportTool::findOne(['id'=>$id]);
//
//            $messages = ReportReply::find()
//                ->where(['report_id' => $id])->orderBy(['created_at'=>SORT_ASC]);
//            $user= ShopUsers::findOne(["id"=>Yii::$app->session->get("user_id")]);
//            $user_type=$user->user_role;
//            $user1= ShopUsers::findOne(['id'=>$user_id]);
//            $countQuery = clone $messages;
//            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
//            $models = $messages->offset($pages->offset)
//                ->limit($pages->limit)
//                ->all();
//                $order = WebOrders::findOne(['username'=>$user1->username,'account_id'=>$title->tool_id,'is_reported'=>'Yes']);
//            return $this->render('index', [
//                'model' => $model,
//                'messages' => $models,
//                'ticket_id'=>$id,
//                'ticket_user_id'=>$user_id,
//                'ticket_user_email'=>$user1->email,
//                'title'=> $title->report_title,
//                'pages' => $pages,
//                'user_type'=>$user_type,
//                'tool_type'=>$order->product_type,
//                'tool_desc'=>$order->product_details,
//                'price'=>$order->price,
//                'is_reported'=>$order->is_reported,
//                'is_refund'=>$order->is_refunded,
//            ]);
//        }
//        else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){
//            $model = new ReportReply();
//            $params = Yii::$app->request->queryParams;
//            $id = "";
//            $user_id = "";
//            if ($params != NULL) {
//                $id = $params['id'];
//                $user_id = $params['user_id'];
//            }
//            if ($model->load(Yii::$app->request->post())) {
//
//                $id = Yii::$app->request->post()['ReportReply']["report_id"];
//                $user_id = Yii::$app->request->post()['ReportReply']["customer_id"];
//                $model->user_id = Yii::$app->session->get('user_id');
//                $model->user_email = Yii::$app->session->get('seller_email');
//                $model->created_at = date("Y-m-d H:i:s");
//                $model->save();
//
//
//
//
////                $notify = new Notifications();
////                $notify->recipient_id=(int)$user_id;
////                $notify->sender=(string)Yii::$app->session->get('user_id');
////                $notify->message="Admin Reply Your Report";
////                $notify->is_read="No";
////                $notify->created_at = date("Y-m-d H:i:s");
////                $notify->updated_at = date("Y-m-d H:i:s");
////                $notify->save();
////                $user = ShopUsers::findOne(['id'=>$user_id])->email;
////                $this->seller_tele($user);
//
//                return $this->redirect(['index', 'id' => $id, 'user_id' => $user_id]);
//            }
//            $title= ReportTool::findOne(['id'=>$id]);
//
//            $messages = ReportReply::find()
//                ->where(['report_id' => $id])->orderBy(['created_at'=>SORT_ASC]);
//            $user_type= ShopUsers::findOne(["id"=>Yii::$app->session->get("user_id")])->user_type;
//            $countQuery = clone $messages;
//            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
//            $models = $messages->offset($pages->offset)
//                ->limit($pages->limit)
//                ->all();
//            $order = WebOrders::findOne(['user_id'=>$user_id,'tool_id'=>$title->tool_id,'is_reported'=>'Yes']);
//
//            return $this->render('index', [
//                'model' => $model,
//                'messages' => $models,
//                'ticket_id'=>$id,
//                'ticket_user_id'=>$user_id,
//                'title'=> $title->report_title,
//                'pages' => $pages,
//                'user_type'=>$user_type,
//                'tool_type'=>$order->product_type,
//                'tool_desc'=>$order->product_details,
//                'price'=>$order->price,
//                'is_reported'=>$order->is_reported,
//                'is_refund'=>$order->is_refunded,
//            ]);
//        }
//
//        else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()){
//            return $this->render('notfound');
//        }
//
//        else {
//            return $this->redirect(['user/login']);
//        }
//    }
////    private function seller_tele($email){
////
////        $huzaif_bot_token="1906323284:AAHlRG1f6BgP-L_t0juPJJpJCDjqcrafo1k";
////        $huzaif_bot_id="1323280329";
////
////        $bilal_bot_token="2133419869:AAGEhgco0ExBBueCsAtikvi-zeGb8gv1NqE";
////        $bilal_bot_id="904621077";
////
////        $hamza_bot_token="2122986597:AAHjRcUi--PRG6Fb-BYg9kZ1amZvkB6bm70";
////        $hamza_bot_id="1554006905";
////
////        $moshin_bot_token="1084801961:AAEY2Rfs91qfzmk0-A6_pyV9sUPhQ_QU51o";
////        $moshin_bot_id="1084268950";
////
////        $nohair_bot_token="2139437266:AAFZfDtbDaim_I-U4WBU0TKLU6ZNQ92r18U";
////        $nohair_bot_id="682297612";
////
////        $rida_bot_token="5431986194:AAE5z5X7x_HZk_Oxj7GsCxzLHZx1RLdCGuM";
////        $rida_bot_id="5017171452";
////
////        $tabi_bot_token="2104917964:AAFEd-4hHYX4ZvaF7ea632-8gUj1DGoHpkk";
////        $tabi_bot_id="1920758074";
////
////        $shamsa_bot_token ="2129339025:AAGwKiNQnFrcj2Jn3EDm0c0-yEBQeNhOxOw";
////        $shamsa_bot_id="952147185";
////
////
////
////        // ch adnan
////        $adnan_bot_token ="5459835657:AAFvdi8hfW-54Vhl7uRsNZlTKEhyJr1Xr6I";
////        $adnan_bot_id="687787805";
////        // nomi
////        $nomi_bot_token ="5581058206:AAFABUYNzTCc9-GzbAIGiSEL5vL7lOOw6YE";
////        $nomi_bot_id="1288742725";
////        //shobi
////        $shobi_bot_token ="5574365396:AAHVx-jYiMvSqcN-yXx8bzk9AXxUZivF_Ls";
////        $shobi_bot_id="5005188738";
////
//////       bana
////        $burhan_bot_token ="5388768216:AAFjBBJ2QuU26KttRT5syaY5Qghx3o0m4AU";
////        $burhan_bot_id="1241935911";
////
////
////
////
////
////
////
////        if($email=="huzaifkhokhar90@gmail.com"){
////            $this->sendMsg($huzaif_bot_token,$huzaif_bot_id);
////        }elseif($email=="bawaddaich@gmail.com"){
////            $this->sendMsg($bilal_bot_token,$bilal_bot_id);
////        }elseif($email=="dream.k3ller@gmail.com"){
////            $this->sendMsg($hamza_bot_token,$hamza_bot_id);
////        }elseif($email=="javed.jewelers@gmail.com"){
////            $this->sendMsg($moshin_bot_token,$moshin_bot_id);
////        }elseif($email=="jam.noshair@gmail.com"){
////            $this->sendMsg($nohair_bot_token,$nohair_bot_id);
////        }elseif($email=="rida44shamas@gmail.com"){
////            $this->sendMsg($rida_bot_token,$rida_bot_id);
////        }elseif($email=="tabijavid@gmail.com"){
////            $this->sendMsg($tabi_bot_token,$tabi_bot_id);
////        }elseif ($email=="heartsender123@gmail.com"){
////            $this->sendMsg($shamsa_bot_token,$shamsa_bot_id);
////        }elseif ($email=="lionsoftzz@gmail.com"){
////            $this->sendMsg($adnan_bot_token,$adnan_bot_id);
////        }elseif ($email=="help.alizain@gmail.com"){
////            $this->sendMsg($nomi_bot_token,$nomi_bot_id);
////        }elseif ($email=="dhf0099@gmail.com"){
////            $this->sendMsg($shobi_bot_token,$shobi_bot_id);
////        }elseif ($email=="burhanshaxx990@gmail.com"){
////            $this->sendMsg($burhan_bot_token,$burhan_bot_id);
////        }
////
////
////
////    }
////    private  function sendMsg($token ,$id){
////
////        $txt2=urlencode("Admin Reply Your Report  \n Kindly Check Shop Login \n Thank you.");
////
////        $url1 = "https://api.telegram.org/bot" . $token . "/sendmessage?chat_id=" . $id . "&text=".$txt2;
////        $handle = curl_init();
////        curl_setopt($handle, CURLOPT_URL, $url1);
////        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
////        $data = curl_exec($handle);
////        curl_close($handle);
////
////
////    }
////
//    public  function actionReply()
//    {
//        if (ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()) {
//
//            $model = new ReportReply();
//            $params = Yii::$app->request->queryParams;
//            $id = "";
//            $user_id = "";
//
//            if ($params != NULL) {
//                $id = $params['id'];
//                $user_id = Yii::$app->session->get('user_id');
//            }
//            if ($model->load(Yii::$app->request->post())) {
//
//                $id = Yii::$app->request->post()['ReportReply']["report_id"];
//                $user_id = Yii::$app->request->post()['ReportReply']["user_id"];
//                $model->user_id = Yii::$app->session->get('user_id');
//                $model->buyer_useremail = Yii::$app->session->get('buyer_email');
//                $model->created_at = date("Y-m-d H:i:s");
//                $model->save();
//
//
//
//
////                $notify = new Notifications();
////                $notify->recipient_id=1;
////                $notify->sender=$user_id;
////                $notify->message="Customer Reply of Your Message";
////                $notify->is_read="No";
////                $notify->created_at = date("Y-m-d H:i:s");
////                $notify->updated_at = date("Y-m-d H:i:s");
////                $notify->save();
//
//
//
//
//                return $this->redirect(['reply', 'id' => $id, 'user_id' => $user_id]);
//            }
//            $q= ReportTool::findOne(['id'=>$id]);
//            $title=$q->report_title;
//            $status=$q->is_solved;
//            $messages = ReportReply::find()
//                ->where(['report_id' => $id])->orderBy(['created_at'=>SORT_ASC]);
//
//            $user_type= ShopUsers::findOne(["id"=>Yii::$app->session->get("user_id")])->user_role;
//            $countQuery = clone $messages;
//            $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 6]);
//            $models = $messages->offset($pages->offset)
//                ->limit($pages->limit)
//                ->all();
//                $order = WebOrders::findOne(['username'=>Yii::$app->session->get('buyer_username'),'account_id'=>$q->tool_id,'is_reported'=>'Yes']);
//            return $this->render('index1', [
//                'model' => $model,
//                'messages' => $models,
//                'ticket_id'=>$id,
//                'ticket_user_id'=>$user_id,
//                'title'=>$title,
//                'pages' => $pages,
//                'user_type'=>$user_type,
//                'status'=>$status,
//                'tool_type'=>$order->product_type,
//                'tool_desc'=>$order->product_details,
//                'price'=>$order->price,
//                'is_reported'=>$order->is_reported,
//                'is_refund'=>$order->is_refunded,
//            ]);
//        }
//        else {
//            return $this->redirect(['billing/login']);
//        }
//
//    }

}