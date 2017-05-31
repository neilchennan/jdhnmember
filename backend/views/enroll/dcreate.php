<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/27
 * Time: 11:00
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helper\JdhnCommonHelper;

$this->title = Yii::t('app', 'Create Enroll');
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">带(*)号的为必填字段</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
<!--    <form role="form" name="enrollForm" ng-controller="enrollController" novalidate>-->
    <?php $form = ActiveForm::begin([
        'options' => [

        ],
//        'fieldConfig' => [
//            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            'labelOptions' => ['class' => 'col-lg-1 control-label'],
//        ],
    ]); ?>
        <div class="box-body">
            <div class="form-group">
<!--                <label for="exampleInputEmail1">Email address</label>-->
<!--                <input type="email" class="form-control" name="email" ng-model="email" required>-->
<!--                <span style="color:red" ng-show="enrollForm.email.$dirty && enrollForm.email.$invalid">-->
<!--                    <span ng-show="enrollForm.email.$error.required">邮箱是必须的。</span>-->
<!--                    <span ng-show="enrollForm.email.$error.email">非法的邮箱。</span>-->
<!--                </span>-->
            </div>


            <?= $form->field($model, 'activity_id')->dropDownList($activities) ?>

            <?= $form->field($model, 'nickname')->textInput([
//                'class' => 'form-group has-feedback',
            ]) ?>

            <div class="form-group has-success has-feedback">
                <label class="control-label" for="inputSuccess">成功状态</label>
                <input type="text" class="form-control" id="inputSuccess" placeholder="成功状态" >
                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>

            <div class="form-group has-error">
                <label for="exampleInputFile">Nickname</label>
                <input type="text" name="nickname" class="form-control" ng-model="nickname" required>
                <span style="color:red" ng-show="enrollForm.nickname.$dirty && enrollForm.nickname.$invalid">
                    <span ng-show="enrollForm.nickname.$error.required">昵称是必须的。</span>
                </span>
            </div>

            <div class="form-group has-success">
                <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>
                <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
                <span class="help-block">Help block with success</span>
            </div>

            <div class="form-group has-error">
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with
                    error</label>
                <input type="text" class="form-control" id="inputError" placeholder="Enter ...">
                <span class="help-block">Help block with error</span>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
<!--    </form>-->
    <?php ActiveForm::end(); ?>
</div>

<?= Html::jsFile('@web/js/enrollController.js') ?>
