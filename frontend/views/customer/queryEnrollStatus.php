<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\QueryEnrollStatusForm */

?>
<div class="customer-query-enroll-status">

    <div class="query-enroll-status-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nickname')->textInput() ?>
        <?= $form->field($model, 'mobile')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-success btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
