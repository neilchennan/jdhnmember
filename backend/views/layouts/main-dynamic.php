<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>

<!--        <script src="http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js"></script>-->
        <script src="https://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>

        <title><?= Html::encode($this->title) ?></title>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
<!--    <body>-->
    <?php $this->beginBody() ?>

    <div class="wrapper" ng-app="jdhnApp">
<!--        --><?//= $content ?>
        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>