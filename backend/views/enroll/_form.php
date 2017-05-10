<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Enroll */
/* @var $form yii\widgets\ActiveForm */
/* @var $activities array */
?>

<div class="enroll-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'activity_id')->dropDownList($activities) ?>

    <?= $form->field($model, 'applicant_role')->dropDownList(['0'=> Yii::t('app', 'Volunteer'),'1'=>Yii::t('app', 'Male Customer'),'2'=>Yii::t('app', 'Female Customer')]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(['1'=> Yii::t('app', 'Boy'),'2'=>Yii::t('app', 'Girl')]) ?>

    <?= $form->field($model, 'school')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highest_degree')->dropDownList(['1'=> Yii::t('app', 'Doctor'),'2'=>Yii::t('app', 'Master'),'3'=>Yii::t('app', 'Bachelor')]) ?>

    <?= $form->field($model, 'company_major')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hometown')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weixin_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_card_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(JdhnCommonHelper::getEnrollStatus_map()) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
