<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;
use yii\jui\AutoComplete;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $activities array */
///* @var $acvitiyTitles array */

$this->title = Yii::t('app', 'Jdhn Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><? echo Yii::t('app', 'Query Conditions')?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="activityName" class="col-sm-2 control-label"><? echo Yii::t('app', 'Activity Name')?></label>
                    <div class="col-sm-10">
                        <?
                        echo Select2::widget([
                            'name' => 'JdhnOrderSearch[act_id]',
                            'model' => $searchModel,
                            'attribute' => 'act_id',
                            'data' => $activities,
                            'options' => [
                                'id' => 'actLikeInput',
                                'class' => 'form-control',
                                'placeholder' => Yii::t('app', 'Activity Name...'),
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button id="clearBtn" class="btn btn-default" onclick="on_clearBtnClicked()"><i class="fa fa-eraser"></i></button>
                <button id="searchBtn" class="btn btn-default pull-right" onclick="on_searchBtnClicked()"><i class="fa fa-search"></i></button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>

    <script type="text/javascript">
        function on_searchBtnClicked() {
            var queryParams = window.location.href;

//            如果没有查询参数，要在第一个参数前加?号
            var searchParams = window.location.search;
            if (searchParams == null || searchParams == '') {
                queryParams += "?";
            }

            var actLikeVal = $('#actLikeInput').val();
            var actLikeParam = "&JdhnOrderSearch%5Bact_id%5D=" + actLikeVal;
            queryParams += actLikeParam;
            window.location.href = queryParams;
        }

        function on_clearBtnClicked(){
            $('#actLikeInput').val('');
        }
    </script>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            //'options'=>['class'=>'hidden']//关闭自带分页
            'firstPageLabel' => Yii::t('app', 'First'),
            'prevPageLabel' => Yii::t('app', 'Prev'),
            'nextPageLabel' => Yii::t('app', 'Next'),
            'lastPageLabel' => Yii::t('app', 'Last'),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ord_id',
//            [
//                'attribute' => 'act_id',
//                'value' => 'jdhnActivity.act_title',
//                'filter' => Select2::widget([
//                    'name' => 'JdhnOrderSearch[act_id]',
//                    'value' => $searchModel->act_id,
//                    'data' => $activities,
//                    'options' => [
//                        'placeholder' => Yii::t('app', 'Activity Name...')
//                    ],
//                    'pluginOptions' => [
//                        'allowClear' => true,
//                    ],
//                ]),
//                'label' => Yii::t('app', 'Activity Name'),
//            ],
            'enroll_id',
            [
                'format' => 'raw',
                'attribute' => 'u_nickName',
                'value' => function ($data) {
                    $user = $data->u;
                    $userId = $user->u_id;
                    $userNickName = $user->u_nickName;
                    $hrefUrl = "/jdhn-user/view?id={$userId}/";
                    return "<a href={$hrefUrl}>{$userNickName}</a>";
                },
                'label' => Yii::t('app', 'U Nickname'),
//                'filter' => JdhnCommonHelper::getAppOrderPayType_map(),
//                'headerOptions' => ['width' => '80'],
            ],
             'ord_fee',
            [
                'attribute' => 'ord_payType',
                'value' => 'ordPayType.kw_desc',
//                'label' => Yii::t('app', 'Act State'),
                'filter' => JdhnCommonHelper::getAppOrderPayType_map(),
//                'headerOptions' => ['width' => '80'],
            ],
             'ord_time',
             'ord_payTime',
//             'ord_refundTime',
            [
                'attribute' => 'ord_state',
                'value' => 'ordState.kw_desc',
//                'label' => Yii::t('app', 'Act State'),
                'filter' => JdhnCommonHelper::getAppOrderState_map(),
//                'headerOptions' => ['width' => '80'],
            ],
//             'ali_trade_no',
//             'ali_trade_status',
//             'ali_buyer_id',
//             'ali_buyer_email:email',
             'ali_total_fee',
            // 'ali_gmt_create',
            // 'ali_gmt_payment',
            // 'ali_refund_status',
            // 'ali_gmt_refund',
            // 'wechat_openid',
             'wechat_total_fee',
            // 'wechat_fee_type',
            // 'wechat_bank_type',
            // 'wechat_transaction_id',
            // 'wechat_time_end',
            // 'ord_detail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
