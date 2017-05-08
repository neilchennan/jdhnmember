<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'activity_name')->textInput() ?>

    <?= $form->field($model, 'activity_description')->textarea() ?>

<!--    --><?//= $form->field($model, 'start_time')->textInput() ?>
    <?= $form->field($model, 'start_time')->widget(DateTimePicker::classname(), [
        'convertFormat' => true,
        'options' => ['placeholder' => 'Select start time ...'],
//        'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
//            'format' => 'php:Y-m-d H:i:s',
        ]
    ]); ?>

    <?= $form->field($model, 'end_time')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Select end time ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
//            'format' => 'yyyy-mm-dd hh:ii:ss',
        ]
    ]); ?>

    <?= $form->field($model, 'is_default')->dropDownList(['1'=> Yii::t('app', 'Yes'),'2'=>Yii::t('app', 'No')]) ?>

    <?= $form->field($model, 'activity_address')->textarea() ?>

    <?= $form->field($model, 'activity_traffic')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
