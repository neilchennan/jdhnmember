<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jdhn Order',
]) . $model->ord_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ord_id, 'url' => ['view', 'id' => $model->ord_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jdhn-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
