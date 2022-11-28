<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $about_id
 * @property string $text
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['about_id'], 'integer'],
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'about_id' => 'О ком отзыв',
            'text' => 'Текст отзыва',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getInfo()
    {
        $info = $this->hasOne(Performers::className(), ['user_id' => 'user_id']);
         if(empty($info)){
             $info = $this->hasOne(Customer::className(), ['user_id' => 'user_id']);
         }

        return $info;
    }
}
