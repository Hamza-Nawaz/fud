<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "web_orders".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $user_email
 * @property int|null $account_id
 * @property string|null $product_type
 * @property string|null $category_name
 * @property string|null $product_details
 * @property int|null $price
 * @property string|null $is_reported
 * @property string|null $is_refunded
 * @property string|null $report_time
 * @property string|null $shop_name
 * @property string|null $status
 * @property string|null $created_at
 */
class WebOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'web_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['account_id', 'price'], 'integer'],
            [['report_time', 'created_at'], 'safe'],
            [['username', 'user_email'], 'string', 'max' => 50],
            [['product_type', 'category_name', 'is_reported', 'is_refunded', 'shop_name', 'status'], 'string', 'max' => 45],
            [['product_details'], 'string', 'max' => 700],
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
            'account_id' => 'Account ID',
            'product_type' => 'Product Type',
            'category_name' => 'Category Name',
            'product_details' => 'Product Details',
            'price' => 'Price',
            'is_reported' => 'Is Reported',
            'is_refunded' => 'Is Refunded',
            'report_time' => 'Report Time',
            'shop_name' => 'Shop Name',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
