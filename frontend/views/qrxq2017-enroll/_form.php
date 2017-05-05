<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Qrxq2017Enroll */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrxq2017-enroll-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'applicant_role')->dropDownList(['0'=> Yii::t('app', 'Volunteer'),'1'=>Yii::t('app', 'Male Customer'),'2'=>Yii::t('app', 'Female Customer')]) ?>
    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'gender')->dropDownList(['1'=> Yii::t('app', 'Boy'),'2'=>Yii::t('app', 'Girl')]) ?>
    <?= $form->field($model, 'birth_year')->textInput() ?>
    <?= $form->field($model, 'school')->textInput() ?>
    <?= $form->field($model, 'highest_degree')->dropDownList(['1'=> Yii::t('app', 'Doctor'),'2'=>Yii::t('app', 'Master'),'3'=>Yii::t('app', 'Bachelor')]) ?>
    <?= $form->field($model, 'company_major')->textInput() ?>
    <?= $form->field($model, 'hometown')->textInput() ?>
    <?= $form->field($model, 'height')->textInput() ?>
    <?= $form->field($model, 'contact')->textInput() ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'weixin_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
