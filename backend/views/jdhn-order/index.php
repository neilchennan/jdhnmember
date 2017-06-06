<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jdhn Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jdhn Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ord_id',
            'act_id',
            'enroll_id',
            'u_id',
            'ord_payType',
            // 'ord_time',
            // 'ord_payTime',
            // 'ord_refundTime',
            // 'ord_state',
            // 'ali_trade_no',
            // 'ali_trade_status',
            // 'ali_buyer_id',
            // 'ali_buyer_email:email',
            // 'ali_total_fee',
            // 'ali_gmt_create',
            // 'ali_gmt_payment',
            // 'ali_refund_status',
            // 'ali_gmt_refund',
            // 'wechat_openid',
            // 'wechat_total_fee',
            // 'wechat_fee_type',
            // 'wechat_bank_type',
            // 'wechat_transaction_id',
            // 'wechat_time_end',
            // 'ord_fee',
            // 'ord_detail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
