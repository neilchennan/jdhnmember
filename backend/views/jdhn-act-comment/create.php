<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JdhnActComment */

$this->title = Yii::t('app', 'Create Jdhn Act Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Act Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-act-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
