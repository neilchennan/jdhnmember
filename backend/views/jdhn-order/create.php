<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */
/* @var $modelClass string */

$this->title = Yii::t('app', 'Create {modelClass}', [
        'modelClass' => $modelClass,
    ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
