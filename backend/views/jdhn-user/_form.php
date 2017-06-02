<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_pwd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_realName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_wechat3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_wechat2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_nickName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_portrait')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_regTime')->textInput() ?>

    <?= $form->field($model, 'u_gender')->textInput() ?>

    <?= $form->field($model, 'u_academic')->textInput() ?>

    <?= $form->field($model, 'u_school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_state')->textInput() ?>

    <?= $form->field($model, 'u_birthday')->textInput() ?>

    <?= $form->field($model, 'u_salary')->textInput() ?>

    <?= $form->field($model, 'u_height')->textInput() ?>

    <?= $form->field($model, 'u_work')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_idCardNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_academicImg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_idCardImg0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_idCardImg1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_workerImg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_jpush')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'u_comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
