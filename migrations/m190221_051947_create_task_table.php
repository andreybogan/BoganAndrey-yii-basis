<?php

use yii\db\Migration;

/**
 * Handles the creation of table task.
 */
class m190221_051947_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'description' => $this->text(),
            'responsible_id' => $this->integer()
        ]);

        $this->createIndex('ix_task_responsible_id', 'task', 'responsible_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
        $this->dropIndex('ix_task_responsible_id', 'task');
    }
}
