<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $model \common\result\ActionResult */
?>

<h1><?= Html::encode($model->message) ?></h1>

<ul data-role="listview" data-filter="true" data-autodividers="false" data-inset="true">
    <?php
    if (isset($model->sub_results)){
        foreach($model->sub_results as $listItem){ ?>
            <li>
                <?= $listItem->message?>
            </li>
        <?php }
    }
    ?>
</ul>

