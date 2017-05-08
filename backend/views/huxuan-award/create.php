<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HuxuanAward */

$this->title = Yii::t('app', 'Create Huxuan Award');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuan Awards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-award-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
