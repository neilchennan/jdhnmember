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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'nickname',
            'age',
            [
                //gender 格式化
                //'class' => 'yii\grid\DataColumn',
                'attribute' => 'gender',
                'value' => function($model){
                    return $model->gender == '1' ? Yii::t('common', 'Male'):Yii::t('common', 'Female');
                },
            ],
             'mobile',
             'id_card_num',
            [
                //created_at 格式化
                //'class' => 'yii\grid\DataColumn',
                'attribute' => 'created_at',
                'value' => function($model){
                    $dateStr = date("Y-m-d H:i:s",$model->created_at);
                    return $dateStr;
                },
            ],
            [
                //created_at 格式化
                //'class' => 'yii\grid\DataColumn',
                'attribute' => 'modified_at',
                'value' => function($model){
                    $dateStr = date("Y-m-d H:i:s",$model->modified_at);
                    return $dateStr;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
