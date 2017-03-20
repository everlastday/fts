<?php

use yii\db\Migration;

class m160309_194016_create_product_info extends Migration
{
    public function up()
    {
        $this->createTable('product_info', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->unique(),
            'name' => $this->string(),
            'product_image' => $this->string(),
            'params' => $this->text(),
            'info' => $this->text(),
            'category_id' => $this->integer()->defaultValue(0),
        ]);

        $this->addForeignKey('category_info_id', 'product_info', 'category_id', 'product_categories', 'id' );



    }

    public function down()
    {
        $this->dropTable('product_info');
    }
}
