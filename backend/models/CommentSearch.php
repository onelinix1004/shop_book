<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * This function defines the validation rules for the CommentSearch model.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 'id', 'product_id', 'user_id', and 'created_at' fields should be integers.
            [['id', 'product_id', 'user_id', 'created_at'], 'integer'],

            // 'content' field should be safe (not validated).
            [['content'], 'safe'],
        ];
    }


    /**
     * This function defines the scenarios for the CommentSearch model.
     * It overrides the scenarios() function in the parent class (yii\base\Model).
     *
     * @return array The scenarios for the CommentSearch model.
     *
     * @inheritdoc
     */
    public function scenarios()
    {
        // Call the parent's scenarios() function to get the default scenarios
        return parent::scenarios();
    }


    /**
     * Creates data provider instance with search query applied.
     *
     * @param array $params The parameters for the search query.
     *
     * @return ActiveDataProvider The data provider instance with search query applied.
     */
    public function search($params)
    {
        $query = Comment::find();

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
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}