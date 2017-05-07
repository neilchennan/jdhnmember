<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HuxuanSummary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="huxuan-summary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'male_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'female_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'male_score')->textInput() ?>

    <?= $form->field($model, 'female_score')->textInput() ?>

    <?= $form->field($model, 'total_score')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
