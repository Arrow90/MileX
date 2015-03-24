<?php

use yii\db\Schema;
use yii\db\Migration;

class m150311_090153_persona extends Migration
{
    public function up()        //yii migrate crear base de datos :)
    {
        $this->createTable('persona', [
            'id' => Schema::TYPE_PK,
            'nombre' => Schema::TYPE_STRING . '(45) NOT NULL',
            'apellidos' => Schema::TYPE_STRING,
            'password' => Schema::TYPE_STRING,
            'avatar' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_TIMESTAMP,
            'updated_at' => Schema::TYPE_TIMESTAMP
        ]);
    }

    public function down()
    {
       $this->dropTable('persona');
    }
}
