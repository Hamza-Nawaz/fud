<?php

namespace app\models;

use phpDocumentor\Reflection\Types\False_;
use Yii;

/**
 * This is the model class for table "webusers".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $user_role
 * @property string $is_verified
 * @property string $shop_name
 * @property string $is_blocked
 * @property string $created_at
 */
class ShopUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webusers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email','is_verified','shop_name','is_blocked','user_role','password', 'created_at'], 'required'],
            [['created_at'], 'safe'],
            [['username', 'email','user_role','shop_name','is_verified','is_blocked','password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'user_role' => 'User Role',
            'is_blocked' => 'Is Blocked',
            'shop_name' => 'Shop Name',
            'is_verified' => 'Is Verified',
            'created_at' => 'Created At',
        ];
    }

    public static function is_valid($username, $pass){
        $query = self::findOne(['username'=>$username,'password'=>$pass]);
        if($query!=null){
            Yii::$app->session->set('user_email',$query->email);
            $type = $query->user_role;
            if($type=="Admin") {
                Yii::$app->session->set('is_admin', 1);
                Yii::$app->session->set('admin_username', $username);
                Yii::$app->session->set('admin_email', $query->email);
                Yii::$app->session->set('user_id',$query->id);
                Yii::$app->session->set('user_email',$query->email);
            }elseif ($type=="Buyer") {
                if($query->shop_name == $_SERVER['SERVER_NAME']) {
                    Yii::$app->session->set('is_buyer', 1);
                    Yii::$app->session->set('buyer_username', $username);
                    Yii::$app->session->set('buyer_email', $query->email);
                    Yii::$app->session->set('user_id', $query->id);
                }else{
                    return false;
                }
            }elseif ($type=="Seller"){
                if($query->shop_name == $_SERVER['SERVER_NAME']) {
                Yii::$app->session->set('is_seller', 1);
                Yii::$app->session->set('seller_username', $username);
                Yii::$app->session->set('seller_email', $query->email);
                Yii::$app->session->set('user_id',$query->id);
                }else{
                    return false;
                }
            }elseif($type=="Support"){
            Yii::$app->session->set('is_support', 1);
            Yii::$app->session->set('support_username', $username);
            Yii::$app->session->set('support_email', $query->email);
            Yii::$app->session->set('user_id',$query->id);
                Yii::$app->session->set('user_email',$query->email);
            }
            return true;
        }else{
            return false;
        }
    }
    public static function is_LoggedIn(){
        if(Yii::$app->session->get('user_email')!=null){
            return true;
        }
        return false;
    }
    public static  function is_admin(){
        if(Yii::$app->session->get('is_admin')){
            return true;
        }
        return false;
    }

    public static  function is_buyer(){
        if(Yii::$app->session->get('is_buyer')){
            return true;
        }
        return false;
    }
  public static  function is_seller(){
        if(Yii::$app->session->get('is_seller')){
            return true;
        }
        return false;
    }

        public static function is_support(){
            if(Yii::$app->session->get('is_support')){
                return true;
            }
            return false;
        }



    public static  function is_alreadyExits($email , $username)
    {
        $query = ShopUsers::findOne(['username' => $username]);
        $query2 = ShopUsers::findOne(['email' => $email]);
        if ($query) {
            return false;
        } else if ($query2) {
            return false;
        } else {
            return true;
        }
    }

        public static function is_verified($username){
            $query = ShopUsers::findOne(['username' => $username]);
            if($query->is_verified=="Not"){
                \Yii::$app->session->destroy();
                return true;
            }else{
                return false;
            }

        }

    public static function is_blocked($username){
        $query = ShopUsers::findOne(['username' => $username]);
        if($query->is_blocked=="Blocked"){
            \Yii::$app->session->destroy();
            return true;
        }else{
            return false;
        }

    }

}
