<?php

use yii\db\Migration;

class m170203_162252_create_orders extends Migration
{
    public function up()
    {

	    $this->createTable('orders', [
		    'id' => $this->primaryKey(),
		    'fio' => $this->string(30),
		    'phone' => $this->string(30),
		    'delivery' => $this->string(20),
		    'payment_method' => $this->string(20),
		    'comment' => $this->text(),
		    'total_price'  => $this->text(),
		    'items'  => $this->text(),
		    'status' => $this->smallInteger(3)->defaultValue(0),
	        'user_id' => $this->integer(11)->defaultValue(0),
	    ]);

	    $this->createIndex('user_id', 'orders', 'user_id');

    }

    public function down()
    {
	    $this->dropTable('orders');
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
