<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tariffs}}`.
 */
class m221013_155023_create_tariffs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tariffs}}', [
            'id'            => $this->primaryKey()->comment('ID'),
            'name'          => $this->string(255)->notNull()->comment('Название тарифа'),
            'advantage'     => $this->text()->null()->comment('Преимущества'),
            'price'         => $this->float()->defaultValue(0)->comment('Цена'),
            'for_whom'      => $this->integer()->notNull()->comment('Для кого'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tariffs}}');
    }
}
