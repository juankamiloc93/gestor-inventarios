<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "subcategoria".
 *
 * @property int $id_subcategoria
 * @property string $nombre
 * @property int|null $estado
 * @property int|null $id_categoria
 *
 * @property Producto[] $productos
 * @property Categoria $subcategoria
 */
class Subcategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado', 'id_categoria'], 'integer'],
            [['nombre'], 'string', 'max' => 32],
            [['id_subcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_subcategoria' => 'id_categoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subcategoria' => 'Id Subcategoria',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'id_categoria' => 'Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id_subcategoria' => 'id_subcategoria']);
    }

    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */   
}
