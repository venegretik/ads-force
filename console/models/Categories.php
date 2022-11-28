<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $image
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image'], 'required', 'message' => 'Обязательно к заполнению'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 1023],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'image' => 'Изображение',
        ];
    }

    public function getSubCategories()
    {
        return $this->hasMany(SubCategories::className(), ['categories_id' => 'id']);
    }
}
