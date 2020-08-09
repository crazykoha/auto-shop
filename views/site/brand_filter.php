<?php

use app\models\AutoModel;
use app\models\CarSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $searchModel CarSearch */
/* @var $models AutoModel[] */

?>
<p class="filter__left_header">Модель</p>
<?=Html::activeCheckboxList(
    $searchModel,
    'autoModelIds',
    ArrayHelper::map($models, 'id', 'name'),
    [
        'class' => 'filter__left__block'
    ]
)?>