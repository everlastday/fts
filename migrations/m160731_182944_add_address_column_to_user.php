<?php

use yii\db\Migration;

class m160731_182944_add_address_column_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'address', $this->string());
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'address');
    }
}
