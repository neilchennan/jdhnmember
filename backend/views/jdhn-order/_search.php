<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ord_id') ?>

    <?= $form->field($model, 'act_id') ?>

    <?= $form->field($model, 'enroll_id') ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'ord_payType') ?>

    <?php // echo $form->field($model, 'ord_time') ?>

    <?php // echo $form->field($model, 'ord_payTime') ?>

    <?php // echo $form->field($model, 'ord_refundTime') ?>

    <?php // echo $form->field($model, 'ord_state') ?>

    <?php // echo $form->field($model, 'ali_trade_no') ?>

    <?php // echo $form->field($model, 'ali_trade_status') ?>

    <?php // echo $form->field($model, 'ali_buyer_id') ?>

    <?php // echo $form->field($model, 'ali_buyer_email') ?>

    <?php // echo $form->field($model, 'ali_total_fee') ?>

    <?php // echo $form->field($model, 'ali_gmt_create') ?>

    <?php // echo $form->field($model, 'ali_gmt_payment') ?>

    <?php // echo $form->field($model, 'ali_refund_status') ?>

    <?php // echo $form->field($model, 'ali_gmt_refund') ?>

    <?php // echo $form->field($model, 'wechat_openid') ?>

    <?php // echo $form->field($model, 'wechat_total_fee') ?>

    <?php // echo $form->field($model, 'wechat_fee_type') ?>

    <?php // echo $form->field($model, 'wechat_bank_type') ?>

    <?php // echo $form->field($model, 'wechat_transaction_id') ?>

    <?php // echo $form->field($model, 'wechat_time_end') ?>

    <?php // echo $form->field($model, 'ord_fee') ?>

    <?php // echo $form->field($model, 'ord_detail') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
