<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnOrder */
/* @var $title string */

$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-order-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ord_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ord_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ord_id',
            [
                'attribute' => 'jdhnActivity',
                'value'=> $model->jdhnActivity->act_title,
            ],
            'enroll_id',
            [
                'format' => 'raw',
                'attribute' => 'u',
                'value' => function ($model) {
                    $user = $model->u;
                    $userId = $user->u_id;
                    $userNickName = $user->u_nickName;
                    $hrefUrl = "/jdhn-user/view?id={$userId}/";
                    return "<a href={$hrefUrl}>{$userNickName}</a>";
                },
            ],
            [
                'attribute' => 'ord_payType',
                'value'=> $model->ordPayType->kw_desc,
            ],
            'ord_time',
            'ord_payTime',
            'ord_refundTime',
            [
                'attribute' => 'ord_state',
                'value'=> $model->ordState->kw_desc,
            ],
            'ali_trade_no',
            'ali_trade_status',
            'ali_buyer_id',
            'ali_buyer_email:email',
            'ali_total_fee',
            'ali_gmt_create',
            'ali_gmt_payment',
            'ali_refund_status',
            'ali_gmt_refund',
            'wechat_openid',
            'wechat_total_fee',
            'wechat_fee_type',
            'wechat_bank_type',
            'wechat_transaction_id',
            'wechat_time_end',
            'ord_fee',
            'ord_detail',
        ],
    ]) ?>

</div>
