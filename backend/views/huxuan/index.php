<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Huxuans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Huxuan'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Export'), ['export'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'from_num',
            'to_num',
            'order',
            [
                'attribute' => 'gender',
                'value' => function ($model, $key, $index, $column) {
                    return JdhnCommonHelper::getGenderByIntValue($model->gender);
                },
                'filter' => JdhnCommonHelper::getGender_map(),
//                'headerOptions' => ['width' => 100],
            ],
            // 'score',
            // 'description',
            // 'created_at',
            // 'modified_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
