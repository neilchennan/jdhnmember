<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity_name')->textInput([
        'class' => 'required',
    ]) ?>
    <?= $form->field($model, 'activity_description')->textarea() ?>

    <?= $form->field($model, 'is_default')->dropDownList(['2'=>Yii::t('app', 'No'), '1'=> Yii::t('app', 'Yes')],
        [
            'data-role' => 'slider',
            'data-mini' => true,
        ])
    ?>

    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>