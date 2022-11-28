<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "dialog_messages".
 *
 * @property int $id
 * @property int $is_customer
 * @property int|null $is_read
 * @property string $text
 * @property string|null $date
 * @property string|null $attachments
 */
class DialogMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dialog_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_customer', 'text'], 'required'],
            [['is_customer', 'is_read'], 'integer'],
            [['text', 'attachments'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_customer' => 'Is Customer',
            'is_read' => 'Is Read',
            'text' => 'Text',
            'date' => 'Date',
            'attachments' => 'Attachments',
        ];
    }
}
