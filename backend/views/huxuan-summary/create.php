<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HuxuanSummary */

$this->title = Yii::t('app', 'Create Huxuan Summary');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuan Summaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-summary-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
