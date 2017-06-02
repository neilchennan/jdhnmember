<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\JdhnUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jdhn Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jdhn User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'u_id',
//            'u_pwd',
//            'u_realName',
//            'u_wechat3',
//            'u_wechat2',
            // 'u_nickName',
            // 'u_portrait',
             'u_mobile',
             'u_regTime',
             'u_gender',
             'u_academic',
            // 'u_school',
             'u_city',
             'u_state',
            // 'u_birthday',
            // 'u_salary',
            // 'u_height',
            // 'u_work',
            // 'u_idCardNo',
            // 'u_academicImg',
            // 'u_idCardImg0',
            // 'u_idCardImg1',
            // 'u_workerImg',
            // 'u_jpush',
            // 'u_comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
