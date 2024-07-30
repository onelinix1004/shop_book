<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Product[] $products
 */
//Lớp Category kế thừa từ lớp yii\db\ActiveRecord,
// cho phép chúng ta tương tác dễ dàng với cơ sở dữ liệu thông qua các đối tượng Category.
class Category extends \yii\db\ActiveRecord
{
    /**
     * This method returns the name of the database table associated with the Category model.
     *
     * @return string The name of the database table.
     */
     //Phương thức tableName() được định nghĩa để xác định tên bảng cơ sở
     // dữ liệu tương ứng với lớp Category. Trong ví dụ này, bảng có tên là "category".
    public static function tableName()
    {
        return 'category';
    }

    /**
     * This method returns the validation rules for the model attributes.
     *
     * @return array The validation rules for the model attributes.
     *
     * @return array The validation rules, where:
     * - 'required' rule ensures that the 'name' attribute is not empty.
     * - 'string' rule ensures that the 'name' attribute is a string.
     * - 'max' rule ensures that the 'name' attribute does not exceed 255 characters.
     * - 'unique' rule ensures that the 'name' attribute is unique in the database.
     */
     //Phương thức rules() chứa các quy tắc hợp lệ (validation rules) được áp dụng cho thuộc 
     //tính name của đối tượng Category. Đoạn mã này quy định rằng thuộc tính name là bắt buộc (required),
     //không vượt quá 255 ký tự (string, max 255) và duy nhất (unique).
    public function rules()
    {
        return [
            [['name'], 'required','message'=>'Không được để trống !'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * This method returns the labels for the attributes of the Category model.
     *
     * @return array The attribute labels, where the keys are the attribute names and the values are the corresponding labels.
     *
     * @return array The attribute labels, where:
     * - 'id' corresponds to the label 'ID'.
     * - 'name' corresponds to the label 'Tên Category'.
     */
     //Phương thức attributeLabels() xác định các nhãn
     // cho các thuộc tính của đối tượng, nhằm mục đích hiển thị cho người dùng.
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên Category',
        ];
    }

    /**
     * This method returns an Active Query object that represents a relation between the Category model and Product model.
     * The relation is established through the 'category_id' foreign key in the 'product' table.
     *
     * @return \yii\db\ActiveQuery An Active Query object representing the relation between Category and Product models.
     *
     * @return \yii\db\ActiveQuery The Active Query object, where:
     * - `Product::className()` specifies the related model class (Product).
     * - `['category_id' => 'id']` defines the foreign key and primary key relationship between the two models.
     *   In this case, the 'category_id' in the 'product' table is related to the 'id' in the 'category' table.
     */
     //Phương thức getProducts() là một phương thức truy vấn liên kết (Active Query) được định nghĩa 
     //để thiết lập mối quan hệ giữa đối tượng Category và Product 
     //thông qua khóa ngoại category_id của bảng Product.
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
