<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "success_stories".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $content
 * @property string|null $what_do
 */
class SuccessStories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'success_stories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image', 'content', 'term'], 'required'],
            [['content', 'what_do', 'term'], 'string'],
            [['title', 'term'], 'string', 'max' => 255],
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
            'title' => 'Заголовок',
            'image' => 'Изображение',
            'content' => 'Контент',
            'what_do' => 'Что сделано',
            'term'    => 'Срок'
        ];
    }
}
