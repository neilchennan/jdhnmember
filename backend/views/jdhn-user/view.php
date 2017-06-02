<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnUser */

$this->title = $model->u_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->u_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'u_id',
            'u_pwd',
            'u_realName',
            'u_wechat3',
            'u_wechat2',
            'u_nickName',
            'u_portrait',
            'u_mobile',
            'u_regTime',
            'u_gender',
            'u_academic',
            'u_school',
            'u_city',
            'u_state',
            'u_birthday',
            'u_salary',
            'u_height',
            'u_work',
            'u_idCardNo',
            'u_academicImg',
            'u_idCardImg0',
            'u_idCardImg1',
            'u_workerImg',
            'u_jpush',
            'u_comment:ntext',
        ],
    ]) ?>

</div>
