<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property string $content
 * @property int $created_at
 *
 * @property Product $product
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * Returns the table name associated with this ActiveRecord class.
     *
     * @return string the table name of the database table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * This function returns the validation rules for the model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['product_id', 'user_id', 'content', 'created_at'], 'required'],
            [['product_id', 'user_id', 'created_at'], 'integer'],
            [['content'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * Returns the labels for the attributes of this model.
     *
     * The labels are mainly used in error messages of validation.
     *
     * @return array the attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * This function returns an ActiveQuery object that can be used to query related records
     * in the database table 'product'. The relationship is defined in the 'product_id' attribute
     * of the current model.
     *
     * @return \yii\db\ActiveQuery
     * @property Product $product The related 'Product' model.
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * This function returns an ActiveQuery object that can be used to query related records
     * in the database table 'user'. The relationship is defined in the 'user_id' attribute
     * of the current model.
     *
     * @return \yii\db\ActiveQuery
     * @property User $user The related 'User' model.
     */
    public function getUser()
    {
        return $this->hasOne('User', ['id' => 'user_id']);
    }
}