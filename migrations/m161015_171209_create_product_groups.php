<?php

use yii\db\Migration;

class m161015_171209_create_product_groups extends Migration
{
    public function up()
    {
	    $this->createTable('product_groups', [
		    'id' => $this->primaryKey(),
		    'group' => $this->smallInteger(),
		    'product_category_id' => $this->integer()->defaultValue(0),
		    'type' => $this->smallInteger(),
			'price' => $this->string()->defaultValue(0),
	    ]);

	    $this->addForeignKey('product_categories_id', 'product_groups', 'product_category_id', 'product_categories', 'id' );
    }

    public function down()
    {
	    $this->dropTable('product_groups');
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
