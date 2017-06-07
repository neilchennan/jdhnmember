<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helper\JdhnCommonHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */
/* @var $form yii\widgets\ActiveForm */
/* @var $activities array */
/* @var $ordPayTypes array */
/* @var $ordStates array */
?>

<div class="jdhn-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ord_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_id')->widget(Select2::classname(), [
        'data' => $activities,
        'options' => ['placeholder' => Yii::t('app', 'Activity Name...')],
    ])?>

    <?= $form->field($model, 'enroll_id')->textInput() ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'ord_payType')->dropDownList($ordPayTypes) ?>

    <?= $form->field($model, 'ord_time')->textInput() ?>

    <?= $form->field($model, 'ord_payTime')->textInput() ?>

    <?= $form->field($model, 'ord_refundTime')->textInput() ?>

    <?= $form->field($model, 'ord_state')->dropDownList($ordStates) ?>

    <?= $form->field($model, 'ali_trade_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali_trade_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali_buyer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali_buyer_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali_total_fee')->textInput() ?>

    <?= $form->field($model, 'ali_gmt_create')->textInput() ?>

    <?= $form->field($model, 'ali_gmt_payment')->textInput() ?>

    <?= $form->field($model, 'ali_refund_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ali_gmt_refund')->textInput() ?>

    <?= $form->field($model, 'wechat_openid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat_total_fee')->textInput() ?>

    <?= $form->field($model, 'wechat_fee_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat_bank_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat_transaction_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wechat_time_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ord_fee')->textInput() ?>

    <?= $form->field($model, 'ord_detail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
