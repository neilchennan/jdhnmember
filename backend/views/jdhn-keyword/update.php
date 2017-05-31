<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnKeyword */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jdhn Keyword',
]) . $model->kw_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Keywords'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kw_id, 'url' => ['view', 'id' => $model->kw_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jdhn-keyword-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
