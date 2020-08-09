<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = $model->autoModel->brand->name.' '.$model->autoModel->name;
$this->params['breadcrumbs'][] = ['label' => 'Автомобили', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
