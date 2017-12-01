<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helper\JdhnCommonHelper;

/* @var $this yii\web\View */
/* @var $model array */

$this->title = $model['name'];
?>
<div class="enroll-view">

    <div class="jdhntitle"><b><?= Html::encode($this->title) ?></b></div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            [
                'label' => '状态',
                'value' => '配对成功',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '身份',
                'attribute' => 'sf',
                'value'=> $model['sf'],
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '您的编号',
                'attribute' => 'selfnum',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
            [
                'label' => '与您配对嘉宾的编号',
                'attribute' => 'opnum',
                'headerOptions' => ['class' => 'vertical-middle text-center'],
                'contentOptions' => ['class' => 'vertical-middle text-center'],
            ],
        ],
    ]) ?>

    <div>
        请立即添加交大红娘客服，微信号:jdhn99，并发送“你的编号+手机号码”，待客服核对之后邀请您进入活动群。
    </div>

</div>