<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Huxuan */

$this->title = Yii::t('app', 'Create Huxuan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
