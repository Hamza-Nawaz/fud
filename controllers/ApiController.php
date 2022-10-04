<?php

namespace app\controllers;

use app\models\UserLink;
use Yii;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MyUser;
use app\models\UserHit;
use app\models\UserData;

class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'shorten', 'download', 'validatekey',
                    'checksmtp', 'generatekey', 'letter-key'],
                'rules' => [
                    [
                        'actions' => ['logout', 'shorten', 'download', 'validatekey',
                            'checksmtp', 'generatekey'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'shorten' => ['post', 'get'],
                    'download' => ['get'],
                    'validatekey' => ['post', 'get'],
                    'checksmtp' => ['post'],
                    'generatekey' => ['post']
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);

        if ($action->id == 'shorten' ||
            $action->id == 'download') {
            $this->enableCsrfValidation = false;
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $list = [
            "HeartSender" => "2.0.48",
            "ShellXploiter" => "1.0.9",
            "FudSender" => "2.5.9",
            "ClaySender" => "2.7.4",
            "InboxXploiter" => "1.4.2",
            "iSender" => "1.0.0",
            "XploiterEmailVerifier" => "1.5.2",
            "InboxXploiterUpdate" => "2.0.11",
            "D29Sender" => "2.0.6",
            "Encryptor" => "1.0.0",
            "IMAPReader" => "1.5.0",
            "AccountChecker" => "1.0.0",
            "GridVerifier" => "1.0.0",
            "XploiterEmailSorter" => "1.5.0",
            "XploiterZimbra" => "1.0.0",
            "XploiterOWA" => "1.0.0",
            "XploiterEmailChecker" => "1.0.0",
            "HeartSenderLinux" => "1.0.0",
            "ClaySenderLinux" => "1.0.0",
            "D29Linux" => "1.0.0",
            "FudSenderLinux" => "1.0.0",
            "SuperMailer" => "1.0.0",
            "HeartSenderV3" => "3.00.06",
            "DomainExtractor" => "1.0.0",
            "XploiterCracker" => "1.0.0",
            "LetterMaker" => "1.0.0",
            "BotDetector"=>"1.0.0",
            "Verifier"=>"1.0.0",
            "Emailer"=>"1.0.0",
            "SMSSender"=>"1.0.0",
            "ChaseChecker"=>"1.0.0",
            "NumberGenerator"=>"1.0.0",
            "ClaySender_v4"=>"1.0.0",
            "BulkSender"=>"1.0.0",
            "GxSender"=>"1.0.0",
            "HeartSenderV4"=>"1.0.0",
            "SuperMailerV2"=>"2.0.0",
            "ClaySenderV5"=>"5.0.0",
        ];

        //accCheck

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Started [License] ...");

        $device_id = addslashes(Yii::$app->request->get('t'));
        $token = addslashes(Yii::$app->request->get('k'));
        $code = addslashes(Yii::$app->request->get('c'));
        $software_type = addslashes(Yii::$app->request->get('ss'));
        $params_1 = addslashes(Yii::$app->request->get('p1'));
        $params_2 = addslashes(Yii::$app->request->get('p2'));
        $params_3 = addslashes(Yii::$app->request->get('p3'));
        $software_version = addslashes(Yii::$app->request->get('v'));

        if (isset($software_type) && $software_type == "s") {
            $software_type = 'ShellXploiter';
        } elseif (isset($software_type) && $software_type == "h") {
            $software_type = 'HeartSender';
        } elseif (isset($software_type) && $software_type == "f") {
            $software_type = 'FudSender';
        } elseif (isset($software_type) && $software_type == "c") {
            $software_type = 'ClaySender_v4';
        } elseif (isset($software_type) && $software_type == "is") {
            $software_type = 'iSender';
        } elseif (isset($software_type) && $software_type == "xev") {
            $software_type = 'XploiterEmailVerifier';
        } elseif (isset($software_type) && $software_type == "xud") {
            $software_type = 'InboxXploiterUpdate';
        } elseif (isset($software_type) && $software_type == "d29s") {
            $software_type = 'D29Sender';
        } elseif (isset($software_type) && $software_type == "enp") {
            $software_type = 'Encryptor';
        } elseif (isset($software_type) && $software_type == "imap") {
            $software_type = 'IMAPReader';
        } elseif (isset($software_type) && $software_type == "accCheck") {
            $software_type = 'AccountChecker';
        } elseif (isset($software_type) && $software_type == "sgv") {
            $software_type = 'GridVerifier';
        } elseif (isset($software_type) && $software_type == "xes") {
            $software_type = 'XploiterEmailSorter';
        } elseif (isset($software_type) && $software_type == "xzc") {
            $software_type = 'XploiterZimbra';
        } elseif (isset($software_type) && $software_type == "xowa") {
            $software_type = 'XploiterOWA';
        } elseif (isset($software_type) && $software_type == "fdltr") {
            $software_type = 'FudLetter';
        } elseif (isset($software_type) && $software_type == "xec") {
            $software_type = 'XploiterEmailChecker';
        } elseif (isset($software_type) && $software_type == "hsl") {
            $software_type = 'HeartSenderLinux';
        } elseif (isset($software_type) && $software_type == "csl") {
            $software_type = 'ClaySenderLinux';
        } elseif (isset($software_type) && $software_type == "dsl") {
            $software_type = 'D29Linux';
        } elseif (isset($software_type) && $software_type == "fsl") {
            $software_type = 'FudSenderLinux';
        } elseif (isset($software_type) && $software_type == "supm") {
            $software_type = 'SuperMailer';
        } elseif (isset($software_type) && $software_type == "hv3") {
            $software_type = 'HeartSenderV3';
        } elseif (isset($software_type) && $software_type == "dmetr") {
            $software_type = 'DomainExtractor';
        } elseif (isset($software_type) && $software_type == "xcrack") {
            $software_type = 'XploiterCracker';
        }   elseif (isset($software_type) && $software_type == "lm") {
            $software_type = 'LetterMaker';
        }
        elseif (isset($software_type) && $software_type == "bdt") {
            $software_type = 'BotDetector';
        }
        elseif (isset($software_type) && $software_type == "vf") {
            $software_type = 'Verifier';
        }
        elseif (isset($software_type) && $software_type == "em") {
            $software_type = 'Emailer';
        }
        elseif (isset($software_type) && $software_type == "smss") {
            $software_type = 'SMSSender';
        }
        elseif (isset($software_type) && $software_type == "chec") {
            $software_type = 'ChaseChecker';
        }
        elseif (isset($software_type) && $software_type == "ng") {
            $software_type = 'NumberGenerator';
        }
        elseif (isset($software_type) && $software_type == "blks") {
            $software_type = 'BulkSender';
        }
       elseif (isset($software_type) && $software_type == "gx") {
            $software_type = 'GxSender';
        }
        elseif (isset($software_type) && $software_type == "hsv4") {
            $software_type = 'HeartSenderV4';
        } elseif (isset($software_type) && $software_type == "sum2") {
            $software_type = 'SuperMailerV2';
        }elseif (isset($software_type) && $software_type == "cly") {
            $software_type = 'ClaySenderV5';
        }
        elseif (isset($software_type) && $software_type == "xpauthoffice") {
            $software_type = 'XploiterAuthenticator';
        }
        else {
            $software_type = 'InboxXploiter';
        }
        
        $has_valid_version = true;
        if( isset($software_version) &&
            $software_version != ""){
            if( $software_version < $list[$software_type] ){
                $has_valid_version = false;
            }
        }

        $user = MyUser::find()->where(['token' => $token,
            'software_type' => $software_type])->one();

        if(isset($params_1)){
            $params_1 = base64_decode($params_1);
        }

        if(isset($params_2)){
            $params_2 = base64_decode($params_2);
        }

        if(isset($params_3)){
            $params_3 = base64_decode($params_3);
        }

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Params: [Token: " . $token . "... Device: " . $device_id . "... Code: " . $code . "...Hardware: " . $params_1 . "... BIOS: " . $params_2 . "...CPU: " . $params_3 . "...Version: " . $software_version . "]");
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Software: [" . $software_type . "]");

        $is_cheating = false;

        if ($user == NULL) {
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Token: Failed");
        } else {
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Token: Success");

            $is_cheating = $user->hasMorethanOneDevice();
            if ($is_cheating) {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Cheating: Yes");
            } else {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Cheating: No");
            }
        }

        $source_time = time() + 1;
        $time = $this->decode_code($code);
        $is_valid_request = false;

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Time: " . $time);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Current Time: " . $source_time);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time Difference: " . abs($source_time - $time));

        $time_diff = abs(($source_time - $time)) + 1;

        #cheating: -1
        #time diff: -2
        #invalid version: -3

        if (!$is_cheating &&
            is_numeric($time) &&
            $time_diff <= 432000 &&
            $time_diff >= 0 &&
            $has_valid_version) {
            $is_valid_request = true;
        }

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time Valid: " . ($is_valid_request ? "Yes" : "No"));

        $response_code = "";
        if ($is_valid_request && $user != NULL) {
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request: Success");
            $response_code = $this->encode_code($time);
        } else {
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request: Rejected");
            $response_code = $this->encode_code($time + rand(518400, 864000));
        }

        if($is_valid_request){
            echo $response_code;
        }else{
            if($is_cheating){
                echo "-1";
            }else if(!$has_valid_version){
                echo "-3";
            }else{
                echo "-2";
            }
        }

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Response Code: " . $response_code);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Completed ...\n");

        if ($user != NULL) {
            $user_hit = new UserHit();
            $user_hit->user_id = $user->id;
            $user_hit->token_name = $token;
            $user_hit->device_name = $device_id;
            $user_hit->req_time = $code;
            $user_hit->hardware_info = $params_1;
            $user_hit->bios_info = $params_2;
            $user_hit->cpu_info = $params_3;
            $user_hit->save();
        }

        exit(0);
    }

    public function actionShorten()
    {

        if (Yii::$app->request->post()) {
            $params = Yii::$app->request->post();

            $device_id = addslashes($params['t']);
            $token = addslashes($params['k']);
            $code = addslashes($params['c']);
            $urls = explode("|", addslashes($params['u']));

            $user = MyUser::find()->where(['token' => $token])->one();

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Started [Shorten] ...");

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Params: [" . $token . "..." . $device_id . "..." . $code . "]");

            if ($user == NULL) {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Token: Failed");
            } else {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Token: Success");
            }

            $source_time = time() + 1;
            $time = $this->decode_code($code);
            $is_valid_request = false;

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Time: " . $time);
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Current Time: " . $source_time);
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time Difference: " . ($source_time - $time));

            if (is_numeric($time) &&
                ($source_time - $time) < 300 &&
                ($source_time - $time) > 0) {
                $is_valid_request = true;
            }

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time Valid: " . ($is_valid_request ? "Yes" : "No"));

            $response_code = "";
            if ($is_valid_request && $user != NULL) {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request: Success");
                $response_code = $this->encode_code($time);
            } else {
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request: Rejected");
                $response_code = $this->encode_code($time + rand(3000, 5000));
            }

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Response Code: " . $response_code);
            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Completed ...\n");

            if ($user != NULL) {
                $user_hit = new UserHit();
                $user_hit->user_id = $user->id;
                $user_hit->token_name = $token;
                $user_hit->device_name = $device_id;
                $user_hit->req_time = $code . " [Shortner]";
                $user_hit->save();
            }

            //create url
            if ($is_valid_request) {
                echo $response_code . '-' . UserLink::bulkShortner($urls);
            } else {
                echo $response_code;
            }
        }

        exit(0);
    }

    public function actionReset()
    {
        echo "Wait.";

        exit(0);
    }

    public function actionValidatekey()
    {

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Started [Validate API Key] ...");
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Req. Token : " . $_GET['u']);

        $source_time = time() + 1;

        $token = base64_decode($_GET['u']);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Decoded : " . $token);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Len : " . floor(strlen($token) / 4));

        $tokens = str_split($token, floor(strlen($token) / 4));

        $token = $tokens[1] . $tokens[2] . $tokens[0] . $tokens[3];
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: New Token : " . $token);

        $token = base64_decode($token);
        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Org. Token : " . $token);

        $tokens = explode(":", $token);

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Length : " . count($tokens));

        if (count($tokens) == 3) {

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Token : " . $tokens[1]);

            $user = MyUser::find()->where(['token' => $tokens[1]])->one();

            if ($user == NULL) {

                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Invalid Token");

                echo -1;

            } else {

                $is_cheating = $user->hasMorethanOneDevice();
                $time = $tokens[2];
                $time_diff = abs(($source_time - $time)) + 1;

                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Cheating : " . $is_cheating ? "Yes" : "No");
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time : " . $time);
                $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Time Diff. : " . $time_diff);

                if (!$is_cheating &&
                    is_numeric($time) &&
                    $time_diff <= 2160 &&
                    $time_diff >= 0
                ) {

                    $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Success");

                    echo $tokens[0];

                } else {

                    $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Failed : Invalid Req.");

                    echo -1;

                }
            }

        } else {

            $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Failed : Invalid Token Req.");

            echo -1;

        }

        $this->logger(date('Y-m-d H:s:i') . " :: [IP: " . $this->get_client_ip() . "] :: Request Completed [Validate API Key] ...");

        exit(0);
    }

    public function logger($message)
    {
        $myfile = fopen("requests.log", "a+") or die("Unable to open file!");
        fwrite($myfile, $message . "\n");
        fclose($myfile);
    }

    public function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function decode_code($str)
    {
        $uniq_code = '';
        $len = 0;

        if (strlen($str) % 2 == 0) {
            $len = substr($str, 18, 2);
            $str = substr($str, 0, 18) . substr($str, 20);
            $tokens = str_split($str, 6);
            $str = $tokens[1] . $tokens[3] . $tokens[4] . $tokens[0] . $tokens[2] . $tokens[5];
        } else {
            $len = substr($str, 15, 2);
            $str = substr($str, 0, 15) . substr($str, 17);
            $tokens = str_split($str, 5);
            $str = $tokens[1] . $tokens[3] . $tokens[0] . $tokens[2] . $tokens[4];
        }

        $str = substr($str, 0, $len);
        $uniq_code = base64_decode($str);

        $tokens = explode("gL", $uniq_code);
        $len = $tokens[1];

        $random_number = base64_decode(substr($tokens[0], strlen($tokens[0]) - $len));

        $uniq_code = substr($tokens[0], 0, strlen($tokens[0]) - $len);

        $indx = 0;
        $chars = str_split($uniq_code);
        foreach ($chars as $s) {
            if ($indx % 2 == 0) {
                $chars[$indx] = chr(ord($s) - $random_number);
            } else {
                $chars[$indx] = chr(ord($s) + $random_number);
            }

            $indx++;
        }

        $uniq_code = implode("", $chars);
        $tokens = str_split($uniq_code, 4);

        $uniq_code = $tokens[1] . $tokens[3] . $tokens[0] . $tokens[2];

        return base64_decode($uniq_code);

    }

    public function encode_code($timetoken)
    {
        $time = $timetoken + 300;
        $time = base64_encode($time);

        $tokens = str_split($time, 4);
        $new_code = $tokens[2] . $tokens[0] . $tokens[3] . $tokens[1];
        $random_number = rand(1, 9);

        $chars = str_split($new_code);
        $indx = 0;
        foreach ($chars as $c) {
            if ($indx % 2 == 0) {
                $chars[$indx] = chr(ord($c) + $random_number);
            } else {
                $chars[$indx] = chr(ord($c) - $random_number);
            }
            $indx++;
        }

        $new_code = implode("", $chars);
        $new_code = $new_code . base64_encode($random_number) . 'gL' . strlen(base64_encode($random_number));

        $uniq_code = base64_encode($new_code);
        if (strlen($uniq_code) % 2 == 0) {
            $final_code = str_pad($uniq_code, 36, "=", STR_PAD_RIGHT);
            $tokens = str_split($final_code, 6);
            $final_code = $tokens[3] . $tokens[0] . $tokens[4] . str_pad(strlen($uniq_code), 2, '0', STR_PAD_LEFT) . $tokens[1] . $tokens[2] . $tokens[5];
        } else {
            $final_code = str_pad($uniq_code, 25, "=", STR_PAD_RIGHT);
            $tokens = str_split($final_code, 5);
            $final_code = $tokens[2] . $tokens[0] . $tokens[3] . str_pad(strlen($uniq_code), 2, '0', STR_PAD_LEFT) . $tokens[1] . $tokens[4];
        }

        return $final_code;
    }

    public function actionDownload()
    {

        /*for ($i = 0; $i <= 1000; $i++) {

            $handle = curl_init();
            $url = "https://fake-it.ws/api/?api_key=pkj0i7WloZyHK1uIsAvJib32SwriXb8r&country=us&response=json";

            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

            $output = curl_exec($handle);

            curl_close($handle);

            $json = json_encode($output);

            $data = new UserData();
            $data->json_data = $json;
            $data->save();

            if ($i % 50 == 0) {
                sleep(3);
            }
        }*/

        //Number:4929039382088620,Type:Visa,Expiry:44562,CVV2:934

        $rows = UserData::find()->all();
        $data = [];
        foreach ($rows as $row) {
            $json = json_decode(json_decode($row["json_data"]), true);
            $data[] = trim($json["emp_job_title"]);
        }

        echo implode(",", array_unique($data));

        //echo "Done";
        exit;

    }

    public function actionCheck()
    {

        $this->logger(date('Y-m-d H:s:i') . " :: [Proxy Checker] :: " . $_GET['t']);

        // ip:port:type
        $secure_code = base64_decode($_GET['t']);
        $tokens = explode(":", $secure_code);

        $this->logger(date('Y-m-d H:s:i') . " :: [Proxy Checker] :: " . $secure_code);

        $ip = $tokens[0];
        $port = $tokens[1];
        $proxy = $ip . ":" . $port;
        $proxy_type = $tokens[2];
        $timeout = 20;

        $socksOnly = ($proxy_type == "s4" || $proxy_type == "s5");

        $this->logger(date('Y-m-d H:s:i') . " :: [Proxy Checker] :: [Info]" . "IP: " . $ip . ", Port: " . $port . ", Type: [" . $proxy_type . "]");

        //echo "IP: ".$ip.", Port: ".$port.", Type: [".$proxy_type."]<br /><br />";

        $url = "http://whatismyipaddress.com/";

        $theHeader = curl_init($url);

        //curl_setopt($theHeader, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($theHeader, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($theHeader, CURLOPT_PROXY, $proxy);

        if ($socksOnly && $proxy_type == "s5") {
            curl_setopt($theHeader, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        } elseif ($socksOnly && $proxy_type == "s4") {
            curl_setopt($theHeader, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
        }

        curl_setopt($theHeader, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($theHeader, CURLOPT_SSL_VERIFYPEER, 0);

        $curlResponse = curl_exec($theHeader);

        if ($curlResponse === false) {
            echo "0";
//            if (curl_errno($theHeader) == 56 && !$socksOnly) {
//                $arr = array(
//                    "success" => false
//                );
//            }else{
//                $arr = array(
//                    "success" => false
//                );
//            }

            $this->logger(date('Y-m-d H:s:i') . " :: [Proxy Checker] :: [ERROR] " . curl_error($theHeader));

            /*
             * ,
                    "error" => curl_error($theHeader),
                    "proxy" => array(
                        "ip" => $ip,
                        "port" => $port,
                        "type" => $proxy_type
                    )
             * */

        } else {
            echo "1";
//            $arr = array(
//                "success" => true
//            );

            $this->logger(date('Y-m-d H:s:i') . " :: [Proxy Checker] :: [Success] Ok!");
        }

        //echo json_encode($arr);

        exit;
    }

    public function actionChecksmtp()
    {
        try {

            $params = Yii::$app->request->post();

            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: Host: " . $params['host']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: UserName: " . $params['username']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: Password: " . $params['password']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: Port: " . $params['port']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: SSL: " . $params['ssl']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: From: " . $params['from']);
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: To: " . $params['to']);

            $mailer = Yii::$app->mailer;
            $mailer->setTransport([
                'class' => 'Swift_SmtpTransport',
                'host' => $params['host'],
                'username' => $params['username'],
                'password' => $params['password'],
                'port' => $params['port'],
                'encryption' => $params['ssl'] == "1" ? 'tls' : '',
            ]);

            $current_date = date('F d, Y H:i:s');

            $mailer->compose()
                ->setFrom($params['from'])
                ->setTo($params['to'])
                ->setSubject('[Test]SMTP Checker Test')
                ->setHtmlBody("[SMTP]<br /><br />Hostname/Port Number&nbsp; &nbsp;: <a href='http://".$params['host'].":".$params['port']."' rel='noreferrer' target='_blank'>".$params['host'].":".$params['port']."</a><br />Enable SSL&nbsp; : ".($params['ssl'] == "1" ? "True" : "False")."<br />Enable Auth : True<br />[Authentication Data]<br />Username&nbsp; &nbsp; : <a href='mailto:".$params['username']."' target='_blank'>".$params['username']."</a><br />Password&nbsp; &nbsp; : ".$params['password']."<br />Checked At ".$current_date."<br />This message was addressed to <a href='mailto:".$params['to']."' target='_blank'>".$params['to']."</a>")
                ->setTextBody('Hello, This is just a test email ' . date('Y-m-d H:i:s'))
                ->send();

            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: Success");

            echo "1";

        } catch (Exception $e) {
            echo $e->getMessage();
            $this->logger(date('Y-m-d H:s:i') . " :: [SMTP Checker] :: Failed");
        }

        exit;
    }

    public function actionGeneratekey()
    {
        try {

            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator Request] ");

            $params = Yii::$app->request->post();

//            print_r($params);
//            exit;

            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator] :: Email: " . $params['email']);

            $model = new MyUser();

            $str = strtoupper(rand(100, 100000) ."-". md5(time()."-".$params['email']));
            $token = "";
            for ($i = 0; $i < strlen($str); $i++) {
                $token .= (($i+1) % 5 == 0) ? $str[$i]."-" : $str[$i];
            }

            $model->email = $params['email'];
            $model->token = $token;
            $model->price = "60";
            $model->updated_at = date('Y-m-d H:i:s');
            $model->created_at = date('Y-m-d H:i:s');
            $model->seller_id = 154;
            $model->software_type = "HideYourLink";
            $model->seller_icq = "";
            $model->seller_skype = "";
            $model->save();

            if($model->id == NULL){
                echo "-1";
            }else{
                echo $token;
            }

        } catch (Exception $e) {
            echo "-1";
            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator] :: Failed");
        }

        exit;
    }

    public function actionGenToken(){
        try {

            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator Request] ");

            $params = Yii::$app->request->get();

//            print_r($params);
//            exit;

            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator] :: Email: " . $params['email']);

            $model = new MyUser();

            $str = strtoupper(rand(100, 100000) ."-". md5(time()."-".$params['email']));
            $token = "";
            for ($i = 0; $i < strlen($str); $i++) {
                $token .= (($i+1) % 5 == 0) ? $str[$i]."-" : $str[$i];
            }

            $model->email = $params['email'];
            $model->token = $token;
            $model->price = "5";
            $model->updated_at = date('Y-m-d H:i:s');
            $model->created_at = date('Y-m-d H:i:s');
            $model->seller_id = 154;
            if($params['type']=="HeartSenderV4") {
                $model->software_type = "HeartSenderV4";
            }else if($params['type']=="SuperMailerV2"){
                $model->software_type = "SuperMailerV2";
            }else if($params['type']=="ClaySenderV5"){
                $model->software_type = "ClaySenderV5";
            }
            $model->seller_icq = "";
            $model->seller_skype = "";
            $model->save();

            if($model->id == NULL){
                echo "-1";
            }else{
                echo $token;
                exit();
            }

        } catch (Exception $e) {
            echo "-1";
            $this->logger(date('Y-m-d H:s:i') . " :: [Key Generator] :: Failed");
        }

        exit;
    }


    public function actionRestToken(){
            $params = Yii::$app->request->get();
            $user = MyUser::findOne(['email'=>$params["email"],'software_type'=>$params['software_type']]);
            $str = strtoupper(md5($user->id . '-' . time()));
            $token = "";
            for ($i = 0; $i < strlen($str); $i++) {
                $token .= (($i + 1) % 5 == 0) ? $str[$i] . "-" : $str[$i];
            }
            $user->token = $token;
            $user->is_blocked = false;
            $user->updated_at = date('Y-m-d H:i:s');
            $user->save();
            echo $user->token;
            exit();
        }


    public function actionLetterKey()
    {
        try {

            $this->logger(date('Y-m-d H:s:i') . " :: [LetterKey Generator Request] ");

            $params = Yii::$app->request->post();
            if(!isset($params['type'])){
                $params['type'] = "FudLetter";
            }

            $this->logger(date('Y-m-d H:s:i') . " :: [LetterKey Generator] :: Email: " . $params['email']);

            $model = new MyUser();

            $str = strtoupper(rand(100, 100000) ."-". md5(time()."-".$params['email']));
            $token = "";
            for ($i = 0; $i < strlen($str); $i++) {
                $token .= (($i+1) % 5 == 0) ? $str[$i]."-" : $str[$i];
            }

            $price = "25";
            if($params['type'] == "AntiBot"){
                $price = "10";
            }else if($params['type'] == "GoogleCloudLink"){
                $price = "10";
            }else if($params['type'] == "CloudLinkAntiBot"){
                $price = "20";
            }

            $model->email = $params['email'];
            $model->token = $token;
            $model->price = $price;
            $model->updated_at = date('Y-m-d H:i:s');
            $model->created_at = date('Y-m-d H:i:s');
            $model->seller_id = 154;
            $model->software_type = $params['type'];
            $model->seller_icq = "";
            $model->seller_skype = "";
            $model->save();

            if($model->id == NULL){
                echo "-1";
            }else{
                echo $token;
            }

        } catch (Exception $e) {
            echo "-1";
            $this->logger(date('Y-m-d H:s:i') . " :: [LetterKey Generator] :: Failed");
        }

        exit;
    }


}
