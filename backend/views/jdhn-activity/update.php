<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActivity */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jdhn Activity',
]) . $model->act_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->act_id, 'url' => ['view', 'id' => $model->act_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jdhn-activity-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
