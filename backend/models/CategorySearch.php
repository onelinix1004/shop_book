<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Category;

/**
 * CategorySearch represents the model behind the search form about `backend\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * This function defines the validation rules for the Category model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * This function returns the scenarios for the Category model.
     *
     * @return array the scenarios.
     *
     * @inheritdoc
     *
     * @see \yii\base\Model::scenarios()
     */
    public function scenarios()
    {
        return parent::scenarios();
    }


    /**
     * This function performs a search operation on the Category model based on the provided parameters.
     * It returns an ActiveDataProvider instance with the search query applied.
     *
     * @param array $params The search parameters.
     *
     * @return ActiveDataProvider The data provider instance with the search query applied.
     */
    public function search($params)
    {
        $query = Category::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
