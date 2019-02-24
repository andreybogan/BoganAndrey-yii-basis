<?php

use yii\db\Migration;

/**
 * Class m190224_094746_add_created_and
 */
class m190224_094746_add_created_and extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'created_at', $this->dateTime());
        $this->addColumn('task', 'updated_at', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'created_at');
        $this->dropColumn('task', 'updated_at');
    }
}
