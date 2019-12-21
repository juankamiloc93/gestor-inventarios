<?php

use yii\db\Migration;

/**
 * Class m191221_164758_insert_user_roles
 */
class m191221_164758_insert_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' =>'jaime',
            'auth_key' => 'ygys_iF7XkpqKU_TsdU0F-0JTkGBmI-6',
            'password_hash' => '$2y$13$oCH9lSAJVgEU0exYjK06Su/Dl3DtSU.CskFRITolfhqSyqskCSlPy',
            'email' => 'jaime@inventarios.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('user', [
            'username' =>'juan',
            'auth_key' => 'ygys_iF7XkpqKU_TsdU0F-0JTkGBmI-6',
            'password_hash' => '$2y$13$oCH9lSAJVgEU0exYjK06Su/Dl3DtSU.CskFRITolfhqSyqskCSlPy',
            'email' => 'juan@inventarios.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('user', [
            'username' =>'cesar',
            'auth_key' => 'ygys_iF7XkpqKU_TsdU0F-0JTkGBmI-6',
            'password_hash' => '$2y$13$oCH9lSAJVgEU0exYjK06Su/Dl3DtSU.CskFRITolfhqSyqskCSlPy',
            'email' => 'cesar@inventarios.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->delete('user', [
           'username' => 'jaime',
           'username' => 'juan',
           'username' => 'cesar',
        ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191221_164758_insert_user_roles cannot be reverted.\n";

        return false;
    }
    */
}
