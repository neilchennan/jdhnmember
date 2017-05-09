<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/9
 * Time: 13:31
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Enroll */

$this->title = Yii::t('app', 'Set Enroll Status {modelClass}: ', [
        'modelClass' => 'Enroll',
    ]) . $model->nickname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enrolls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Set Enroll Status');
?>
<div class="enroll-setStatus">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Return To List'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= Html::a(Yii::t('app', 'Enroll Success'), ['set-status-commit', 'id' => $model->id, 'status' => 1], ['class' => 'btn btn-lg btn-block btn-primary']) ?>

    <?= Html::a(Yii::t('app', 'Enroll Fail'), ['set-status-commit', 'id' => $model->id, 'status' => 2], ['class' => 'btn btn-lg btn-block btn-danger']) ?>

</div>

