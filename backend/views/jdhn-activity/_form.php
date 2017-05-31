<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'act_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_richText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_richText_html')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_city')->textInput() ?>

    <?= $form->field($model, 'act_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_p_uLimit')->textInput() ?>

    <?= $form->field($model, 'act_p_dLimit')->textInput() ?>

    <?= $form->field($model, 'act_beginTime')->textInput() ?>

    <?= $form->field($model, 'act_endTime')->textInput() ?>

    <?= $form->field($model, 'act_createTime')->textInput() ?>

    <?= $form->field($model, 'act_type')->textInput() ?>

    <?= $form->field($model, 'act_state')->textInput() ?>

    <?= $form->field($model, 'act_price')->textInput() ?>

    <?= $form->field($model, 'act_fee')->textInput() ?>

    <?= $form->field($model, 'act_thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_photos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_signBeginTime')->textInput() ?>

    <?= $form->field($model, 'act_signEndTime')->textInput() ?>

    <?= $form->field($model, 'act_readCount')->textInput() ?>

    <?= $form->field($model, 'act_mbPrice')->textInput() ?>

    <?= $form->field($model, 'act_customForm')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_title_idx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_richText_idx')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_address_idx')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_notice')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
