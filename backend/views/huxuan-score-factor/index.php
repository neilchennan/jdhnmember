<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanScoreFactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Huxuan Score Factors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-score-factor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Huxuan Score Factor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'gender',
                'value' => function ($model, $key, $index, $column) {
                    return $model->gender == 1 ? Yii::t('app', 'Male') : Yii::t('app', 'Female');
                },
                //在搜索条件（过滤条件）中使用下拉框来搜索
                'filter' => [ 1 => Yii::t('app', 'Male'), 2 => Yii::t('app', 'Female')],
            ],
//            'gender',
            'order',
            'factor',
            'description',
            [
//                'label'=> Yii::t('app', 'Created At'),
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'attribute' => 'created_at'
            ],
            [
//                'label'=> Yii::t('app', 'Modified At'),
                'format' => ['date', 'php:Y-m-d H:i:s'],
                'attribute' => 'modified_at'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
