<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model common\models\JdhnUser */

$this->title = Yii::t('app', 'User Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jdhn Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jdhn-user-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->u_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->u_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow">
            <div class="widget-user-image">
                <img class="img-circle" src="<?= $model->u_portrait ?>" alt="<? echo Yii::t('app', 'U Portrait')?>">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username"><?= $model->u_nickName ?></h3>
            <h5 class="widget-user-desc"><?= $model->u_realName ?></h5>
            <h5 class="widget-user-desc">
                <div class="icon">
                    <?
                    $iconClass = 'fa fa-user-secret';
                    switch ($model->u_gender) {
                        case JdhnCommonHelper::APP_GENDER_MALE:
                            $iconClass = 'fa fa-male';
                            break;
                        case JdhnCommonHelper::APP_GENDER_FEMALE:
                            $iconClass = 'fa fa-female';
                            break;
                        default:
                            $iconClass = 'fa fa-user-secret';
                    }
                    ?>
                    <i class="<?= $iconClass ?>"></i>
                </div>
            </h5>
        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li><a href="#"><? echo Yii::t('app', 'Fans') ?><span class="pull-right badge bg-red">99</span></a></li>
                <li><a href=<? echo "tel:".$model->u_mobile ?>><? echo Yii::t('app', 'Mobile') ?>
                        <span class="pull-right"><? echo $model->u_mobile ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Gender') ?>
                        <span class="pull-right"><? echo $model->u_gender_keyword->kw_desc ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Reg Time') ?>
                        <span class="pull-right"><? echo $model->u_regTime ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Academic') ?>
                        <span class="pull-right"><? echo $model->u_academic_keyword->kw_desc ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U School') ?>
                        <span class="pull-right"><? echo $model->u_school ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U City') ?>
                        <span class="pull-right"><? echo $model->u_city ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Birthday') ?>
                        <span class="pull-right"><? echo $model->u_birthday ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Height') ?>
                        <span class="pull-right"><? echo $model->u_height ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Salary') ?>
                        <span class="pull-right"><? echo $model->u_salary_keyword->kw_desc ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Work') ?>
                        <span class="pull-right"><? echo $model->u_work ?></span>
                    </a>
                </li>
                <li><a href="#"><? echo Yii::t('app', 'U Id Card No') ?>
                        <span class="pull-right"><? echo $model->u_idCardNo ?></span>
                    </a>
                </li>
                <li><a href="#" class="btn btn-block btn-primary btn-sm"><? echo Yii::t('app', 'View Pictures')?></a>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
