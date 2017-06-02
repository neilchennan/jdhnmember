<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jdhn Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jdhn User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭自带分页
            'firstPageLabel'=>Yii::t('app', 'First'),
            'prevPageLabel'=>Yii::t('app', 'Prev'),
            'nextPageLabel'=>Yii::t('app', 'Next'),
            'lastPageLabel'=>Yii::t('app', 'Last'),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'u_id',
//            'u_pwd',
//            'u_realName',
//            'u_wechat3',
//            'u_wechat2',
             'u_nickName',
            // 'u_portrait',
             'u_mobile',
             'u_regTime',
            [
                'attribute' => 'u_gender',
                'value' => 'u_gender_keyword.kw_desc',
                'filter' => JdhnCommonHelper::getUGender_map(),
            ],
            [
                'attribute' => 'u_academic',
                'value' => 'u_academic_keyword.kw_desc',
                'filter' => JdhnCommonHelper::getUAcademic_map(),
            ],
            // 'u_school',
             'u_city',
            [
                'attribute' => 'u_state',
//                'value' => 'u_state_keyword.kw_desc',
                'value' => function($model){
                    return JdhnCommonHelper::getUStateStr($model->u_state);
                },
                'filter' => JdhnCommonHelper::getUState_map(),
            ],
            // 'u_birthday',
            // 'u_salary',
            // 'u_height',
            // 'u_work',
            // 'u_idCardNo',
            // 'u_academicImg',
            // 'u_idCardImg0',
            // 'u_idCardImg1',
            // 'u_workerImg',
            // 'u_jpush',
            // 'u_comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
