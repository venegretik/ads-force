<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role}}`.
 */
class m220919_132721_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role}}', [
            'id'            => $this->primaryKey(),
            'role'          => $this->integer()->defaultValue(1),
            'user_id'       => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%role}}');
    }
}
