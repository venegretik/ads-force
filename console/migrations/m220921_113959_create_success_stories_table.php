<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%success_stories}}`.
 */
class m220921_113959_create_success_stories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%success_stories}}', [
            'id'            => $this->primaryKey(),
            'title'         => $this->string(255)->notNull(),
            'image'         => $this->string(1023)->notNull(),
            'content'       => $this->text()->notNull(),
            'what_do'       => $this->text(),
            'term'          => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%success_stories}}');
    }
}
