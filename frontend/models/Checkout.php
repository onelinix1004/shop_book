<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Checkout extends Model
{
    public $name;
    public $phone;
    public $address;
    public $note;
    public $amount;
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone', 'address', 'note'], 'required','message'=>'{attribute} không được để trống.'],
            // email has to be a valid email address
           
            // verifyCode needs to be entered correctly
            ['phone', 'integer','message'=>'Số điện thoại không đúng.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'=> 'Họ và tên',
            'phone'=> 'Số điện thoại',
            'address'=> 'Địa chỉ' ,
            'note'=> 'Ghi chú khác',
        ];
    }

    
}
