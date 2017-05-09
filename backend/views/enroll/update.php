<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Enroll',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="enroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'activities' => $activities,
    ]) ?>

</div>
