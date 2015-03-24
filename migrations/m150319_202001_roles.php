<?php

use yii\db\Schema;
use yii\db\Migration;

class m150319_202001_roles extends Migration
{
    public function up()
    {
        //Creación de roles
        $auth = Yii::$app->authManager;
        $auth->createRole('admin');
        $auth->createRole('gerente');
        $auth->createRole('desarrollador');
        $auth->createRole('jefe');
    }

    public function down()
    {
       //Eliminación de roles
        $auth = Yii::$app->authManager;
        $auth->removeAllRoles();
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
