<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $email
 * @property string $phone
 * @property string $body
 * @property integer $created_at
 * @property integer $updated_at
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * Returns the table name associated with this ActiveRecord class.
     *
     * @return string the table name of the database table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * This function returns the validation rules for the attributes of the model.
     *
     * @return array the validation rules. Each rule is an array with the following structure:
     * [
     *     ['attribute1, attribute2, ...'], // the attributes to be validated by the rule
     *     'validator type', // the validator type (e.g., 'required', 'string', 'integer')
     *     'on' => 'scenario name', // optional, the scenario names this rule applies to
     *     'max' => 255, // optional, the maximum length of the attribute value in case of 'string' validator
     * ]
     *
     * @see https://www.yiiframework.com/doc/guide/2.0/en/tutorial-core-validators for more information about built-in validators.
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'body', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['email', 'phone', 'body'], 'string', 'max' => 255],
        ];
    }

    /**
     * Returns the labels for the attributes of the model.
     *
     * This method is used by the 'attributeLabels()' function to provide custom labels for the attributes in the model.
     *
     * @return array the attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
