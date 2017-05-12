<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HuxuanSummary */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuan Summaries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'male_num',
            'male_order',
            'female_num',
            'female_order',
            'male_score',
            'female_score',
            'total_score',
            'description',
            'created_at:datetime',
            'modified_at:datetime',
        ],
    ]) ?>

</div>
