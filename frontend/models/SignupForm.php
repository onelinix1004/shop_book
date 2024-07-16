<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $fullname;
    public $address;
    public $phone;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','password','email','phone','address','fullname'], 'required','message'=>'{attribute} không được bỏ trống !'],
            ['phone', 'number'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Tên đăng nhập đã tồn tại !.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Tên đăng nhập',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'fullname' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->fullname = $this->fullname;
        $user->address = $this->address;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
