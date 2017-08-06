<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-act-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'act_id')->textInput() ?>

    <?= $form->field($model, 'acm_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acm_time')->textInput() ?>

    <?= $form->field($model, 'acm_state')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
