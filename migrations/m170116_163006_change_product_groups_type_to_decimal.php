<?php

use yii\db\Migration;

class m170116_163006_change_product_groups_type_to_decimal extends Migration
{
    public function up()
    {
		$this->alterColumn('product_groups', 'type', $this->decimal(6,2));
    }

    public function down()
    {
	    $this->alterColumn('product_groups', 'type', $this->smallInteger(6));
    }

}
