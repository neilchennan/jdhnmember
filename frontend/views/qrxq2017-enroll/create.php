<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Qrxq2017Enroll */

$this->title = Yii::t('app', 'Create Qrxq2017 Enroll');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrxq2017 Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrxq2017-enroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
