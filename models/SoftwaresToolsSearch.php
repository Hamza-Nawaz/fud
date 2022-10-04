<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SoftwaresTools;

/**
 * SoftwaresToolsSearch represents the model behind the search form of `app\models\SoftwaresTools`.
 */
class SoftwaresToolsSearch extends SoftwaresTools
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'total_downloads'], 'integer'],
            [['name', 'description','software_code', 'software_type', 'download_link', 'created_at'], 'safe'],
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
        $query = SoftwaresTools::find();

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
            'price' => $this->price,
            'total_downloads' => $this->total_downloads,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'software_type', $this->software_type])
            ->andFilterWhere(['like', 'software_code', $this->software_code])
            ->andFilterWhere(['like', 'download_link', $this->download_link]);

        return $dataProvider;
    }
}
