<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WebOrders;

/**
 * WebOrdersSearch represents the model behind the search form of `app\models\WebOrders`.
 */
class WebOrdersSearch extends WebOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'account_id', 'price'], 'integer'],
            [['username', 'user_email', 'product_type', 'category_name', 'product_details', 'is_reported', 'is_refunded', 'report_time', 'shop_name', 'status', 'created_at'], 'safe'],
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
        $query = WebOrders::find()
            ->where(['username'=>\Yii::$app->session->get('buyer_username')])
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
            'account_id' => $this->account_id,
            'price' => $this->price,
            'report_time' => $this->report_time,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_details', $this->product_details])
            ->andFilterWhere(['like', 'is_reported', $this->is_reported])
            ->andFilterWhere(['like', 'is_refunded', $this->is_refunded])
            ->andFilterWhere(['like', 'shop_name', $this->shop_name])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
