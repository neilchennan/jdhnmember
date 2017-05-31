<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = Yii::t('app', 'Create Enroll');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-create">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><? echo Yii::t('app', 'Please fill related information:')?></h3>
        </div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
                'activities' => $activities,
            ]) ?>
        </div>
</div>
