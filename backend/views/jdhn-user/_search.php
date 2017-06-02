<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'u_pwd') ?>

    <?= $form->field($model, 'u_realName') ?>

    <?= $form->field($model, 'u_wechat3') ?>

    <?= $form->field($model, 'u_wechat2') ?>

    <?php // echo $form->field($model, 'u_nickName') ?>

    <?php // echo $form->field($model, 'u_portrait') ?>

    <?php // echo $form->field($model, 'u_mobile') ?>

    <?php // echo $form->field($model, 'u_regTime') ?>

    <?php // echo $form->field($model, 'u_gender') ?>

    <?php // echo $form->field($model, 'u_academic') ?>

    <?php // echo $form->field($model, 'u_school') ?>

    <?php // echo $form->field($model, 'u_city') ?>

    <?php // echo $form->field($model, 'u_state') ?>

    <?php // echo $form->field($model, 'u_birthday') ?>

    <?php // echo $form->field($model, 'u_salary') ?>

    <?php // echo $form->field($model, 'u_height') ?>

    <?php // echo $form->field($model, 'u_work') ?>

    <?php // echo $form->field($model, 'u_idCardNo') ?>

    <?php // echo $form->field($model, 'u_academicImg') ?>

    <?php // echo $form->field($model, 'u_idCardImg0') ?>

    <?php // echo $form->field($model, 'u_idCardImg1') ?>

    <?php // echo $form->field($model, 'u_workerImg') ?>

    <?php // echo $form->field($model, 'u_jpush') ?>

    <?php // echo $form->field($model, 'u_comment') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
