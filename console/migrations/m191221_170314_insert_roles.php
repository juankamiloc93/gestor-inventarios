<?php

use yii\db\Migration;
use frontend\models\User;

/**
 * Class m191221_170314_insert_roles
 */
class m191221_170314_insert_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Agregar permisos        
        $this->insert('auth_item', [
            'name' => 'crudProducto',
            'description' => 'Administrar producto',
            'type' => 2,
            'created_at' => time(),            
        ]);
        $this->insert('auth_item', [
            'name' => 'viewProduct',
            'description' => 'Ver producto',
            'type' => 2,
            'created_at' => time(),            
        ]);
        $this->insert('auth_item', [
            'name' => 'adminUsers',
            'description' => 'Administrar usuarios',
            'type' => 2,
            'created_at' => time(),            
        ]);

        //Agregar roles
        $this->insert('auth_item', [
            'name' => 'admin',
            'description' => 'Administrador',
            'type' => 1,
            'created_at' => time(),            
        ]);
        $this->insert('auth_item', [
            'name' => 'basic',
            'description' => 'Basico',
            'type' => 1,
            'created_at' => time(),
            
        ]);

        //Asignar permisos a los roles
        $this->insert('auth_item_child', [
            'parent' => 'admin',
            'child' => 'crudProducto',           
        ]);
        $this->insert('auth_item_child', [
            'parent' => 'admin',
            'child' => 'viewProduct',           
        ]);
        $this->insert('auth_item_child', [
            'parent' => 'admin',
            'child' => 'adminUsers',           
        ]);
        $this->insert('auth_item_child', [
            'parent' => 'basic',
            'child' => 'viewProduct',           
        ]);

        //$this->alterColumn('auth_assignment', 'user_id', $this->integer());
        //$this->addForeignKey('id_user_fkey', 'auth_assignment', 'user_id', 'user', 'id', 'CASCADE');
        
        //Asignar roles a los usuarios
        $jaimeId = User::find()->select('id')->where(['username' => 'jaime'])->one(); 
        $this->insert('auth_assignment',[
            'item_name' =>  'admin',
            'user_id' => $jaimeId['id'],
            'created_at' => time()
        ]);
        $juanId = User::find()->select('id')->where(['username' => 'juan'])->one(); 
        $this->insert('auth_assignment',[
            'item_name' => 'basic',
            'user_id' => $juanId['id'],
            'created_at' => time()
        ]);
        $cesarId = User::find()->select('id')->where(['username' => 'cesar'])->one(); 
        $this->insert('auth_assignment',[
            'item_name' => 'basic',
            'user_id' => $cesarId['id'],
            'created_at' => time()
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('auth_assignment');
        $this->delete('auth_item_child');
        $this->delete('auth_item');        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191221_170314_insert_roles cannot be reverted.\n";

        return false;
    }
    */
}
