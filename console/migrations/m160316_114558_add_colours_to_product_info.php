<?php

use yii\db\Migration;

class m160316_114558_add_colours_to_product_info extends Migration
{
    public function up()
    {
        $this->addColumn('product_info','colors_url','VARCHAR(150)');
    }

    public function down()
    {
    }
}
