<?php

namespace console\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property int|null $role
 * @property int $user_id
 */
class Role extends \yii\db\ActiveRecord
{


    const ROLE_ADMIN = 0,
        ROLE_PERFORMERS = 1,
        ROLE_CUSTOMER = 2;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_PERFORMERS => 'Исполнитель',
            self::ROLE_CUSTOMER => 'Заказчик',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'user_id'], 'integer'],
            [['user_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Роль',
            'user_id' => 'Пользователь',
        ];
    }
}
