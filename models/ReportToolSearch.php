<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ReportTool;

/**
 * ReportToolSearch represents the model behind the search form of `app\models\ReportTool`.
 */
class ReportToolSearch extends ReportTool
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'buyer_id', 'tool_id', 'is_solved', 'is_refunded', 'refund_amount'], 'integer'],
            [['buyer_username','shop_name', 'buyer_email', 'tool_type', 'report_title', 'report_descriptio', 'created_at'], 'safe'],
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
        $query = ReportTool::find()->orderBy(['id'=>SORT_DESC]);

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
            'order_id' => $this->order_id,
            'buyer_id' => $this->buyer_id,
            'tool_id' => $this->tool_id,
            'is_solved' => $this->is_solved,
            'is_refunded' => $this->is_refunded,
            'refund_amount' => $this->refund_amount,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'buyer_username', $this->buyer_username])
            ->andFilterWhere(['like', 'buyer_email', $this->buyer_email])
            ->andFilterWhere(['like', 'tool_type', $this->tool_type])
            ->andFilterWhere(['like', 'report_title', $this->report_title])
            ->andFilterWhere(['like', 'shop_name', $this->shop_name])
            ->andFilterWhere(['like', 'report_descriptio', $this->report_descriptio]);

        return $dataProvider;
    }
    public function search_customer($params)
    {
        $query = ReportTool::find()
            ->where(['buyer_id'=>\Yii::$app->session->get('user_id')])
            ->andWhere(['buyer_email'=>\Yii::$app->session->get('buyer_email')])
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
            'order_id' => $this->order_id,
            'buyer_id' => $this->buyer_id,
            'tool_id' => $this->tool_id,
            'is_solved' => $this->is_solved,
            'is_refunded' => $this->is_refunded,
            'refund_amount' => $this->refund_amount,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'buyer_username', $this->buyer_username])
            ->andFilterWhere(['like', 'buyer_email', $this->buyer_email])
            ->andFilterWhere(['like', 'tool_type', $this->tool_type])
            ->andFilterWhere(['like', 'report_title', $this->report_title])
            ->andFilterWhere(['like', 'shop_name', $this->shop_name])
            ->andFilterWhere(['like', 'report_descriptio', $this->report_descriptio]);

        return $dataProvider;
    }
}
