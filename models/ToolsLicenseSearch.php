<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ToolsLicense;

/**
 * ToolsLicenseSearch represents the model behind the search form of `app\models\ToolsLicense`.
 */
class ToolsLicenseSearch extends ToolsLicense
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'tool_id', 'rest_count'], 'integer'],
            [['user_name', 'tool_name', 'license_email', 'license_key', 'expiry_date', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ToolsLicense::find()
            ->where(['seller_email'=>\Yii::$app->params['seller_email']])
            ->andWhere(['shop_name'=>$_SERVER['SERVER_NAME']])
            ->orderBy(['id'=>SORT_DESC]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'tool_id' => $this->tool_id,
            'expiry_date' => $this->expiry_date,
            'rest_count' => $this->rest_count,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'tool_name', $this->tool_name])
            ->andFilterWhere(['like', 'license_email', $this->license_email])
            ->andFilterWhere(['like', 'license_key', $this->license_key]);

        return $dataProvider;
    }
}
