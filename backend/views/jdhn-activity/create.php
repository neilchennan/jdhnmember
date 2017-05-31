<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JdhnActivity */

$this->title = Yii::t('app', 'Create Jdhn Activity');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
