<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <label>Password</label>
    <input type="password" class="form-control" name="User[password]" >
    <br>

    <label>Rol</label>
    <?php echo Html::dropDownList('User[rol]',$rolActual, $roles,['prompt'=>'','class'=>'form-control m-input','id'=>'user-perfil']); ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>