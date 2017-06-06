<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnEnrollmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-enrollment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'enroll_id') ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'enroll_name') ?>

    <?= $form->field($model, 'enroll_gender') ?>

    <?= $form->field($model, 'enroll_birthday') ?>

    <?php // echo $form->field($model, 'enroll_school') ?>

    <?php // echo $form->field($model, 'enroll_work') ?>

    <?php // echo $form->field($model, 'enroll_height') ?>

    <?php // echo $form->field($model, 'act_id') ?>

    <?php // echo $form->field($model, 'enroll_signupTime') ?>

    <?php // echo $form->field($model, 'enroll_state') ?>

    <?php // echo $form->field($model, 'enroll_custFormInfo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
