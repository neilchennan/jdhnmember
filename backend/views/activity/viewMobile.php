<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/17
 * Time: 13:28
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Activity */

$this->title = $model->activity_name;
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a(Yii::t('app', 'Update'), ['update-mobile', 'id' => $model->id], [
        'class' => 'ui-btn ui-shadow ui-corner-all ui-icon-edit ui-btn-icon-left ui-btn-inline ui-mini',
        'data-ajax' => 'false',
    ]) ?>
    <?= Html::a(Yii::t('app', 'Delete'), ['delete-mobile', 'id' => $model->id], [
        'class' => 'ui-btn ui-shadow ui-corner-all ui-icon-delete ui-btn-icon-left ui-btn-inline ui-mini',
        'data-ajax' => 'false',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>

<div>
    <?= $model->activity_description?>
</div>
<div style="text-align: center">
    <?php
//    $hxLink = "http://hx.deerlove.top/customer/create-enroll?activity_id=".$model->id;
    $hxLink = "http://hx.deerlove.top/huxuan/customer-create?activity_id=".$model->id;
    ?>
    <a href=<?= $hxLink?>>心动互选连接</a>
</div>

<ul data-role="listview" data-inset="true">
    <li data-icon="star">
        <a href="/huxuan-award/mobile-list-by-activity-id?id=<?= $model->id?>" data-ajax='false'>
            <h2><?= Yii::t('app', 'Pair Results')?></h2>
            <span class="ui-li-count"><?= $model->getAwardCount()?></span>
        </a>
    </li>
    <li data-icon="heart">
        <a href="/huxuan-starts/mobile-list-by-activity-id?id=<?= $model->id?>" data-ajax='false'>
            <h2><?= Yii::t('app', 'Stars')?></h2>
            <span class="ui-li-count"><?= $model->getStarsCount()?></span>
        </a>
    </li>
    <li data-icon="mail">
<!--        <a href="/huxuan/mobile-list-by-activity-id?id=--><?//= $model->id?><!--" data-ajax='false'>-->
            <a href="/huxuan/query-mobile?activity_id=<?= $model->id?>" data-ajax='false'>
            <h2><?= Yii::t('app', 'Other Huxuan Results')?></h2>
            <span class="ui-li-count"><?= $model->getHuxuanCount()?></span>
        </a>
    </li>
</ul>

<a href="execute-summary?id=<?= $model->id?>" class="ui-btn ui-icon-grid ui-btn-icon-left" data-ajax='false'><?= Yii::t('app', 'Execute Huxuan Summary Now')?></a>
<a href="/huxuan-summary/clean-huxuan?activity_id=<?= $model->id?>" class="ui-btn ui-icon-delete ui-btn-icon-left" data-ajax='false'><?= Yii::t('app', 'Clean All Huxuan')?></a>
