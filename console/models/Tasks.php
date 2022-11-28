<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $author_id
 * @property int|null $performer_id
 * @property string $title
 * @property string $about_project
 * @property string|null $technical_task
 * @property int|null $price
 * @property string $deadline
 * @property string|null $tags
 * @property string|null $status
 * @property int|null $responded
 * @property string|null $materials
 * @property int|null $active
 * @property int|null $views
 * @property string $date_public
 */
class Tasks extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1,
        STATUS_INACTIVE = 0,
        STATUS_FREE = 'Свободен',
        STATUS_TOP = 'Повышенный спрос',
        STATUS_WORK = 'В работе',
        STATUS_COMPLETE = 'Выполнен';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'title', 'about_project', 'deadline'], 'required'],
            [['author_id', 'performer_id', 'price', 'responded', 'active', 'views'], 'integer'],
            [['about_project', 'technical_task', 'tags', 'status', 'materials'], 'string'],
            [['date_public'], 'safe'],
            [['title'], 'string', 'max' => 511],
            [['deadline'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'performer_id' => 'Performer ID',
            'title' => 'Title',
            'about_project' => 'About Project',
            'technical_task' => 'Technical Task',
            'price' => 'Price',
            'deadline' => 'Deadline',
            'tags' => 'Tags',
            'status' => 'Status',
            'responded' => 'Responded',
            'materials' => 'Materials',
            'active' => 'Active',
            'views' => 'Views',
            'date_public' => 'Date Public',
        ];
    }
}
