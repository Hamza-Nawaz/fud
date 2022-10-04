<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tools_license".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property int $tool_id
 * @property string $tool_name
 * @property string $license_email
 * @property string $license_key
 * @property string $expiry_date
 * @property string $seller_email
 * @property string $shop_name
 * @property int $rest_count
 * @property string $created_at
 */
class ToolsLicense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tools_license';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_name','license_email','shop_name','seller_email','tool_id', 'tool_name', 'license_key', 'expiry_date', 'rest_count', 'created_at'], 'required'],
            [['user_id', 'tool_id', 'rest_count'], 'integer'],
            [['expiry_date', 'created_at'], 'safe'],
            [['user_name', 'tool_name','license_email','seller_email'], 'string', 'max' => 50],
            [['license_key'], 'string', 'max' => 200],
            [['shop_name'], 'string', 'max' => 100],
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
            'user_name' => 'User Name',
            'tool_id' => 'Tool ID',
            'tool_name' => 'Tool Name',
            'license_email' => 'License Email',
            'license_key' => 'License Key',
            'expiry_date' => 'Expiry Date',
            'rest_count' => 'Rest Count',
            'shop_name' => 'Shop Name',
            'seller_email' => 'Seller Email',
            'created_at' => 'Created At',
        ];
    }
}
