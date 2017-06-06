<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\JdhnEnrollment */

$this->title = Yii::t('app', 'Create Jdhn Enrollment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-enrollment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
