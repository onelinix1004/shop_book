<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Orders;

/**
 * OrdersSearch represents the model behind the search form about `backend\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * This function defines the validation rules for the Orders model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'amount', 'created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'address', 'note', 'status'], 'safe'],
        ];
    }

    /**
     * This function returns the scenarios for the Orders model.
     * It overrides the parent implementation by returning the scenarios based on the model attributes.
     *
     * @return array the scenarios.
     */
    public function scenarios()
    {
        return parent::scenarios();
    }


    /**
     * This function performs a search operation on the Orders model based on the provided parameters.
     * It creates an ActiveDataProvider with a search query applied to filter the orders.
     *
     * @param array $params The parameters for the search operation.
     *
     * @return ActiveDataProvider The data provider with the search results.
     */
    public function search($params)
    {
        $query = Orders::find();

        // Add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // Uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // Grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
