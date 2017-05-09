<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Enrolls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Enroll'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'activity_id',
            [
                'attribute' => 'activity_name',
                'value' => 'activity.activity_name',
                'label' => Yii::t('app', 'Activity Name'),
            ],
            'applicant_role',
            'nickname',
            'birth_year',
            // 'gender',
            [
                'attribute' => 'gender',
                'value' => function ($model, $key, $index, $column) {
                    return JdhnCommonHelper::getGenderByIntValue($model->gender);
                },
                'filter' => JdhnCommonHelper::getGender_map(),
//                'headerOptions' => ['width' => 100],
            ],
             'school',
            [
                'attribute' => 'highest_degree',
                'value' => function ($model, $key, $index, $column) {
                    return JdhnCommonHelper::getHighestDegreeByIntValue($model->highest_degree);
                },
                'filter' => JdhnCommonHelper::getHighestDegree_map(),
            ],
//             'company_major',
             'hometown',
             'height',
            // 'contact',
            // 'name',
            // 'mobile',
            // 'weixin_id',
            // 'id_card_num',
            // 'created_at',
            // 'modified_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
