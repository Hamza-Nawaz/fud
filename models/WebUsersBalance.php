<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "web_users_balance".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $user_email
 * @property int|null $payment_transaction_id
 * @property int|null $amount
 * @property int|null $order_id
 * @property string|null $shop_name
 * @property string|null $created_at
 */
class WebUsersBalance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_users_balance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_transaction_id', 'amount', 'order_id'], 'integer'],
            [['created_at'], 'safe'],
            [['username', 'user_email', 'shop_name'], 'string', 'max' => 50],
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
            'user_email' => 'User Email',
            'payment_transaction_id' => 'Payment Transaction ID',
            'amount' => 'Amount',
            'order_id' => 'Order ID',
            'shop_name' => 'Shop Name',
            'created_at' => 'Created At',
        ];
    }
    public static function check_balance()
    {

        $query = WebUsersBalance::find()
            ->select("sum(amount) as amount")
            ->where(['username' => Yii::$app->session->get("buyer_username")])
            ->one();

        if ($query == NULL || $query == "") {
            return 0;
        } else {
            return $query->amount;
        }
    }
}
