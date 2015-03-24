<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_113534_coches extends Migration
{
    public function up()
    {
        $this->createTable('coche', [
            'id' => Schema::TYPE_PK,
            'nombre' => Schema::TYPE_STRING,
            'persona_id' => Schema::TYPE_INTEGER
        ]);

        $this->addForeignKey('fk_coche_persona_id', 'coche', 'persona_id', 'persona', 'id', 'CASCADE', 'CASCADE');
    }

    public function down() {
        $this->dropTable('coche');
    }

}
