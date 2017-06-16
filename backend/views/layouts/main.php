<?php
use yii\helpers\Html;
use kartik\dialog\Dialog;
use kartik\dialog\DialogAsset;
/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    //删掉这段，在Controller里面改变默认的layout
//    echo $this->render(
//        'main-login',
//        ['content' => $content]
//    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);
    DialogAsset::register($this);

    echo Dialog::widget();
    echo Dialog::widget([
        'libName' => 'SuccessDlg', // a custom lib name
        'options' => [  // customized BootstrapDialog options
            'size' => Dialog::SIZE_SMALL,
            'type' => Dialog::TYPE_SUCCESS,
        ],
    ]);
    echo Dialog::widget([
        'libName' => 'WarningDlg', // a custom lib name
        'options' => [  // customized BootstrapDialog options
            'size' => Dialog::SIZE_SMALL,
            'type' => Dialog::TYPE_WARNING,
        ],
    ]);
    echo Dialog::widget([
        'libName' => 'ErrorDlg', // a custom lib name
        'options' => [  // customized BootstrapDialog options
            'size' => Dialog::SIZE_SMALL,
            'type' => Dialog::TYPE_DANGER,
        ],
    ]);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>