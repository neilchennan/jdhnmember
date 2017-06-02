<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JdhnUser */

$this->title = Yii::t('app', 'Create Jdhn User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
