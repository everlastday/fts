<?php

use yii\db\Migration;

/**
 * Handles the creation for table `galleries`.
 */
class m161029_105732_create_galleries_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('galleries', [
            'id' => $this->primaryKey(),
            'gallery_name' => $this->string(),
            'gallery_type' => $this->smallInteger()->defaultValue(0),
            'gallery_categories' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('galleries');
    }
}
