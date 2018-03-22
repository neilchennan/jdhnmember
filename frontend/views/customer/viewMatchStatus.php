<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model array */
/* @var $imageName string */
/* @var $imagePath string */
/* @var $imageMsg string */

$this->title = $model['name'];
?>
<style>
    .div_center_img{
        text-align:center
    }
</style>
<div class="enroll-view">

    <div class="jdhntitle"><b><?= Html::encode($this->title) ?></b></div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            [
//                'label' => '状态',
//                'value' => '配对成功',
//                'headerOptions' => ['class' => 'vertical-middle text-center'],
//                'contentOptions' => ['class' => 'vertical-middle text-center'],
//            ],
//            [
//                'label' => '你的活动昵称',
//                'attribute' => 'name',
//                'headerOptions' => ['class' => 'vertical-middle text-center'],
//                'contentOptions' => ['class' => 'vertical-middle text-center'],
//            ],
            [
                'label' => '你的活动身份',
                'attribute' => 'gender',
                'value'=> $model['gender'],
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '你的活动编号',
                'attribute' => 'num',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '与你配对的小伙伴编号',
                'attribute' => 'oopnum',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '与你配对的小伙伴昵称',
                'attribute' => 'oopName',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '小伙伴的微信号',
                'attribute' => 'oopWechatNum',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
        ],
    ]) ?>

    <div>
        赶快添加你的小伙伴吧~添加时请务必注明“来自maybe恋人”哦~
    </div>
    <div>
        <?= $imageMsg?>
    </div>
    
    <div class="div_center_img">
        <?= Html::img("@web/$imagePath/$imageName", ['width' => '200px', 'height' => '200px']) ?>
    </div>

</div>