<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Set Enroll Status'), ['set-status', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'attribute' => 'status',
                'value'=> JdhnCommonHelper::getEnrollStatusByIntValue($model->status),
            ],
            'activity.activity_name',
            [
                'attribute' => 'applicant_role',
                'value'=> JdhnCommonHelper::getApplicantRoleByIntValue($model->applicant_role),
            ],
            'nickname',
            'birth_year',
            [
                'attribute' => 'gender',
                'value'=> JdhnCommonHelper::getGenderByIntValue($model->gender),
            ],
            'school',
            [
                'attribute' => 'highest_degree',
                'value'=> JdhnCommonHelper::getHighestDegreeByIntValue($model->highest_degree),
            ],
            'company_major',
            'hometown',
            'height',
            'contact',
            'name',
            'mobile',
            'weixin_id',
            'id_card_num',
            [
                'attribute' => 'status',
                'value'=> JdhnCommonHelper::getEnrollStatusByIntValue($model->status),
            ],
            'remark',
            'num',
            'created_at:datetime',
            'modified_at:datetime',
        ],
    ]) ?>

</div>
