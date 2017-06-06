<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ord_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'act_id')->textInput() ?>

    <?= $form->field($model, 'enroll_id')->textInput() ?>

    <?= $form->field($model, 'u_id')->textInput() ?>

    <?= $form->field($model, 'ord_payType')->textInput() ?>

    <?= $form->field($model, 'ord_time')->textInput() ?>

    <?= $form->field($model, 'ord_payTime')->textInput() ?>

    <?= $form->field($model, 'ord_refundTime')->textInput() ?>

    <?= $form->field($model, 'ord_state')->textInput() ?>

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
