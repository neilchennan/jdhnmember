<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CustomerCreateForm */

$this->title = Yii::t('app', 'Input My Favorite');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Huxuans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="huxuan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'my_num')->textInput() ?>
    <?= $form->field($model, 'opp_num_order1')->textInput() ?>
    <?= $form->field($model, 'opp_num_order2')->textInput() ?>
    <?= $form->field($model, 'opp_num_order3')->textInput() ?>
    <?= $form->field($model, 'my_gender')->dropDownList(['1'=> Yii::t('app', 'Boy'),'2'=>Yii::t('app', 'Girl')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn-lg btn-primary btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>