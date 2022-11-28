<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m221027_135432_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id'                => $this->primaryKey(),
            'user_id'           => $this->integer()->notNull(),
            'photo'             => $this->string(1023)->null(),
            'rating'            => $this->integer()->defaultValue(0),
            'fio'               => $this->string(255)->null(),
            'skils'             => $this->text()->null(),

            'about'             => $this->text()->null(),
            'information'       => $this->text()->null(),
            'date_register'     => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'dob'               => $this->string()->null(),
            'phone'             => $this->string()->null(),
            'email'             => $this->string()->null(),
            'email_confirm'     => $this->boolean()->defaultValue(0), // 0 - not confirm, 1 - confirm
            'fiz_payment_info'  => $this->text()->null(),
            'jur_payment_info'  => $this->text()->null(),
            'notise'            => $this->text()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%customer}}');
    }
}
