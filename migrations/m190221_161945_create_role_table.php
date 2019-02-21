<?php

use yii\db\Migration;

/**
 * Handles the creation of table role.
 */
class m190221_161945_create_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()
        ]);

        $this->addColumn('user', 'role_id', $this->integer());

        $this->createIndex('ix_user_role', 'user', 'role_id');

        $this->addForeignKey(
            'fk_user_role',
            'user',
            'role_id',
            'role',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('role');
        $this->dropColumn('user', 'role_id');
        $this->dropForeignKey('fk_user_role', 'user');
    }
}
