<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */
/* @var $modelClass string */
/* @var $activities array */
/* @var $ordPayTypes array */
/* @var $ordStates array */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => $modelClass,
]) . $model->ord_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ord_id, 'url' => ['view', 'id' => $model->ord_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jdhn-order-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'activities' => $activities,
        'ordPayTypes' => $ordPayTypes,
        'ordStates' => $ordStates,
    ]) ?>

</div>
