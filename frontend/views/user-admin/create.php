<?php

use yii\helpers\Html;
use frontend\models\AuthItem;
use frontend\models\AuthAssignment;

/* @var $this yii\web\View */
/* @var $model frontend\models\Producto */

$this->title = 'Create User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'create';
?>
<div class="User-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
   // $rolActualDb = AuthAssignment::find()->where(['user_id' => $model->id])->one();
    //$rolActual = $rolActualDb->itemName->name;

    $rolesDb = AuthItem::find()->all();
    $roles = [];
    foreach($rolesDb as $key=>$value)
    {
        if($value['type']==1)
        $roles[$key] = $value['name'];
    }

    ?>

    <?= $this->render('_form', [
        'model' => $model,
        'rolActual' => '',
        'roles' => $roles,
    ]) ?>

</div>