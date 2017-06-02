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

    <p>
        <?= Html::a(Yii::t('app', 'Create Jdhn Activity'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'act_id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
