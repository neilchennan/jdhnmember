<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnKeyword */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-keyword-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kw_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kw_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kw_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
