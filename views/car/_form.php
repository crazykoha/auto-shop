<?php

use app\models\AutoModel;
use app\models\DriveUnit;
use app\models\EngineType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */

$models = ArrayHelper::map(AutoModel::find()->all(), 'id', function ($model){return $model->brand->name.' '.$model->name;})

?>

<div class="car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'auto_model_id')->dropDownList($models) ?>

    <?= $form->field($model, 'engine_type_id')->dropDownList(ArrayHelper::map(EngineType::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'drive_unit_id')->dropDownList(ArrayHelper::map(DriveUnit::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
