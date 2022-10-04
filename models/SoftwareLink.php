<?php

namespace app\models;
use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property int $id
 * @property string $software_name
 * @property string $link
 * @property string $created_at
 */



class SoftwareLink extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['software_name', 'link', 'created_at'], 'required'],
            [['created_at', 'link'], 'safe'],
            [['software_name'], 'string', 'max' => 50],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'software_name' => 'Software Name',
            'link' => 'Link',
            'created_at' => 'Created At',
        ];
    }



        public static function actionGetSoftwareLink($software_name){
                $model = SoftwareLink::findOne(['software_name'=>$software_name]);
                if($model) {
                    return $model;
                }else{
                    return "0";
                }
        }





}