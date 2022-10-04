<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_tool".
 *
 * @property int $id
 * @property int $order_id
 * @property int $buyer_id
 * @property string $buyer_username
 * @property string $buyer_email
 * @property int $tool_id
 * @property string $tool_type
 * @property string $report_title
 * @property string $report_descriptio
 * @property string $shop_name
 * @property int $is_solved
 * @property int $is_refunded
 * @property int $refund_amount
 * @property string $created_at
 */
class ReportTool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_tool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'buyer_id','shop_name', 'buyer_username', 'buyer_email', 'tool_id', 'tool_type', 'report_title', 'report_descriptio', 'is_solved', 'is_refunded', 'refund_amount', 'created_at'], 'required'],
            [['order_id', 'buyer_id', 'tool_id', 'is_solved', 'is_refunded', 'refund_amount'], 'integer'],
            [['report_descriptio'], 'string'],
            [['created_at'], 'safe'],
            [['buyer_username', 'buyer_email', 'tool_type', 'report_title'], 'string', 'max' => 50],
            [['shop_name'], 'string', 'max' =>100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'buyer_id' => 'Buyer ID',
            'buyer_username' => 'Buyer Username',
            'buyer_email' => 'Buyer Email',
            'tool_id' => 'Tool ID',
            'tool_type' => 'Tool Type',
            'report_title' => 'Report Title',
            'report_descriptio' => 'Report Descriptio',
            'shop_name' => 'Shop Name',
            'is_solved' => 'Is Solved',
            'is_refunded' => 'Is Refunded',
            'refund_amount' => 'Refund Amount',
            'created_at' => 'Created At',
        ];
    }
}
