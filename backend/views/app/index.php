<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $userCount int */
/* @var $activityCount int */
/* @var $enrollmentCount int */
/* @var $orderCount int */

$this->title = Yii::t('app', 'App Backend Management');
?>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="/jdhn-user/index">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user-circle-o"></i></span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text"><?= Html::a(Yii::t('app', 'User'), ['/jdhn-user/index'])?></span>
                <span class="info-box-number"><? echo number_format($userCount)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="/jdhn-activity/index">
                <span class="info-box-icon bg-aqua"><i class="fa fa-flag"></i></span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text"><?= Html::a(Yii::t('app', 'Activity'), ['/jdhn-activity/index'])?></span>
                <span class="info-box-number"><? echo number_format($activityCount)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="/jdhn-enrollment/index">
                <span class="info-box-icon bg-green"><i class="fa fa-group"></i></span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text"><?= Html::a(Yii::t('app', 'Enroll'), ['/jdhn-enrollment/index'])?></span>
                <span class="info-box-number"><? echo number_format($enrollmentCount)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="/jdhn-order/index">
                <span class="info-box-icon bg-yellow"><i class="fa fa-handshake-o"></i></span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text"><?= Html::a(Yii::t('app', 'Order'), ['/jdhn-order/index'])?></span>
                <span class="info-box-number"><? echo number_format($orderCount)?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-commenting"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><?= Html::a(Yii::t('app', 'Message'), ['/jdhn-message/index'])?></span>
                <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

</div>