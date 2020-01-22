<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SubcategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subcategorias';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="subcategoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subcategoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],           
            'nombre',           
            [
                'label' => 'Categoria',
                'value' => function($model, $index)
                    {
                        return $model['categoria']['nombre'];                        
                    }
            ],  
            [
                'label' => 'Estado',
                'value' => function($model)
                    {
                        return ($model->estado==1)? 'Activo':'Inactivo';
                    }
            ],  
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
