<?php

use yii\db\Migration;

class m161029_180320_add_column_url_to_galleries extends Migration
{
    public function up()
    {
	    $this->addColumn('galleries', 'url', $this->string(50)->notNull()->unique());
    }

    public function down()
    {
	    $this->dropColumn('galleries', 'url');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
