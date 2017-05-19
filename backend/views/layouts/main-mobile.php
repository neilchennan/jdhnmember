<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this);
//dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <!--    jquery ui-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<!--    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
<!--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>
<div data-role="page" id="mainpage">
    <div data-role="header" data-position="fixed"  data-theme="b">
        <a href="#" id="backBtnOnToolbar" class="ui-btn ui-corner-all ui-icon-back ui-btn-icon-left ui-shadow" data-rel="back" data-ajax='false'>
            <?= Yii::t('app', 'Back')?>
        </a>
        <h1><?= Html::encode($this->title) ?></h1>
        <a href="/activity/index-mobile" id="rightBtnOnToolbar" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-left ui-shadow" data-ajax='false'>
            <?= Yii::t('app', 'Home')?>
        </a>
    </div>

    <div data-role="content">
        <?= $content ?>
    </div>

    <div data-role="footer" data-position="fixed" >
        <div data-role="navbar">
            <ul>
                <li><a href="/activity/index-mobile" data-icon="home" data-ajax='false'><?= Yii::t('app', 'Home')?></a></li>
                <li><a href="/activity/create-mobile" data-icon="plus" data-ajax='false'><?= Yii::t('app', 'Create')?></a></li>
                <li><a href="/huxuan-score-factor/index-mobile" data-icon="gear" data-ajax='false'><?= Yii::t('app', 'Options')?></a></li>
            </ul>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
