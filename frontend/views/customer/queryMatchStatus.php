<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\QueryMatchStatusForm */

?>
<div class="customer-query-enroll-status">

    <h2>配对结果查询</h2>

    <div class="jdhntitle"><b><?= Html::encode($model->activity_name) ?> </b></div>

    <div class="query-enroll-status-form">

        <?php $form = ActiveForm::begin(); ?>

        <img class="img-responsive center-block" src="/images/deer_t200.png" alt="deer"/>

        <?= $form->field($model, 'mobile')->textInput()->label(Yii::t('app', 'Please input the mobile when enroll')) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Query'), ['class' => 'btn-lg btn-primary btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
