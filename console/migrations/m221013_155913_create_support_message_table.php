<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%support_message}}`.
 */
class m221013_155913_create_support_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%support_message}}', [
            'id'            => $this->primaryKey(),
            'dialog_id'     => $this->integer()->notNull(),
            'is_support'    => $this->boolean()->defaultValue(0),
            'date'          => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'text'          => $this->text()->notNull(),
            'attachments'   => $this->text()->null(),
            'is_read'       => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%support_message}}');
    }
}
