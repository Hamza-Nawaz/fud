<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accounts;

/**
 * AccountsSearch represents the model behind the search form of `app\models\Accounts`.
 */
class AccountsSearch extends Accounts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'price', 'retail_price', 'is_taken', 'smtp_broken'], 'integer'],
            [['category_name', 'product_type', 'data_log', 'created_at'], 'safe'],
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
        $query = Accounts::find();

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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_smtp($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_webmails($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_accounts($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_hetzner($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['product_type'=>'Hetzner'])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_ionos($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['like', 'product_type', "Ionos"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_linode($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['product_type'=>"Linode"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_oracle($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['product_type'=>"Oracle Cloud"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_admin_amazon($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Accounts'])
            ->andWhere(['product_type'=>"Amazon"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_ionos($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['like', 'product_type', "Ionos"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_all($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_zimbra($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"zimbra"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_rackspace($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Rackspace"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_starto($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Strato"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_t_online($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"T-Online"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_aruba($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Aruba"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Xserver($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Xserver"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Proximus($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Proximus"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Mimecast($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Mimecast"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Sakura($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Sakura"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Kagoya($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Kagoya"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Biglobejp($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Biglobe JP"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_webmails_Earthlink($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Webmail'])
            ->andWhere(['product_type'=>"Earthlink"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_ionos($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['like', 'product_type', "Ionos"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Rackspace($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Rackspace"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Inboxlv($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Inbox.lv"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Verizon($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Verizon"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Dreamhost($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Dreamhost"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_GMX($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"GMX"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Office365($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Office365"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Strato($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Strato"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Sendgrid($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Sendgrid"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Smtp_Biglobe($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Smtp'])
            ->andWhere(['product_type'=>"Biglobe"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }

    public function search_Host_WpAdmin($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Cpanels'])
            ->andWhere(['product_type'=>"Wp Cpanels"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }


    public function search_Host_cpanel($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Cpanels'])
            ->andWhere(['product_type'=>"General Cpanels "])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }
    public function search_Host_shells($params)
    {
        $query = Accounts::find()
            ->where(['category_name'=>'Cpanels'])
            ->andWhere(['product_type'=>"Shells"])
            ->andWhere(['smtp_broken'=>0])
            ->andWhere(['is_taken'=>0])
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
            'category_id' => $this->category_id,
            'price' => $this->price,
            'retail_price' => $this->retail_price,
            'is_taken' => $this->is_taken,
            'smtp_broken' => $this->smtp_broken,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'category_name', $this->category_name])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'data_log', $this->data_log]);

        return $dataProvider;
    }




}
