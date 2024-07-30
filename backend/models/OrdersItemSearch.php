<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrdersItem;

/**
 * OrdersItemSearch represents the model behind the search form about `backend\models\OrdersItem`.
 */
class OrdersItemSearch extends OrdersItem
{
    /**
     * This function defines the validation rules for the OrdersItem model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 'id', 'orders_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at' are required and must be integers.
            [['id', 'orders_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at'], 'integer'],

            // 'status' is optional and can be of any type.
            [['status'], 'safe'],
        ];
    }

    /**
     * This function defines the scenarios for the OrdersItem model.
     * It overrides the parent method to return the default scenarios.
     *
     * @return array the scenarios.
     */
    public function scenarios()
    {
        return parent::scenarios();
    }


    /**
     * This function performs a search operation on the OrdersItem model based on the provided parameters.
     * It creates an ActiveDataProvider with a search query applied to filter the OrdersItem records.
     *
     * @param array $params The parameters for the search operation.
     *
     * @return ActiveDataProvider The data provider with the search results.
     */
    public function search($params)
    {
        $query = OrdersItem::find();

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
            'orders_id' => $this->orders_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
