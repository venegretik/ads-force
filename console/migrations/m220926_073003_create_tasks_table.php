<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tasks}}`.
 */
class m220926_073003_create_tasks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tasks}}', [
            'id'                => $this->primaryKey(),
            'author_id'         => $this->integer()->notNull(),
            'performer_id'      => $this->integer()->null(),
            'title'             => $this->string(511)->notNull(),
            'about_project'     => $this->text()->notNull(),
            'technical_task'    => $this->text()->null(),
            'price'             => $this->integer()->defaultValue(0),
            'deadline'          => $this->string(255)->notNull(),
            'tags'              => $this->text()->null(),
            'status'            => "ENUM('Свободен', 'Повышенный спрос', 'В работе', 'Выполнен')",
            'responded'         => $this->integer()->defaultValue(0),
            'materials'         => $this->text()->null(),
            'active'            => $this->boolean()->defaultValue(0), // 0 - inactive / 1 - active
            'views'             => $this->integer()->defaultValue(0),
            'date_public'       => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tasks}}');
    }
}
