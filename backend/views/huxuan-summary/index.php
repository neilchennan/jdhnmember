<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanSummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Huxuan Summaries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-summary-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Execute Huxuan Summary Now'), ['execute'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Huxuan Awards'), ['/huxuan-award/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Huxuan Starts'), ['/huxuan-starts/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'male_num',
//            'male_order',
//            'male_score',
            'female_num',
//            'female_order',
//            'female_score',
             'total_score',
            // 'description',
            // 'created_at',
            // 'modified_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
