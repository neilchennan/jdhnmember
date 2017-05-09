<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = Yii::t('app', 'Create Enroll');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'activities' => $activities,
    ]) ?>

</div>
