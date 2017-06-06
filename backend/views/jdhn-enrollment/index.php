<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnEnrollmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jdhn Enrollments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-enrollment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jdhn Enrollment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enroll_id',
            'u_id',
            'enroll_name',
            'enroll_gender',
            'enroll_birthday',
            // 'enroll_school',
            // 'enroll_work',
            // 'enroll_height',
            // 'act_id',
            // 'enroll_signupTime',
            // 'enroll_state',
            // 'enroll_custFormInfo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
