<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Subcategoria */

$this->title = 'Update Subcategoria: ' . $model->id_subcategoria;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subcategoria, 'url' => ['view', 'id' => $model->id_subcategoria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'estados' => $estados,
        'categorias' => $categorias
    ]) ?>

</div>
