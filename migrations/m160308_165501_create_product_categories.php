<?php

use yii\db\Migration;

class m160308_165501_create_product_categories extends Migration
{
    public function up()
    {
        $this->createTable('product_categories', [
            'id' => $this->primaryKey(),
            'category_name' => $this->string()->unique(),
            'status' => $this->smallInteger(1)->defaultValue(1),
        ]);


    }

    public function down()
    {
        $this->dropTable('product_categories');
    }
}
