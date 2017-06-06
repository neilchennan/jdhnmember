<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnEnrollment */

$this->title = $model->enroll_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-enrollment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->enroll_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->enroll_id], [
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
            'enroll_id',
            'u_id',
            'enroll_name',
            'enroll_gender',
            'enroll_birthday',
            'enroll_school',
            'enroll_work',
            'enroll_height',
            'act_id',
            'enroll_signupTime',
            'enroll_state',
            'enroll_custFormInfo',
        ],
    ]) ?>

</div>
