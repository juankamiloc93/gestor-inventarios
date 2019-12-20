<?php

use yii\db\Migration;

/**
 * Class m191220_210423_create_tables
 */
class m191220_210423_create_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categoria', [
            'id_categoria' => $this->primaryKey(),
            'nombre' => $this->string(32)->notNull(),
            'estado' => $this->integer(),
        ],'engine = InnoDB');
        
        $this->createTable('subcategoria', [
            'id_subcategoria' => $this->primaryKey(),
            'nombre' => $this->string(32)->notNull(),
            'estado' => $this->integer(),
            'id_categoria' => $this->integer(),
        ],'engine = InnoDB');

        $this->addForeignKey('id_categoria_fkey', 'subcategoria', 'id_subcategoria', 'categoria', 'id_categoria', 'CASCADE');

        $this->createTable('producto', [
            'id_producto' => $this->primaryKey(),
            'nombre' => $this->string(32)->notNull(),
            'estado' => $this->integer(),
            'id_subcategoria' => $this->integer(),
        ], 'engine = InnoDB');

        $this->addForeignKey('id_subcategoria_fkey', 'producto', 'id_subcategoria', 'subcategoria', 'id_subcategoria', 'CASCADE');
        }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {        
        $this->dropTable('producto');        
        $this->droptable('subcategoria');
        $this->droptable('categoria');       
    }
    
}
