<?php


use app\models\AutoModel;
use app\models\Brand;
use app\models\CarSearch;
use app\models\DriveUnit;
use app\models\EngineType;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel CarSearch */

$this->title = "Продажа автомобилей".($searchModel->currentBrand?(' '.$searchModel->currentBrand->name):'').($searchModel->currentModel?' '.$searchModel->currentModel->name:'')." в Санкт-Петербурге";
?>
<div class="d-flex">
    <div class="filter__left">
        <p class="filter__left_header">Марка</p>
        <?=Html::activeCheckboxList(
            $searchModel,
            'brandIds',
            ArrayHelper::map(Brand::find()->all(), 'id', 'name'),
            [
                'class' => 'filter__left__block'
            ]
        )?>
        <div id="model__filter">
            <?php if ($searchModel->brandIds): ?>
                <p class="filter__left_header">Модель</p>
                <?=Html::activeCheckboxList(
                    $searchModel,
                    'autoModelIds',
                    ArrayHelper::map(AutoModel::findAll(['brand_id'=>$searchModel->brandIds]), 'id', 'name'),
                    [
                        'class' => 'filter__left__block'
                    ]
                )?>
            <?php endif ?>
        </div>
        <p class="filter__left_header">Тип двигателя</p>
        <?=Html::activeCheckboxList(
            $searchModel,
            'engineTypeIds',
            ArrayHelper::map(EngineType::find()->all(), 'id', 'name'),
            [
                'class' => 'filter__left__block'
            ]
        )?>
        <p class="filter__left_header">Привод</p>
        <?=Html::activeCheckboxList(
            $searchModel,
            'driveUnitIds',
            ArrayHelper::map(DriveUnit::find()->all(), 'id', 'name'),
            [
                'class' => 'filter__left__block'
            ]
        )?>
        <?=Html::button("Отфильтровать", ['id'=>'filter'])?>
    </div>
    <div class="site-index products-container">
        <h1><?=$this->title?></h1>
        <div class="products">
            <?=$this->render('catalog', ['dataProvider'=>$dataProvider, 'searchModel'=>$searchModel])?>
        </div>
    </div>
</div>
