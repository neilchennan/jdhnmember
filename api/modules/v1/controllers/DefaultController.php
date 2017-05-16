<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
//use yii\web\Controller;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
