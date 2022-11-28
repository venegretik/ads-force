<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "support_message".
 *
 * @property int $id
 * @property int $dialog_id
 * @property int|null $is_support
 * @property string|null $date
 * @property string $text
 * @property string|null $attachments
 * @property int|null $is_read
 */
class SupportMessage extends \yii\db\ActiveRecord
{
    const SAPPORT = 0,
        USER = 1,
        READ = 1,
        UN_READ = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'support_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dialog_id', 'text'], 'required'],
            [['dialog_id', 'is_support', 'is_read'], 'integer'],
            [['date'], 'safe'],
            [['text', 'attachments'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dialog_id' => 'Dialog ID',
            'is_support' => 'Is Support',
            'date' => 'Date',
            'text' => 'Text',
            'attachments' => 'Attachments',
            'is_read' => 'Is Read',
        ];
    }
}
