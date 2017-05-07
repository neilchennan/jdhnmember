<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HuxuanScoreFactor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="huxuan-score-factor-form">
    <p>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(['1'=> Yii::t('app', 'Male'),'2'=>Yii::t('app', 'Female')]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'factor')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
