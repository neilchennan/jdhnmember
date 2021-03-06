<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HuxuanSummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="huxuan-summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'male_num') ?>

    <?= $form->field($model, 'male_order') ?>

    <?= $form->field($model, 'female_num') ?>

    <?= $form->field($model, 'female_order') ?>

    <?php // echo $form->field($model, 'male_score') ?>

    <?php // echo $form->field($model, 'female_score') ?>

    <?php // echo $form->field($model, 'total_score') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
