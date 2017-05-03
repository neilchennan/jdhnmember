<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Qrxq2017Enroll */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Qrxq2017 Enroll',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrxq2017 Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="qrxq2017-enroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
