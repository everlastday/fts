<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m160926_175755_add_role_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'role', $this->smallInteger()->notNull()->defaultValue(0));
	    $this->createIndex('role', '{{%user}}', 'role');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'role');
    }
}
