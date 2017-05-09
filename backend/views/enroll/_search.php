<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EnrollSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enroll-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'activity_id') ?>

    <?= $form->field($model, 'applicant_role') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'birth_year') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'school') ?>

    <?php // echo $form->field($model, 'highest_degree') ?>

    <?php // echo $form->field($model, 'company_major') ?>

    <?php // echo $form->field($model, 'hometown') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'weixin_id') ?>

    <?php // echo $form->field($model, 'id_card_num') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
