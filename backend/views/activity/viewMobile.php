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
        <a href="/huxuan-award/index">
            <h2>互选授奖结果</h2>
        </a>
    </li>
    <li data-icon="heart">
        <a href="/huxuan-starts/index">
            <h2>万人迷</h2>
        </a>
    </li>
    <li data-icon="mail">
        <a href="/huxuan/index">
            <h2>互选详细结果</h2>
        </a>
    </li>
</ul>
