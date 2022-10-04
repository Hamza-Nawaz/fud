<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "web_payment_transaction".
 *
 * @property int $id
 * @property string|null $source_currency
 * @property string|null $target_currency
 * @property int|null $payment_amount
 * @property int|null $user_id
 * @property string|null $user_name
 * @property string|null $payment_method
 * @property resource|null $payment_data
 * @property string $secure_code
 * @property string|null $status
 * @property string|null $created_at
 */
class WebPaymentTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_payment_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['secure_code', 'user_id', 'payment_amount', 'created_at', 'payment_data', 'source_currency', 'target_currency', 'user_name','payment_method','status'], 'required'],

            [['payment_amount', 'user_id'], 'integer'],
            [['payment_data'], 'string'],
            [['created_at'], 'safe'],
            [['source_currency', 'target_currency', 'user_name', 'payment_method', 'status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_currency' => 'Source Currency',
            'target_currency' => 'Target Currency',
            'payment_amount' => 'Payment Amount',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'payment_method' => 'Payment Method',
            'payment_data' => 'Payment Data',
            'secure_code' => 'Secure Code',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public static function add_pm_transaction($options)
    {
        $payment = new WebPaymentTransaction();
        $payment->source_currency = 'USD';
        $payment->target_currency = 'USD';
        $payment->payment_amount = $options['amount'];
        $payment->user_id = $options['user_id'];
        $payment->user_name=ShopUsers::findOne(['id'=>$options['user_id']])->username;
        $payment->payment_method = 'PerfectMoney';
        $payment->secure_code=md5(microtime(true).mt_Rand());
        $payment->status = $options['status'];
        $payment->payment_data = json_encode($options['response']);
        $payment->created_at = date('Y-m-d H:i:s');
        $payment->save();

        return $payment;
    }


    // PM Account Setting
    public static $Pm_Account="U25101070";
    public static $SuccessURL="https://store.buyspamtool.com/web/user-balance/payment-success";
    public static  $FailedURL="https://store.buyspamtool.com/web/user-balance/payment-failed";



    // BTCPay Settings
//    public static $apiKey = '4cc65797d04f6cfb6ad231be444d6b8c7aed72e8';
//    public static $host = 'https://fudsell.com';
//    public static $storeId = 'FWXPCsLjS5AxBy74joG8qAY3ygZVZbn9G4EHL2idX7xv';
//    public static $currency = 'USD';
//    public static $orderId = 0;
//
     public static $apiKey = 'f7e670e48f9bd20b5a02a214384577f3725ac98e';
    public static $host = 'https://btcpaygateway.com/';
    public static $storeId = '3p1woU9VQrFzmThfczETKaQ2R4Yy83TH6SPzpDHn64rz';
    public static $currency = 'USD';
    public static $orderId = 0;



}
