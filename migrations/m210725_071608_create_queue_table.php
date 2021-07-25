<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%queue}}`.
 */
class m210725_071608_create_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%queue}}', [
            'id' => $this->bigPrimaryKey(),
            'template_id' => $this->bigInteger()->notNull(),
            'FOREIGN KEY(template_id) REFERENCES templates(id)',
            'text' => $this->text()->notNull(),
            'email' => $this->string()->notNull(),
            'send_at' => $this->timestamp(),
            'sent_at' => $this->timestamp(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%queue}}');
    }
}
