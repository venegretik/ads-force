<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m221023_135144_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id'                    => $this->primaryKey(),
            'title'                 => $this->string(255)->notNull(),
            'link'                  => $this->string(255)->notNull(),
            'subtitle'              => $this->string(255)->notNull(),
            'content'               => $this->text()->notNull(),
            'author'                => $this->string(255)->notNull(),
            'source'                => $this->string(255)->notNull(),
            'image'                 => $this->text()->notNull(),
            'date'                  => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'OG_title'              => $this->string(255)->notNull(),
            'OG_description'        => $this->string(511)->notNull(),
            'OG_image'              => $this->string(1023)->notNull(),
            'keywords'              => $this->string(1023)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
