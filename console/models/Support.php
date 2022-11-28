<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "support".
 *
 * @property int $id
 * @property int $user_id
 * @property int $support_id
 * @property string $theme
 * @property int|null $status
 * @property string|null $date
 */
class Support extends \yii\db\ActiveRecord
{
    const STATUS_OPEN = 1,
        STATUS_CLOSE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'support';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'support_id', 'theme'], 'required'],
            [['user_id', 'support_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['theme'], 'string', 'max' => 511],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'ID пользователя',
            'support_id' => 'Support ID',
            'theme' => 'Тема',
            'status' => 'Статус',
            'date' => 'Дата',
        ];
    }

    public function getMessage()
    {
        return $this->hasMany(SupportMessage::className(), ['dialog_id' => 'id'])->asArray();
    }
}
