<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/17
 * Time: 11:40
 */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HuxuanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $activityList array */

$this->title = Yii::t('app', 'Huxuans');
$this->params['breadcrumbs'][] = $this->title;
?>

<form class="ui-filterable">
    <input id="activityFilter" data-type="search" placeholder="搜索...">
</form>
<ul data-role="listview" data-filter="true" data-input="#activityFilter" data-autodividers="false" data-inset="true">
    <?php
        foreach($viewList as $listItem){ ?>
            <li>
                <?= $listItem->getDetailMessage()?>
            </li>
        <?php }
    ?>
</ul>
