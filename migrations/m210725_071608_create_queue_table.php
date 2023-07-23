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
            'id' => $this->bigPrimaryKey()->unsigned(),
            'template_id' => $this->bigInteger()->unsigned()->notNull(),
            'text' => $this->text()->notNull(),
            'email' => $this->string()->notNull(),
            'send_at' => $this->timestamp(),
            'sent_at' => $this->timestamp(),
            'status' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        // creates index for column `template_id`
        $this->createIndex(
            'idx-queue-template_id',
            'queue',
            'template_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops index for column `template_id`
        $this->dropIndex(
            'idx-templates-template_id',
            'queue'
        );

        $this->dropTable('{{%queue}}');
    }
}
