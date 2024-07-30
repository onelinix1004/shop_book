<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $description
 * @property integer $category_id
 * @property integer $sales_count //Thêm cột sales_count vào đây
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrdersItem[] $ordersItems
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    public $pdfFile; // Thuộc tính tạm thời để tải lên tệp PDF
    public $quantity;
    /**
     * Returns the table name associated with this ActiveRecord class.
     *
     * @return string the table name of the database table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * This function defines the validation rules for the Product model.
     *
     * @return array the validation rules for model attributes.
     */
    public function rules()
    {
        return [
            // 'name', 'price', 'category_id', and 'description' are required fields
            [['name', 'price', 'category_id','description'], 'required','message'=>'{attribute}  không đưọc để trống'],

            // 'file' must be a valid image file with extensions: jpg, png, gif
            ['file','file','extensions'=>'jpg,png,gif'],

            // 'price' must be a number
            [['price'], 'number','message'=>'Sai định dạng'],

            // 'category_id', 'created_at', 'updated_at', and 'sales_count' must be integers
            [['category_id', 'created_at', 'updated_at', 'sales_count'], 'integer'],

            // 'name', 'image', and 'description' must be strings with a maximum length of 255 characters
            [['name', 'image', 'description'], 'string', 'max' => 255],

            // 'category_id' must exist in the 'id' column of the 'Category' table
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * This function returns the labels for the attributes of the Product model.
     *
     * @return array the attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên',
            'image' => 'Hình ảnh',
            'price' => 'Giá',
            'file' => 'Hình ảnh',
            'description' => 'Mô tả',
            'category_id' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'sales_count' => 'Số lượng bán', //Thêm nhãn cho sales_count
            'pdfFile' => 'Tệp PDF', // Nhãn cho trường tệp PDF
        ];
    }

    /**
     * This function returns a list of orders items associated with the current product.
     *
     * @return \yii\db\ActiveQuery
     * @return \yii\db\ActiveQuery An ActiveQuery instance representing the relation between the Product model and the OrdersItem model.
     * The relation is established through the 'product_id' attribute in the OrdersItem model.
     */
    public function getOrdersItems()
    {
        return $this->hasMany(OrdersItem::className(), ['product_id' => 'id']);
    }

    /**
     * This function returns a relation to the Category model representing the category of the current product.
     *
     * @return \yii\db\ActiveQuery
     * @return \yii\db\ActiveQuery An ActiveQuery instance representing the relation between the Product model and the Category model.
     * The relation is established through the 'category_id' attribute in the Product model.
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



}
