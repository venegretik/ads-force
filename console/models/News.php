<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $subtitle
 * @property string $content
 * @property string $author
 * @property string $source
 * @property string $image
 * @property string|null $date
 * @property string $OG_title
 * @property string $OG_description
 * @property string $OG_image
 * @property string $keywords
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link', 'subtitle', 'author', 'source', 'content', 'image', 'OG_title', 'OG_description', 'OG_image', 'keywords'], 'required'],
            [['image', 'content'], 'string'],
            [['date'], 'safe'],
            [['title', 'link', 'subtitle', 'author', 'source', 'OG_title'], 'string', 'max' => 255],
            [['OG_description'], 'string', 'max' => 511],
            [['OG_image', 'keywords'], 'string', 'max' => 1023],
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
            'link' => 'Ссылка',
            'subtitle' => 'Подзаголовок',
            'content' => 'Контент',
            'author' => 'Автор',
            'source' => 'Источник',
            'image' => 'Изображение',
            'date' => 'Дата',
            'OG_title' => 'OG-Заголовок',
            'OG_description' => 'OG-Описание',
            'OG_image' => 'OG-Изображение',
            'keywords' => 'Ключевые слова',
        ];
    }
}
