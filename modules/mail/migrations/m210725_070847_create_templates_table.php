<?php

namespace app\modules\mail\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%templates}}`.
 */
class m210725_070847_create_templates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%templates}}', [
            'id' => $this->bigPrimaryKey()->unsigned(),
            'user_id' => $this->bigInteger()->unsigned()->notNull(),
            'text' => $this->text(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%templates}}');
    }
}
