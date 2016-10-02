<?php

use yii\db\Migration;

/**
 * Handles adding phone to table `user`.
 */
class m160924_173325_add_phone_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'phone', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'phone');
    }
}
