<?php

use yii\db\Schema;
use yii\db\Migration;

class m150319_133150_usuario extends Migration
{
    public function up()
    {
        $this->createTable("usuario",[
            'id' => Schema::TYPE_PK, //Constante que vale PK, es un string EJE: comprueba motor, PK eq a la elección de la base de datos
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'mail' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL '
        ]);

        $this->insert("usuario", [
            'name' => 'admin00',
            'mail' => 'heckar90@gmail.com',
            'password' => Yii::$app->getSecurity()->generatePasswordHash('admincojones')

        ]);
    }

    public function down()
    {
        echo "Eliminando tabla usuario\n";
        $this->dropTable('usuario');
    }

}
