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

<div>
    <?= $model->activity_description?>
</div>

<ul data-role="listview" data-inset="true">
    <li data-icon="star">
        <a href="/huxuan-award/mobile-list-by-activity-id?id=<?= $model->id?>">
            <h2>互选授奖结果</h2>
            <span class="ui-li-count"><?= $model->getAwardCount()?></span>
        </a>
    </li>
    <li data-icon="heart">
        <a href="/huxuan-starts/mobile-list-by-activity-id?id=<?= $model->id?>">
            <h2>万人迷</h2>
            <span class="ui-li-count"><?= $model->getStarsCount()?></span>
        </a>
    </li>
    <li data-icon="mail">
        <a href="/huxuan/mobile-list-by-activity-id?id=<?= $model->id?>">
            <h2>互选详细结果</h2>
            <span class="ui-li-count"><?= $model->getHuxuanCount()?></span>
        </a>
    </li>
</ul>

<a href="execute-summary?id=<?= $model->id?>" class="ui-btn"><?= Yii::t('app', 'Execute Huxuan Summary Now')?></a>
