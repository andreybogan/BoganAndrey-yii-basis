<?php

use yii\db\Migration;

/**
 * Handles the creation of table user.
 */
class m190221_110159_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(56)->notNull(),
            'second_name' => $this->string(56)->notNull(),
            'login' => $this->string(56)->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk_task_user_responsible',
            'task',
            'responsible_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
        $this->dropForeignKey('fk_task_user_responsible', 'task');
    }
}
