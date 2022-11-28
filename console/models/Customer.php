<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $photo
 * @property int|null $rating
 * @property string|null $skils
 * @property string|null $about
 * @property string|null $information
 * @property string|null $date_register
 * @property string|null $fio
 * @property string|null $dob
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $email_confirm
 * @property string|null $fiz_payment_info
 * @property string|null $jur_payment_info
 * @property string|null $notise
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'rating', 'email_confirm'], 'integer'],
            [['skils', 'about', 'information', 'fiz_payment_info', 'jur_payment_info', 'notise'], 'string'],
            [['date_register'], 'safe'],
            [['photo'], 'string', 'max' => 1023],
            [['fio', 'dob', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'photo' => 'Photo',
            'rating' => 'Rating',
            'skils' => 'Skils',
            'about' => 'About',
            'information' => 'Information',
            'date_register' => 'Date Register',
            'fio' => 'Fio',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'email' => 'Email',
            'email_confirm' => 'Email Confirm',
            'fiz_payment_info' => 'Fiz Payment Info',
            'jur_payment_info' => 'Jur Payment Info',
            'notise' => 'Notise',
        ];
    }
}
