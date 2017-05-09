<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = $model->name;
?>
<div class="enroll-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'gender',
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
//            'id_card_num',
            'created_at:datetime',
            'modified_at:datetime',
        ],
    ]) ?>

</div>