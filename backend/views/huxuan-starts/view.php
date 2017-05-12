<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HuxuanStarts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuan Starts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-starts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'num',
            'gender',
            'times',
            'score',
            'rank',
            'description',
        ],
    ]) ?>

</div>
