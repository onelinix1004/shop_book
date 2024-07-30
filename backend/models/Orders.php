<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $amount
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property OrdersItem[] $ordersItems
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * Returns the table name associated with this ActiveRecord class.
     *
     * @return string the table name of the database table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * This function returns the validation rules for the model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['user_id', 'amount', 'created_at', 'updated_at'], 'integer'],
            [['name', 'phone', 'address', 'created_at', 'updated_at'], 'required'],
            [['name', 'address'], 'string', 'max' => 225],
            [['phone'], 'string', 'max' => 14],
            [['status'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * This function returns the labels for the attributes of the model.
     *
     * The labels are mainly used in form field generation and display in views.
     *
     * @return array the attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Username',
            'amount' => 'Tổng tiền',
            'name' => 'Khách hàng',
            'phone' => 'Liên hệ',
            'address' => 'Địa chỉ',
            'note' => 'Ghi chú thêm',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày đặt hàng',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * This function returns a query for the related User model.
     *
     * The function uses the `hasOne` method to establish a one-to-one relationship between the Orders model and the User model.
     * The relationship is defined by the 'user_id' attribute in the Orders model and the 'id' attribute in the User model.
     *
     * @return \yii\db\ActiveQuery the query for the related User model.
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * This function returns a query for the related OrdersItem model.
     *
     * The function uses the `hasMany` method to establish a one-to-many relationship between the Orders model and the OrdersItem model.
     * The relationship is defined by the 'orders_id' attribute in the OrdersItem model and the 'id' attribute in the Orders model.
     *
     * @return \yii\db\ActiveQuery the query for the related OrdersItem model.
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::className(), ['orders_id' => 'id']);
    }
}
