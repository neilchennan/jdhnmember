<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActComment */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jdhn Act Comment',
]) . $model->acm_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Act Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->acm_id, 'url' => ['view', 'id' => $model->acm_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jdhn-act-comment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
