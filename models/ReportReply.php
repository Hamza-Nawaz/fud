<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_reply".
 *
 * @property int $id
 * @property int $user_id
 * @property string $buyer_useremail
 * @property int $report_id
 * @property string $message
 * @property string $created_at
 */
class ReportReply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_reply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'buyer_useremail', 'report_id', 'message', 'created_at'], 'required'],
            [['user_id', 'report_id'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['buyer_useremail'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'buyer_useremail' => 'Buyer Useremail',
            'report_id' => 'Report ID',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
