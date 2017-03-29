<?php

use yii\db\Migration;

/**
 * Handles adding payed to table `orders`.
 */
class m170329_123229_add_payed_column_to_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
	    $this->addColumn('orders', 'payed', $this->smallInteger()->notNull()->defaultValue(0));
	    $this->createIndex('payed', 'orders', 'payed');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
	    $this->dropColumn('orders', 'payed');
    }
}
