<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "softwares_tools".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $software_type
 * @property string $download_link
 * @property string $software_code
 * @property int $price
 * @property int $total_downloads
 * @property string $created_at
 */
class SoftwaresTools extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'softwares_tools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description','software_code', 'software_type', 'download_link', 'price', 'total_downloads', 'created_at'], 'required'],
            [['price', 'total_downloads'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'software_type','software_code'], 'string', 'max' => 50],
            [['description', 'download_link'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'software_type' => 'Software Type',
            'download_link' => 'Download Link',
            'software_code' => 'Software Code',
            'price' => 'Price',
            'total_downloads' => 'Total Downloads',
            'created_at' => 'Created At',
        ];
    }
}
