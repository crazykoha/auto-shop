<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автомобили';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить автомобиль', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img($model->photo, ['height' => '200px']);
                },
            ],
            [
                'attribute' => 'auto_model_id',
                'label' => 'Модель',
                'value' => function($model) {
                    return $model->autoModel->brand->name.' '.$model->autoModel->name;
                }
            ],
            [
                'attribute' => 'engineType.name',
                'label' => "Тип двигателя"
            ],
            [
                'attribute' => 'driveUnit.name',
                'label' => "Привод"
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
