<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanStartsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Huxuan Starts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-starts-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Execute Huxuan Starts'), ['execute'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Huxuan Awards'), ['/huxuan-award/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Huxuan Summary'), ['/huxuan-summary/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'num',
            [
                'attribute' => 'gender',
                'value' => function ($model, $key, $index, $column) {
                    return JdhnCommonHelper::getGenderByIntValue($model->gender);
                },
                'filter' => JdhnCommonHelper::getGender_map(),
//                'headerOptions' => ['width' => 100],
            ],
            'times',
            'score',
            // 'rank',
            // 'description',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
