<?php

namespace common\models;


/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $user_id
 * @property int $postcode
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house_number
 * @property string|null $apartment_number
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return[ 
            [['postcode', 'country', 'city', 'street', 'house_number'], 'required'],
            [['postcode'], 'integer', 'max' => 9999999999],
            [['country', 'user_id'], 'string', 'max' => 25],
            [['city', 'street'], 'string', 'max' => 30],
            [['house_number'], 'string', 'max' => 20],
            [['apartment_number'], 'string', 'max' => 15],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            //'user_id' => 'User ID',
            'postcode' => 'Postcode',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house_number' => 'House Number',
            'apartment_number' => 'Apartment Number',
        ];
    }
    
    public function getUser() {
        return $this->hasOne(User::className(), ['username' => 'user_id']);
    }    

}
