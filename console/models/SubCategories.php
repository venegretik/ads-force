<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "sub_categories".
 *
 * @property int $id
 * @property int|null $categories_id
 * @property string|null $title
 */
class SubCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categories_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['categories_id', 'title'], 'required', 'message' => 'Обязательно к заполнению'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categories_id' => 'Категория',
            'title' => 'Название',
        ];
    }
}
