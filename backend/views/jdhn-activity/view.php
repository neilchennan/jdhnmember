<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActivity */

$this->title = $model->act_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->act_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->act_id], [
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
            'act_id',
            'act_title',
            'act_detail',
            'act_richText:ntext',
            'act_richText_html:ntext',
            'act_city',
            'act_address',
            'act_p_uLimit',
            'act_p_dLimit',
            'act_beginTime',
            'act_endTime',
            'act_createTime',
            'act_type',
            'act_state',
            'act_price',
            'act_fee',
            'act_thumb',
            'act_photos',
            'act_signBeginTime',
            'act_signEndTime',
            'act_readCount',
            'act_mbPrice',
            'act_customForm:ntext',
            'act_title_idx',
            'act_richText_idx:ntext',
            'act_address_idx',
            'act_notice:ntext',
        ],
    ]) ?>

</div>
