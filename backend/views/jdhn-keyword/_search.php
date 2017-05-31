<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnKeywordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-keyword-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kw_id') ?>

    <?= $form->field($model, 'kw_group') ?>

    <?= $form->field($model, 'kw_desc') ?>

    <?= $form->field($model, 'kw_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
