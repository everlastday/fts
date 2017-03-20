<?php

use yii\db\Migration;

class m160605_135151_create_gallery extends Migration
{
    public function up()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'type' => $this->integer()->defaultValue(1),
            'title' => $this->string(),
            'img' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('gallery');
    }
}
