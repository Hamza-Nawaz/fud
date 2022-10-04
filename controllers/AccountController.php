<?php

namespace app\controllers;

use app\models\Accounts;
use app\models\AccountsSearch;
use app\models\ShopUsers;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
require __DIR__ .'/../web/smtpauth/vendor/autoload.php';
/**
 * AccountController implements the CRUD actions for Accounts model.
 */
class AccountController extends Controller
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
//     * Lists all Accounts models.
//     *
//     * @return string
//     */
//    public function actionIndex()
//    {
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//
//        public function actionAllAccounts(){
//
//            if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//                $searchModel = new AccountsSearch();
//                $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//                return $this->render('admin_accounts', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//            }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//                $searchModel = new AccountsSearch();
//                $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//                return $this->render('buyer_accounts', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//
//            }else{
//                return  $this->redirect(['login']);
//            }
//
//        }
//
//
//
// public function actionHetzaner(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_hetzner($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//    public function actionAws(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_amazon($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//
// public function actionIonos(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_ionos($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//
//    public function actionLinode(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_linode($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//    public function actionOracle(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_accounts($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_admin_oracle($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
        public function actionSmtps(){
            if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_admin_smtp($this->request->queryParams);
                return $this->render('admin_smtps', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_admin_smtp($this->request->queryParams);
                return $this->render('buyer_smtp', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);

            }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_admin_smtp($this->request->queryParams);
                return $this->render('admin_smtps', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }else{
                return  $this->redirect(['user/login']);
            }
        }
//
    public function actionWebmails(){
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_all($this->request->queryParams);
            return $this->render('admin_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }elseif(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_all($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }elseif(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_all($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            return  $this->redirect(['login']);
        }
    }
