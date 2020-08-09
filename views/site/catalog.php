<?php

use app\models\CarSearch;
use yii\data\ActiveDataProvider;
use yii\widgets\LinkPager;

/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel CarSearch */
?>
<?php
/** @var \app\models\Car $car */
foreach ($dataProvider->getModels() as $car):?>
    <div class="product">
        <h3 class="product__title"><?=$car->autoModel->brand->name.' '.$car->autoModel->name?></h3>
        <div class="img-container">
            <img class="product__img" src="<?=$car->photo?>"/>
        </div>
        <p class="product__description">Привод: <?=$car->driveUnit->name?><br/>Двигатель: <?=$car->engineType->name?></p>
    </div>
<?php endforeach;?>
<?= LinkPager::widget([
    'pagination' => $dataProvider->getPagination(),
]);?>