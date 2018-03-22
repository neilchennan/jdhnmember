<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */

$this->title = Yii::t('app', 'Update {modelClass} : ', [
        'modelClass' => Yii::t('app', 'Activity'),
    ]) . $model->activity_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="activity-update">
    <?= $this->render('_formMobile', [
        'model' => $model,
    ]) ?>

</div>