<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AppAsset;

//AppAsset::register($this);
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
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>
<div data-role="page" id="page-main">
    <div data-role="header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div data-role="content">
        <?= $content ?>
    </div>

    <div data-role="footer" data-position="fixed" >
        <div data-role="navbar">
            <ul>
                <li><a href="/activity/index-mobile" data-icon="home">首页</a></li>
                <li><a href="/activity/aaa" data-icon="bullets">菜单</a></li>
                <li><a href="#anylink" data-icon="search">搜索</a></li>
            </ul>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
