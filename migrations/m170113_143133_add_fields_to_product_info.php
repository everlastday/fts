<?php

use yii\db\Migration;

class m170113_143133_add_fields_to_product_info extends Migration
{
    public function up()
    {
	    $this->addColumn('product_info', 'gallery_id', $this->integer());
	    $this->addColumn('product_info', 'measure', $this->string(50));
	    $this->dropColumn('product_info', 'colors_url');

	    $this->createIndex('gallery_id', 'product_info', 'gallery_id');
    }

    public function down()
    {
	    $this->dropIndex('gallery_id', 'product_info');
	    $this->dropColumn('product_info', 'gallery_id');
	    $this->dropColumn('product_info', 'measure');
	    $this->addColumn('product_info','colors_url','VARCHAR(150)');
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
