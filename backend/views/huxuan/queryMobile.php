<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use \common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model \common\models\QueryHuxuanForm */
/* @var $messages array */

?>

<div class="huxuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gender')->radioList(JdhnCommonHelper::getGender_map()) ?>

    <?= $form->field($model, 'from_or_to')->radioList(JdhnCommonHelper::getHuxuanFromTo_map()) ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Query'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<ul data-role="listview" data-filter="true" data-autodividers="false" data-inset="true">
    <?php
    if (isset($messages)){
        foreach($messages as $messageItem){ ?>
            <li>
                <?= $messageItem?>
            </li>
        <?php }
    }
    ?>
</ul>
