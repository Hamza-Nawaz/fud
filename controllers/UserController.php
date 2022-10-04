<?php

namespace app\controllers;

use app\models\ShopUsers;
use app\models\ShopUsersSearch;
use app\models\WebUsersBalance;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\InlineAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ .'/../web/smtpauth/vendor/autoload.php';
/**
 * UserController implements the CRUD actions for ShopUsers model.
 */
class UserController extends Controller
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
    public function actionIndex()
    {
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new ShopUsersSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()){
            $searchModel = new ShopUsersSearch();
            $dataProvider = $searchModel->search_all_user($this->request->queryParams);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else{
            return  $this->redirect(['login']);
        }
    }







    /**
     * Displays a single ShopUsers model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        }else{
            return  $this->redirect(['login']);
        }
    }

    /**
     * Creates a new ShopUsers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if((ShopUsers::is_admin() || ShopUsers::is_seller()) && ShopUsers::is_LoggedIn()){
        $model = new ShopUsers();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $finder1 = ShopUsers::findOne(['username'=>$model->username]);
                $finder2 = ShopUsers::findOne(['email'=>$model->email]);
                if(!$finder1 && !$finder2) {
                    $model->user_role = "Buyer";
                    $model->is_verified = "Verified";
                    $model->is_blocked = "UnBlocked";
                    $model->shop_name = $_SERVER['SERVER_NAME'];
                    $model->created_at = date("Y-m-d H:i:s");
                    if ($model->save()) {

                        try {
                            $query = new WebUsersBalance();
                            $query->username = $model->username;
                            $query->amount = 0;
                            $query->order_id = 0;
                            $query->user_email = $model->email;
                            $query->payment_transaction_id = 0;
                            $query->shop_name = $_SERVER['SERVER_NAME'];
                            $query->created_at = date("Y-m-d H:i:s");
                            $query->save();
                        } catch (\Exception $ex) {
                            echo "Something Wrong";
                            exit();
                        }
                    }
                }else{
                    return $this->render('create',[
                        'error'=>'Already Exits',
                           'model' => $model,
                    ]);
                }
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'error'=>'',
            'model' => $model,
        ]);
        }else{
            return  $this->redirect(['login']);
        }
    }

    /**
     * Updates an existing ShopUsers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()){
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }else{
            return  $this->redirect(['login']);
        }
    }


    public function actionLogout(){
        if(ShopUsers::is_LoggedIn()) {
            \Yii::$app->session->destroy();
            return   $this->redirect(['login']);
        }else{
            return  $this->redirect(['login']);
        }
    }

    public function actionLogin(){
        $this->layout = false;
        if(Yii::$app->request->isPost){
            $params = Yii::$app->request->post();
           if($params['username'] && $params['password']){
               if(ShopUsers::is_valid($params['username'],$params['password'])){
                    if(ShopUsers::is_blocked($params['username'])){
                        return $this->render('login', [
                            'error' => "Your Account is Blocked Contact to Admin",
                        ]);
                    }else{
                        if(ShopUsers::is_verified($params['username'])){
                            return $this->render('login', [
                                'error' => "Your Account is Not Verified.Check Your Email and Verified",
                            ]);
                        }else{
                            return  $this->redirect(['dashboard/index']);
                        }
                    }
               }else{
                   return $this->render('login', [
                       'error' => "Email or Password is Invalid",
                   ]);
               }
           }else{
               return $this->render('login', [
                   'error' => "Some thing Wrong in Input",
               ]);
           }
        }else{
                return $this->render('login', [
                    'error' => "",
                ]);
            }
        }

//        $model = new ShopUsers();
//        if(Yii::$app->request->post()){
//            $parms=Yii::$app->request->post();
//            if($model->is_valid($parms['Users']['username'],$parms['Users']['password'],$parms['Users']['user_role']))
//            {
//                if(Yii::$app->session->get('is_admin')) {
//                    return $this->redirect(['admin/dashboard/index']);
//                }elseif (Yii::$app->session->get('is_support')){
//                    return $this->redirect(['dashboard/index']);
//                }
//                else{
//                    return $this->redirect(['admin/dashboard/index']);
//                }
//            }else{
//                return $this->render('login', [
//                    'model' => $model,
//                ]);
//            }
//        }else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }

        public function actionRegister(){
            $this->layout = false;
            if(Yii::$app->request->post()){
                $params = Yii::$app->request->post();
                if($params['username'] && $params['email'] && $params['password']){
                    if($this->validateEmail($params['email'])){
                        if(ShopUsers::is_alreadyExits(trim($params['email']),trim($params['username']))){
                            $model = new ShopUsers();
                            $model->email=trim($params['email']);
                            $model->username= trim($params['username']);
                            $model->password=trim($params['password']);
                            $model->user_role="Buyer";
                            $model->is_blocked="UnBlocked";
                            $model->is_verified="Not";
                            $model->shop_name=$_SERVER['SERVER_NAME'];
                            $model->created_at=date("Y-m-d H:i:s");
                            $model->save();
                            $this->AddOn($params['email'],$params['username']);
                            $this->TestSend($params['email'],$params['username']);
                            return  $this->redirect(["verify"]);
                        }else{
                            return $this->render('register', [
                                'error'=>"Username or Email already Exits"
                            ]);
                        }
                    }else{
                        return $this->render('register', [
                            'error'=>"Email is Invalid"
                        ]);
                    }
                }else{
                    return $this->render('register', [
                        'error'=>"Some thing Wrong with Input"
                    ]);
                }
            }else{
                return $this->render('register', [
                    'error'=>""
                ]);

            }
        }


        public function actionVerify(){
            $this->layout = false;
            return $this->render('verify');
        }

        public function actionForget(){
            $this->layout = false;
            if(Yii::$app->request->post()){

            }else{
                echo "Bad Request";
                exit();
            }

        }
    public  function validateEmail($email)
    {
        // SET INITIAL RETURN VARIABLES

        $emailIsValid = FALSE;

        // MAKE SURE AN EMPTY STRING WASN'T PASSED

        if (!empty($email))
        {
            // GET EMAIL PARTS

            $domain = ltrim(stristr($email, '@'), '@') . '.';
            $user   = stristr($email, '@', TRUE);

            // VALIDATE EMAIL ADDRESS

            if
            (
                !empty($user) &&
                !empty($domain) &&
                checkdnsrr($domain)
            )
            {$emailIsValid = TRUE;}
        }

        // RETURN RESULT

        return $emailIsValid;
    }
    /**
     * Deletes an existing ShopUsers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()){
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
        }else{
            return  $this->redirect(['login']);
        }
    }

//  Add Balance


        public function AddOn($email,$username){
                try{
                    $model = new WebUsersBalance();
                    $model->username=$username;
                    $model->amount=0;
                    $model->order_id=0;
                    $model->user_email=$email;
                    $model->payment_transaction_id=0;
                    $model->shop_name=$_SERVER['SERVER_NAME'];
                    $model->created_at=date("Y-m-d H:i:s");
                    $model->save();
                }catch (\Exception $ex){
                    echo "Something Wrong";
                    exit();
                }

        }


    // Send Verification Email


    public function TestSend($to_email,$usernames){

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
                    $mail->Subject = 'Verify Your Account ';
                    $mail->Body="Hay ! Mr ".$usernames."\n".'<b>'."Thank you for SignIn".'</b>'."\n"."Click Blow Link to Verify Your Account".
                '<br/>'."http://".$_SERVER['SERVER_NAME']."/web/user/verify-account?username=".$usernames."&email=".$to_email;
                    '<br/>'.'<br/>'.'<b>'.'Store.HearSender.com'.'</b>';
                    $mail->send();

            } catch (Exception $e) {
                echo  "Not Working";
                exit();
            }

    }




        public function actionVerifyAccount(){
                if(Yii::$app->request->get()){
                    $params = Yii::$app->request->get();
                            try{
                                $username = $params['username'];
                                $email = $params['email'];
                                $query = ShopUsers::findOne(['username'=>$username,'email'=>$params['email']]);

                                if($query){
                                    $query->is_verified="Verified";
                                    $query->save();
                                    return  $this->redirect(['login']);
                                }else{
                                    echo "Some thing Wrong";
                                    exit();
                                }
                            }catch (\Exception $ex){
                                echo "Some thing Wring";
                                exit();

                            }
                }else{
                    echo "Bad request";
                    exit();
                }


        }


            public function actionChangePassword(){
                if(ShopUsers::is_LoggedIn() && ShopUsers::is_buyer()){
                    if($this->request->post()) {
                        try {
                            $params = $this->request->post();
                            $email = Yii::$app->session->get('buyer_email');
                            $model = ShopUsers::findOne(['email' => $email]);
                            $model->password = $params['pass'];
                            $model->save();
                            return $this->render('change-pass', [
                                "error" => "Update Successfully",
                            ]);
                        }catch (\Exception $ex){
                            echo "Some thing Wring";
                            exit();
                        }
                        }else{
                            return $this->render('change-pass', [
                                "error" => "",
                            ]);
                        }

                }else if(ShopUsers::is_LoggedIn() && ShopUsers::is_admin()){

                    if($this->request->post()){


                    }else{
                        echo "Bad Request";
                        exit();
                    }




                }else{
                    return $this->redirect(['login']);
                }


            }








    /**
     * Finds the ShopUsers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ShopUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopUsers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
