<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property int $category_id
 * @property string $category_name
 * @property string $product_type
 * @property string $data_log
 * @property int $price
 * @property int|null $retail_price
 * @property int $is_taken
 * @property int $smtp_broken
 * @property string $created_at
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'category_name', 'product_type', 'data_log', 'price', 'is_taken', 'smtp_broken', 'created_at'], 'required'],
            [['category_id', 'price', 'retail_price', 'is_taken', 'smtp_broken'], 'integer'],
            [['created_at'], 'safe'],
            [['category_name', 'product_type'], 'string', 'max' => 100],
            [['data_log'], 'string', 'max' => 700],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'product_type' => 'Product Type',
            'data_log' => 'Data Log',
            'price' => 'Price',
            'retail_price' => 'Retail Price',
            'is_taken' => 'Is Taken',
            'smtp_broken' => 'Smtp Broken',
            'created_at' => 'Created At',
        ];
    }
}
