<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "dialogs".
 *
 * @property int $id
 * @property int $performers_id
 * @property int $customer_id
 */
class Dialogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dialogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['performers_id', 'customer_id'], 'required'],
            [['performers_id', 'customer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'performers_id' => 'Performers ID',
            'customer_id' => 'Customer ID',
        ];
    }
}
