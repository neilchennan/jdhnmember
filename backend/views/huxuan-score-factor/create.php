<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HuxuanScoreFactor */

$this->title = Yii::t('app', 'Create Huxuan Score Factor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuan Score Factors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-score-factor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