//
//
//    /**
//     * Displays a single Accounts model.
//     * @param int $id ID
//     * @return string
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Accounts model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return string|\yii\web\Response
//     */
//    public function actionCreate()
//    {
//        $model = new Accounts();
//
//        if ($this->request->isPost) {
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Accounts model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param int $id ID
//     * @return string|\yii\web\Response
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Accounts model.
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
//     * Finds the Accounts model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param int $id ID
//     * @return Accounts the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Accounts::findOne(['id' => $id])) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
//
    public function actionTestSend(){
        if($this->request->post() && ShopUsers::is_LoggedIn()){
            Yii::$app->controller->enableCsrfValidation = false;
            $params=$this->request->post();
            $smtp = Accounts::findOne(['id'=>$params['data']]);
            $row = explode(':',$smtp->data_log);
            $host = trim($row[0]);
            $username=trim($row[2]);
            $password =trim($row[3]);
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = $host;      //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = $username;                    //SMTP username
                $mail->Password   = $password;                           //SMTP password
                if(str_contains($host,'strato') ||
                    str_contains($host,'strato.de') ||
                    str_contains($host,'turbo')  ){
                    $mail->Port       = 465;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->SMTPAuth   = true;
                    $mail->Timeout    =   10; // set the timeout (seconds)
                    $mail->setFrom($username, 'Mailer');
                    $mail->addAddress("usamajony@gmail.com");
                    $mail->isHTML(false);                              //Set email format to HTML
                    $mail->Subject = 'Test SMTP -'.$this->generateRandomString();
                    $mail->Body    = 'Hay  - '.$this->generateRandomString()."\n"."Your SMTP id:".$params['data']."is Working"."\n".date("Y-m-d H:i:s");
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    echo "OK";
                    exit();

                }else if(str_contains($host,'mail.gmx.com')){
                    $mail->Port=25;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPOptions = array (
                        'ssl' => array(
                            'verify_peer'  => false,
                            'verify_peer_name'  => false,
                            'allow_self_signed' => true));
                    $mail->Timeout    =   10; // set the timeout (seconds)
                    $mail->setFrom($username, $this->generateRandomString());
                    $mail->addAddress(Yii::$app->session->get('user_email'));
                    $mail->Subject = 'Test SMTP -'. $this->generateRandomString();
                    $mail->Body    = 'Hay  - '.$this->generateRandomString()."-"."Your SMTP id:"."-".$params['data']."-is Working"."-".date("Y-m-d H:i:s");
                    $mail->isHTML(false);
                    $mail->send();
                    echo "OK";
                    exit();
                }else{

                    $mail->Port=587;
                    $mail->SMTPAuth   = true;
                    // $mail->SMTPAutoTLS = true;
                    $mail->Timeout    =   10; // set the timeout (seconds)
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->setFrom($username, $this->generateRandomString());
                    $mail->addAddress(Yii::$app->session->get('user_email'));
                    $mail->Subject = 'Test SMTP -'. $this->generateRandomString();
                    $mail->Body    = 'Hay  - '.$this->generateRandomString()."-"."Your SMTP id:"."-".$params['data']."-is Working"."-".date("Y-m-d H:i:s");
                    $mail->isHTML(false);
                    $mail->send();
                    echo "OK";
                    exit();
                }
            } catch (Exception $e) {

                $sm = Accounts::findOne(['id'=>$params['data']]);
                $sm->smtp_broken=1;
                $sm->save();

                echo  "Not Working";
                exit();
            }
        }
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
//
//
//
//
//    // Webmails Type
//
    public function actionWebmailsIonos(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_ionos($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_ionos($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_ionos($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }
//
    public function actionWebmailsZimbra(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_zimbra($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_zimbra($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_zimbra($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }


    public function actionWebmailsRackspace(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_rackspace($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_rackspace($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_rackspace($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }

    public function actionWebmailsStarto(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_starto($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_starto($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_starto($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }



    public function actionWebmailsTOnline(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_t_online($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_t_online($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_t_online($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }
    public function actionWebmailsAruba(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_aruba($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_aruba($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_aruba($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }


//
//
//
//    public function actionWebmailsXserver(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Xserver($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Xserver($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//
//    public function actionWebmailsProximus(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Proximus($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Proximus($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//    public function actionWebmailsMimecast(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Mimecast($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Mimecast($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
    public function actionWebmailsSakura(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Sakura($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Sakura($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Sakura($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }
//
    public function actionWebmailsKagoya(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Kagoya($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Kagoya($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Kagoya($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }


    public function actionWebmailsBiglobejp(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Biglobejp($this->request->queryParams);
            return $this->render('admin_accounts', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Biglobejp($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_webmails_Biglobejp($this->request->queryParams);
            return $this->render('buyer_webmails', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['login']);
        }

    }
//
//    public function actionWebmailsEarthlink(){
//
//        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Earthlink($this->request->queryParams);
//            return $this->render('admin_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//            $searchModel = new AccountsSearch();
//            $dataProvider = $searchModel->search_webmails_Earthlink($this->request->queryParams);
//            return $this->render('buyer_accounts', [
//                'searchModel' => $searchModel,
//                'dataProvider' => $dataProvider,
//            ]);
//
//        }else{
//            return  $this->redirect(['login']);
//        }
//
//    }
//
//
//    // Smtp Type
//
    public function actionSmtpIonos(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_ionos($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_ionos($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_ionos($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpRackspace(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Rackspace($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Rackspace($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Rackspace($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpInboxlv(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Inboxlv($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Inboxlv($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Inboxlv($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpVerizon(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Verizon($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Verizon($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Verizon($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpDreamhost(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Dreamhost($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Dreamhost($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpGmx(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_GMX($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_GMX($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_GMX($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);

        }

    }

    public function actionSmtpOffice365(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Office365($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Office365($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Office365($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);
        }

    }

    public function actionSmtpStrato(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Strato($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Strato($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);
        }

    }

    public function actionSmtpSendgrid(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Sendgrid($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Sendgrid($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Sendgrid($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);
        }

    }

    public function actionSmtpBiglobe(){

        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Biglobe($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Biglobe($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Smtp_Biglobe($this->request->queryParams);
            return $this->render('buyer_smtp', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);
        }

    }

//
//    // HOST
//
//        public function actionWpAdmin(){
//
//            if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
//                $searchModel = new AccountsSearch();
//                $dataProvider = $searchModel->search_Host_WpAdmin($this->request->queryParams);
//                return $this->render('admin_accounts', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//            }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
//                $searchModel = new AccountsSearch();
//                $dataProvider = $searchModel->search_Host_WpAdmin($this->request->queryParams);
//                return $this->render('buyer_accounts', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
//                ]);
//
//            }else{
//                return  $this->redirect(['login']);
//            }
//
//        }
//
//
//



    public function actionShells(){
        if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Host_shells($this->request->queryParams);
            return $this->render('admin_shells', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Host_shells($this->request->queryParams);
            return $this->render('buyer_shells', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
            $searchModel = new AccountsSearch();
            $dataProvider = $searchModel->search_Host_shells($this->request->queryParams);
            return $this->render('buyer_shells', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{
            return  $this->redirect(['user/login']);
        }
    }


        public function actionCpanel(){
            if(ShopUsers::is_admin() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_Host_cpanel($this->request->queryParams);
                return $this->render('admin_accounts', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }else if(ShopUsers::is_buyer() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_Host_cpanel($this->request->queryParams);
                return $this->render('buyer_cpanel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);

            }else if(ShopUsers::is_seller() && ShopUsers::is_LoggedIn()) {
                $searchModel = new AccountsSearch();
                $dataProvider = $searchModel->search_Host_cpanel($this->request->queryParams);
                return $this->render('buyer_cpanel', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);

            }else{
                return  $this->redirect(['user/login']);
            }
        }

//  Check cPanel

        public function actionCheckCpanel(){
            if(ShopUsers::is_LoggedIn()) {
                if (Yii::$app->request->post()) {
                    $params = Yii::$app->request->post();
                    $model = Accounts::findOne(['id'=>$params['data']]);
                    $row=explode(':',$model->data_log);

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "http://5.161.109.65:1100/cpanel/check_from_post_body");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"url\":\"" . "http:".$row[3].":".$row[4]. "\",\n  \"login\":\"" . $row[0] . "\",\n  \"password\":\"" . $row[1] . "\"\n}");
                    $headers = array();
                    $headers[] = 'Content-Type: application/json';
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                    $res = curl_exec($ch);
                    if($res=="Credentials valid") {
                        print_r($res);
                        exit();
                    }else {
                        $sm = Accounts::findOne(['id' => $params['data']]);
                        $sm->smtp_broken = 1;
                        $sm->save();
                        print_r("Not Working");
                        exit();

                    }
                    exit();

                } else {
                    return $this->redirect(['user/login']);
                }

            }else{
                echo "Bad Request";
                exit();
            }
        }




    public function actionCheckShell(){
        if(ShopUsers::is_LoggedIn()) {
            if (Yii::$app->request->post()) {
                $params = Yii::$app->request->post();
                $model = Accounts::findOne(['id'=>$params['data']]);
               // http://5.161.109.65:1100/wp-shel/check_from_body
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'http://5.161.109.65:1100/wp-shell/check_from_body');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"url\": \"".$model->data_log."\"\n}");

                $headers = array();
                $headers[] = 'Accept: */*';
                $headers[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $res = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);
                if($res=="Credentials valid") {
                    print_r($res);
                    exit();
                }else {
                    $sm = Accounts::findOne(['id' => $params['data']]);
                    $sm->smtp_broken = 1;
                    $sm->save();
                    print_r("Not Working");
                    exit();

                }

            } else {
                return $this->redirect(['user/login']);
            }

        }else{
            echo "Bad Request";
            exit();
        }
    }


    public function actionCheckWebmail(){
        if(ShopUsers::is_LoggedIn()) {
            if (Yii::$app->request->post()) {
                $params = Yii::$app->request->post();
                $model = Accounts::findOne(['id'=>$params['data']]);
               if($model->product_type=="zimbra"){
                   $ch = curl_init();
                   $row=explode(':',$model->data_log);
                   curl_setopt($ch, CURLOPT_URL, 'http://5.161.109.65:1100/zimbra/check_from_post_body');
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($ch, CURLOPT_POST, 1);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"url\": \"".$row[0].":".$row[1]."\",\n  \"login\": \"".$row[2]."\",\n  \"password\": \"".$row[3]."\"\n}\n");

                   $headers = array();
                   $headers[] = 'Accept: */*';
                   $headers[] = 'Content-Type: application/json';
                   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                   $res = curl_exec($ch);
                   if (curl_errno($ch)) {
                       echo 'Error:' . curl_error($ch);
                   }
                   curl_close($ch);
                   if($res=="Credentials valid") {
                       print_r($res);
                       exit();
                   }else {
                       $sm = Accounts::findOne(['id' => $params['data']]);
                       $sm->smtp_broken = 1;
                       $sm->save();
                       print_r("Not Working");
                       exit();

                   }($res);
                   exit();

               }else if($model->product_type=="Strato"){

                   $row=explode(':',$model->data_log);
                   $ch = curl_init();

                   curl_setopt($ch, CURLOPT_URL, 'http://5.161.109.65:1100/strato/check_from_post_body');
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($ch, CURLOPT_POST, 1);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"email\": \"".$row[0]."\",\n  \"password\": \"".$row[1]."\"\n}");

                   $headers = array();
                   $headers[] = 'Accept: */*';
                   $headers[] = 'Content-Type: application/json';
                   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                   $res = curl_exec($ch);
                   if (curl_errno($ch)) {
                       echo 'Error:' . curl_error($ch);
                   }
                   curl_close($ch);
                   if($res=="Credentials valid") {
                       print_r($res);
                       exit();
                   }else {
                       $sm = Accounts::findOne(['id' => $params['data']]);
                       $sm->smtp_broken = 1;
                       $sm->save();
                       print_r("Not Working");
                       exit();

                   }

               }else if($model->product_type=="Aruba"){
                   $ch = curl_init();
                   $row=explode(':',$model->data_log);
                   curl_setopt($ch, CURLOPT_URL, 'http://5.161.109.65:1100/webmail-aruba/check_from_post_body');
                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                   curl_setopt($ch, CURLOPT_POST, 1);
                   curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"email\": \"".$row[0]."\",\n  \"password\": \"".$row[1]."\"\n}");

                   $headers = array();
                   $headers[] = 'Accept: */*';
                   $headers[] = 'Content-Type: application/json';
                   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                   $res = curl_exec($ch);
                   if (curl_errno($ch)) {
                       echo 'Error:' . curl_error($ch);
                   }
                   curl_close($ch);
                    if($res=="Credentials valid") {
                       print_r($res);
                       exit();
                    }else {
                        $sm = Accounts::findOne(['id' => $params['data']]);
                        $sm->smtp_broken = 1;
                        $sm->save();
                        print_r("Not Working");
                        exit();

                    }

               }else{
                   echo "Comming Soon !";
                   exit();
               }


            } else {
                return $this->redirect(['user/login']);
            }

        }else{
            echo "Bad Request";
            exit();
        }
    }
}
