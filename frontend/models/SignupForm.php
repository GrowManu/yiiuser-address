<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Address;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $user_id;
    public $email;
    public $name;
    public $surname;
    public $sex;
    public $password;
    public $postcode;
    public $country;
    public $city;
    public $street;
    public $house_number;
    public $apartment_number;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 4, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 1, 'max' => 25],
            
            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'string', 'min' => 1, 'max' => 25],
            
            ['sex', 'required'],
            ['sex', 'integer'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            
            [['postcode', 'country', 'city', 'street', 'house_number'], 'required'],
            [['postcode'], 'integer', 'max' => 9999999999],
            [['country'], 'string', 'max' => 25],
            [['city', 'street'], 'string', 'max' => 30],
            [['house_number'], 'string', 'max' => 20],
            [['apartment_number'], 'string', 'max' => 15],
            
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->sex = $this->sex;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        
        $address = new Address();
        $address->user_id = $user->username;
        $address->postcode = $this->postcode;
        $address->country = $this->country;
        $address->city = $this->city;
        $address->street = $this->street;
        $address->house_number = $this->house_number;
        $address->apartment_number = $this->apartment_number;
        
        return $user->save() && $address->save() && $this->sendEmail($user);
        
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
