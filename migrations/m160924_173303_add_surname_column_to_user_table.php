<?php

use yii\db\Migration;

/**
 * Handles adding surname to table `user`.
 */
class m160924_173303_add_surname_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%user}}', 'surname', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%user}}', 'surname');
    }
}
