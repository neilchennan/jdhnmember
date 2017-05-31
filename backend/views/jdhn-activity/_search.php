<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnActivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jdhn-activity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'act_id') ?>

    <?= $form->field($model, 'act_title') ?>

    <?= $form->field($model, 'act_detail') ?>

    <?= $form->field($model, 'act_richText') ?>

    <?= $form->field($model, 'act_richText_html') ?>

    <?php // echo $form->field($model, 'act_city') ?>

    <?php // echo $form->field($model, 'act_address') ?>

    <?php // echo $form->field($model, 'act_p_uLimit') ?>

    <?php // echo $form->field($model, 'act_p_dLimit') ?>

    <?php // echo $form->field($model, 'act_beginTime') ?>

    <?php // echo $form->field($model, 'act_endTime') ?>

    <?php // echo $form->field($model, 'act_createTime') ?>

    <?php // echo $form->field($model, 'act_type') ?>

    <?php // echo $form->field($model, 'act_state') ?>

    <?php // echo $form->field($model, 'act_price') ?>

    <?php // echo $form->field($model, 'act_fee') ?>

    <?php // echo $form->field($model, 'act_thumb') ?>

    <?php // echo $form->field($model, 'act_photos') ?>

    <?php // echo $form->field($model, 'act_signBeginTime') ?>

    <?php // echo $form->field($model, 'act_signEndTime') ?>

    <?php // echo $form->field($model, 'act_readCount') ?>

    <?php // echo $form->field($model, 'act_mbPrice') ?>

    <?php // echo $form->field($model, 'act_customForm') ?>

    <?php // echo $form->field($model, 'act_title_idx') ?>

    <?php // echo $form->field($model, 'act_richText_idx') ?>

    <?php // echo $form->field($model, 'act_address_idx') ?>

    <?php // echo $form->field($model, 'act_notice') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
