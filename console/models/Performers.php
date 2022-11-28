<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "performers".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $photo
 * @property int|null $rating
 * @property string|null $fio
 * @property string|null $skills
 * @property string|null $position
 * @property int|null $specialization_id
 * @property string|null $about
 * @property string|null $information
 * @property string|null $date_register
 * @property string|null $dob
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $email_confirm
 * @property string|null $fiz_payment_info
 * @property string|null $jur_payment_info
 * @property string|null $notise
 */
class Performers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'performers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'rating', 'specialization_id', 'email_confirm'], 'integer'],
            [['skills', 'about', 'information', 'fiz_payment_info', 'jur_payment_info', 'notise'], 'string'],
            [['date_register'], 'safe'],
            [['photo'], 'string', 'max' => 1023],
            [['fio', 'position', 'dob', 'phone', 'email'], 'string', 'max' => 255],
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
            'fio' => 'Fio',
            'skills' => 'Skills',
            'position' => 'Position',
            'specialization_id' => 'Specialization ID',
            'about' => 'About',
            'information' => 'Information',
            'date_register' => 'Date Register',
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
