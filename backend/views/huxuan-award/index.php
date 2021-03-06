<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanAwardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Huxuan Awards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-award-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Huxuan Starts'), ['/huxuan-starts/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Huxuan Summary'), ['/huxuan-summary/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'male_num',
            'female_num',
            'total_score',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
