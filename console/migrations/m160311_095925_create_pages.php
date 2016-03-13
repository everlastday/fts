<?php

use yii\db\Migration;

class m160311_095925_create_pages extends Migration
{
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->unique(),
            'title' => $this->string(),
            'page' => $this->text(),
            'gallery' => $this->boolean()->defaultValue(false),

        ]);
    }

    public function down()
    {
        $this->dropTable('pages');
    }
}
