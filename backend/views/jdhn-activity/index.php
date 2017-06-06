<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnActivitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jdhn Activities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-activity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="btn-group">
        <a class="btn btn-app disabled" href="create">
            <i class="fa fa-plus"></i> <? echo Yii::t('app', 'Create')?>
        </a>
        <a class="btn btn-app">
            <i class="fa fa-edit"></i> <? echo Yii::t('app', 'Edit')?>
        </a>
        <a id="deleteBtn" class="btn btn-app" onclick="on_deleteBtnClicked()">
            <i class="fa fa-minus"></i> <? echo Yii::t('app', 'Delete')?>
        </a>
    </div>

    <script type="text/javascript">
        function on_deleteBtnClicked(){
//            alert('on_deleteBtnClicked');
            var keys = $("#jdhnActivityGrid").yiiGridView("getSelectedRows");
            var str = '您选择了' + keys.length + '条数据，但是删除是不允许的哦！';
            alert(str);
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
        "options" => [
            // ...其他设置项
            "id" => "jdhnActivityGrid",
        ],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                "class" => "yii\grid\CheckboxColumn",
                "name" => "checkbox_id",
            ],
            [
                'attribute' => 'act_id',
                'label' => Yii::t('app', 'Number'),
                'headerOptions' => ['width' => '30'],
            ],
//            'act_id',
            'act_title',
//            'act_detail',
//            'act_richText:ntext',
//            'act_richText_html:ntext',
//             'act_city',
            [
                'attribute' => 'act_city',
                'value' => 'city_keyword.kw_desc',
                'label' => Yii::t('app', 'Act City'),
                'filter' => JdhnCommonHelper::getCityKeyword_map(),
            ],
            // 'act_address',
            // 'act_p_uLimit',
            // 'act_p_dLimit',
             'act_beginTime',
            // 'act_endTime',
             'act_createTime',
            // 'act_type',
            [
                'attribute' => 'act_state',
                'value' => 'state_keyword.kw_desc',
                'label' => Yii::t('app', 'Act State'),
                'filter' => JdhnCommonHelper::getActState_map(),
                'headerOptions' => ['width' => '80'],
            ],
            // 'act_price',
            // 'act_fee',
            // 'act_thumb',
            // 'act_photos',
            // 'act_signBeginTime',
            // 'act_signEndTime',
            // 'act_readCount',
            // 'act_mbPrice',
            // 'act_customForm:ntext',
            // 'act_title_idx',
            // 'act_richText_idx:ntext',
            // 'act_address_idx',
            // 'act_notice:ntext',
            [
                'format' => 'raw',
                'value' => function ($data) {
                    $length = count($data->jdhnEnrollments);
                    $act_id = $data->act_id;
                    $act_title = $data->act_title;
                    $hrefUrl = "/jdhn-enrollment/index?JdhnEnrollmentSearch%5Bact_id%5D={$act_id}&JdhnEnrollmentSearch%5Bactivity_title%5D={$act_title}";
                    return "<a href={$hrefUrl}>{$length}</a>";
                },
                'label' => Yii::t('app', 'Enroll Number'),
                'headerOptions' => ['width' => '80'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
