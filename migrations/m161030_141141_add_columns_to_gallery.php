<?php

use yii\db\Migration;

class m161030_141141_add_columns_to_gallery extends Migration
{
    public function up()
    {
	    $this->addColumn('gallery', 'galleries_id', $this->integer());
	    $this->addColumn('gallery', 'options', $this->string());

	    $this->createIndex('galleries_id', 'gallery', 'galleries_id');
    }

    public function down()
    {
	    $this->dropColumn('gallery', 'galleries_id');
	    $this->dropColumn('gallery', 'options');
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
