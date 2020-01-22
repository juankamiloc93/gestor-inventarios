<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Subcategoria */
/* @var $form yii\widgets\ActiveForm */
Yii::trace('Categorias desde view');
Yii::trace($categorias);
?>

<div class="subcategoria-form">

    <?php $form = ActiveForm::begin(); ?>    

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?php $estados = ['Inactivo', 'Activo'];?>
    <?= $form->field($model, 'estado')->dropDownList($estados, ['prompt' => '']) ?>
    
    <?= $form->field($model, 'id_categoria')->dropDownList($categorias, ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
