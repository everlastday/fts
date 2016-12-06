<?php

use yii\db\Migration;

/**
 * Handles the creation for table `attributes`.
 */
class m161206_210001_create_attributes_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_attributes', [
            'id' => $this->primaryKey(),
            'product_category_id' => $this->integer()->defaultValue(0),
            'attribute' => $this->string(),
            'attribute_values' => $this->string()

        ]);

	    $this->addForeignKey('categories_to_product', 'product_attributes', 'product_category_id', 'product_categories', 'id' );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_attributes');
    }
}
