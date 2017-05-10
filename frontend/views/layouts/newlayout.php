<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>

    <?php $this->beginBody() ?>
    <div id="Layer1" style="position:absolute; width:100%; height:100%; z-index:-1">
        <img src="../../images/bg8.jpg"  height="100%" width="100%"/>
    </div>

    <div class="wrap">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p><?= Yii::t('app', 'jdhn') ?> Since2013</p>
            <!--            <p class = "pull-right">--><? //= Yii::powered() ?><!--</p>-->
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>