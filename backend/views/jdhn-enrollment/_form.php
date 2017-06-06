<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnEnrollment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-enrollment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'enroll_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enroll_gender')->textInput() ?>

    <?= $form->field($model, 'enroll_birthday')->textInput() ?>

    <?= $form->field($model, 'enroll_school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enroll_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enroll_height')->textInput() ?>

    <?= $form->field($model, 'act_id')->textInput() ?>

    <?= $form->field($model, 'enroll_signupTime')->textInput() ?>

    <?= $form->field($model, 'enroll_state')->textInput() ?>

    <?= $form->field($model, 'enroll_custFormInfo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
