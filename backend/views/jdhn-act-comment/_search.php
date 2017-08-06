<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActCommentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-act-comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'acm_id') ?>

    <?= $form->field($model, 'u_id') ?>

    <?= $form->field($model, 'act_id') ?>

    <?= $form->field($model, 'acm_text') ?>

    <?= $form->field($model, 'acm_time') ?>

    <?php // echo $form->field($model, 'acm_state') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
