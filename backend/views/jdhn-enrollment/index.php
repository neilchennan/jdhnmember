<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;
use yii\jui\AutoComplete;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnEnrollmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $acvitiyTitles array */
/* @var $actionModel \common\models\JdhnEnrollmentActionForm */

$this->title = Yii::t('app', 'Jdhn Enrollments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-enrollment-index" xmlns="http://www.w3.org/1999/html">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <div class="input-group">-->
<!--        --><?php
//        echo AutoComplete::widget([
//            'model' => $searchModel,
//            'attribute' => 'activity_title',
//            'clientOptions' => [
//                'source' => $acvitiyTitles,
//            ],
//            'options' => [
//                'id' => 'actLikeInput',
//                'class' => 'form-control',
//                'placeholder' => Yii::t('app', 'Activity Name...'),
//            ],
//        ]);
//        ?>
<!--        <span class="input-group-btn">-->
<!--            <button id="actLikeBtn" type="submit" class="btn btn-default btn-flat" onclick="on_actLikeBtnClicked()">-->
<!--                <i class="fa fa-search"></i>-->
<!--            </button>-->
<!--        </span>-->
<!--    </div>-->

    <?php Pjax::begin(['id' => 'jdhn_enrollments']) ?>
    <div class="box box-info" id="query_info_div">
        <div class="box-header with-border">
            <h3 class="box-title"><? echo Yii::t('app', 'Query Conditions')?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="box-body">
                <div class="form-group">
                    <label for="activityName" class="col-sm-1 control-label"><? echo Yii::t('app', 'Activity Name')?></label>
                    <div class="col-sm-11">
                        <?php
                        echo Select2::widget([
                            'name' => 'JdhnEnrollmentSearch[act_id]',
                            'model' => $searchModel,
                            'attribute' => 'act_id',
                            'data' => $activities,
                            'options' => [
                                'id' => 'actLikeInput',
                                'class' => 'form-control',
                                'placeholder' => Yii::t('app', 'Please Select...'),
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

    <div class="btn-group">
<!--        <a class="btn btn-app" data-toggle="modal" data-target="#myModal" id="approve_btn" onclick="on_approve_btn_clicked()">-->
        <a class="btn btn-app" data-toggle="modal" id="approve_btn" onclick="on_approve_btn_clicked()">
            <i class="fa fa-check"></i> <? echo Yii::t('app', 'Check Approve')?>
        </a>
        <a class="btn btn-app" id="deny_btn" onclick="on_deny_btn_clicked()">
            <i class="fa fa-times"></i> <? echo Yii::t('app', 'Check Fail')?>
        </a>
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
            var actLikeParam = "&JdhnEnrollmentSearch%5Bact_id%5D=" + actLikeVal;
            queryParams += actLikeParam;
            window.location.href = queryParams;
        }

        function on_clearBtnClicked(){
            $('#actLikeInput').val('');
        }

        function on_deny_btn_clicked(){
            $keys = $('#jdhnEnrollmentsGrid').yiiGridView('getSelectedRows');
            if ($keys.length == 0){
                WarningDlg.alert('您没有选择任何项噢！');
                return;
            }

            $arr4deny = [];
            $keys.forEach(function(value, index,arr){
                $arr4deny.push(value);
            });
            $arr4denyStr = $arr4deny.join(',');

            $postData = 'JdhnEnrollmentActionForm[ids4Deny]=' + $arr4denyStr;

            krajeeDialog.confirm("您确定要审核失败这些项吗?", function (result) {
                if (result) {
                    $.ajax({
                        type: 'post',
                        url: 'json-deny',
                        data: $postData,
                        success: function(data){
                            var result = JSON.parse(data);
                            if (result.code == 200){
                                SuccessDlg.alert(result.message);
                                $.pjax.reload({container:"#jdhn_enrollments"});
                            }
                            else {
                                ErrorDlg.alert(result.message);
                            }
                        },
                    });
                } else {
                    return;
                }
            });
        }

        function on_approve_btn_clicked(){
            $keys = $('#jdhnEnrollmentsGrid').yiiGridView('getSelectedRows');
            if ($keys.length == 0){
                WarningDlg.alert('您没有选择任何项噢！');
                return;
            }

            $arr4approve = [];
            $keys.forEach(function(value, index,arr){
                $arr4approve.push(value);
            });
            $arr4approveStr = $arr4approve.join(',');

            $postData = 'JdhnEnrollmentActionForm[ids4Approve]=' + $arr4approveStr;

            krajeeDialog.confirm("您确定要审核通过这些项吗?", function (result) {
                if (result) {
                    $.ajax({
                        type: 'post',
                        url: 'json-approve',
                        data: $postData,
                        success: function(data){
                            var result = JSON.parse(data);
                            if (result.code == 200){
                                SuccessDlg.alert(result.message);
                                $.pjax.reload({container:"#jdhn_enrollments"});
                            }
                            else {
                                ErrorDlg.alert(result.message);
                            }
                        },
                    });
                } else {
                    return;
                }
            });
        }

        function on_deleteBtnClicked(){
            $keys = $('#jdhnEnrollmentsGrid').yiiGridView('getSelectedRows');
            if ($keys.length == 0){
                WarningDlg.alert('您没有选择任何项噢！');
                return;
            }

            $arr4approve = [];
            $keys.forEach(function(value, index,arr){
                $arr4approve.push(value);
            });
            $arr4approveStr = $arr4approve.join(',');

            $postData = 'JdhnEnrollmentActionForm[ids4Approve]=' + $arr4approveStr;

            krajeeDialog.confirm("您确定要删除这些项吗?", function (result) {
                if (result) {
                    $.ajax({
                        type: 'post',
                        url: 'json-delete',
                        data: $postData,
                        success: function(data){
                            var result = JSON.parse(data);
                            if (result.code == 200){
                                SuccessDlg.alert(result.message);
                                $.pjax.reload({container:"#jdhn_enrollments"});
                            }
                            else {
                                ErrorDlg.alert(result.message);
                            }
                        },
                    });
                } else {
                    return;
                }
            });
        }
    </script>


    <?= GridView::widget([
        'id' => 'jdhnEnrollmentsGrid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            //'options'=>['class'=>'hidden']//关闭自带分页
            'firstPageLabel' => Yii::t('app', 'First'),
            'prevPageLabel' => Yii::t('app', 'Prev'),
            'nextPageLabel' => Yii::t('app', 'Next'),
            'lastPageLabel' => Yii::t('app', 'Last'),
        ],
        //默认layout的表格三部分可不写：几条简介，表格，分页；可以去掉任意部分
        //'layout' => "{summary}\n{items}\n{pager}" ,
        //没有数据时候显示的内容和html样式
        'emptyText' => Yii::t('app', 'No Record founded'),
        'emptyTextOptions' => ['style' => 'color:grey;font-weight:bold'],
        //显示底部（就是多了一栏），默认是关闭的
//        'showFooter'=>true,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'enroll_id',
//            'u_id',
//            'enroll_name',
            [
                'format' => 'raw',
                'attribute' => 'enroll_name',
                'value' => function ($data) {
                    $user = $data->u;
                    $userId = $user->u_id;
                    $userNickName = $user->u_nickName;
                    $hrefUrl = "/jdhn-user/view?id={$userId}/";
                    return "<a href={$hrefUrl}>{$userNickName}</a>";
                },
            ],
            [
                'attribute' => 'enroll_gender',
                'value' => 'enrollGender.kw_desc',
                'label' => Yii::t('app', 'Gender'),
                'filter' => JdhnCommonHelper::getUGender_map(),
            ],
            [
                'attribute' => 'enroll_birthday',
                'label' => Yii::t('app', 'Birthday'),
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'attribute' => 'enroll_school',
                'label' => Yii::t('app', 'School'),
            ],
            [
                'attribute' => 'enroll_work',
                'label' => Yii::t('app', 'Work'),
            ],
            [
                'attribute' => 'enroll_height',
                'label' => Yii::t('app', 'Height'),
            ],
            'enroll_signupTime',
            // 'enroll_custFormInfo',
            [
                'attribute' => 'enroll_state',
                'value' => 'enrollState.kw_desc',
                'filter' => JdhnCommonHelper::getAppEnrollState_map(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end() ?>
</div>
