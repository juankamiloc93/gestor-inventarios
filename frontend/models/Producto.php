<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id_producto
 * @property string $nombre
 * @property int|null $estado
 * @property int|null $id_subcategoria
 *
 * @property Subcategoria $subcategoria
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['estado', 'id_subcategoria'], 'integer'],
            [['nombre'], 'string', 'max' => 32],
            [['id_subcategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategoria::className(), 'targetAttribute' => ['id_subcategoria' => 'id_subcategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'id_subcategoria' => 'Id Subcategoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategoria()
    {
        return $this->hasOne(Subcategoria::className(), ['id_subcategoria' => 'id_subcategoria']);
    }
}
