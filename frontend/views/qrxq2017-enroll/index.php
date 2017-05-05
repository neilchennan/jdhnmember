<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Qrxq2017EnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Qrxq2017 Enrolls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrxq2017-enroll-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Qrxq2017 Enroll'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=> '{summary}{items}<div class="text-right tooltip-demo">{pager}</div>',
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭自带分页
            'firstPageLabel'=>Yii::t('app', 'First'),
            'prevPageLabel'=>Yii::t('app', 'Prev'),
            'nextPageLabel'=>Yii::t('app', 'Next'),
            'lastPageLabel'=>Yii::t('app', 'Last'),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'applicant_role',
//            'name',
            'nickname',
            'gender',
            'birth_year',
            'school',
            'hometown',
            'highest_degree',
//            'company_major',
            'mobile',
//            'weixin_id',
            'created_at',
            'modified_at',
            ['class' => 'yii\grid\ActionColumn'],
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'header' => Yii::t('app', 'Action'),
//                'template' => '{view}{update}{password}{delete}',
////                'headerOptions' => ['width' => '128', 'class' => 'padding-left-5px',],
////                'contentOptions' => ['class' => 'padding-left-5px'],
//                'buttons' => [
//                    'password' => function ($url, $model, $key) {
//                        return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, [
//                            'title' => '修改密码',
//                            'data-method' => 'post',
//                            'data-pjax' => '0',
//                        ]);
//                    },
//                ],
//            ],
        ],
    ]); ?>
</div>
