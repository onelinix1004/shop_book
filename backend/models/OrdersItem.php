<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders_item".
 *
 * @property integer $id
 * @property integer $orders_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $price
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Orders $orders
 * @property Product $product
 */
class OrdersItem extends \yii\db\ActiveRecord
{
    /**
     * Returns the table name associated with this ActiveRecord class.
     *
     * @return string the table name of the database table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'orders_item';
    }

    /**
     * This function returns the validation rules for the model attributes.
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // 'orders_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at' are required to be integers.
            [['orders_id', 'product_id', 'quantity', 'price', 'created_at', 'updated_at'], 'integer'],

            // 'created_at' and 'updated_at' are required fields.
            [['created_at', 'updated_at'], 'required'],

            // 'status' is a string with a maximum length of 255 characters.
            [['status'], 'string', 'max' => 255],

            // 'orders_id' must exist in the 'id' column of the 'orders' table.
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],

            // 'product_id' must exist in the 'id' column of the 'product' table.
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * This function returns the labels for the attributes of the model.
     *
     * The labels are used in the form of the model to display attribute names in specific scenarios.
     *
     * @return array the attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'Khách hàng',
            'product_id' => 'Thực đơn',
            'quantity' => 'Số lượng',
            'price' => 'Tổng tiền',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày đặt hàng',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * This function returns a query object that can be used to retrieve the related 'Orders' record for this 'OrdersItem'.
     *
     * @return \yii\db\ActiveQuery the relational query object.
     *
     * @property Orders $orders The related 'Orders' record.
     *
     * @see Orders
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id']);
    }

    /**
     * This function returns a query object that can be used to retrieve the related 'Product' record for this 'OrdersItem'.
     *
     * @return \yii\db\ActiveQuery the relational query object.
     *
     * @property Product $product The related 'Product' record.
     *
     * @see Product
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
