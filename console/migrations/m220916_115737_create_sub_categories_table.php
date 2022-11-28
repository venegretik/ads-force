<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sub_categories}}`.
 */
class m220916_115737_create_sub_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sub_categories}}', [
            'id'                        => $this->primaryKey(),
            'categories_id'             => $this->integer(),
            'title'                     => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sub_categories}}');
    }
}
