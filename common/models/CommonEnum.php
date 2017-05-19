<?php
/**
 * Created by PhpStorm.
 * User: neilchen
 * Date: 2017/5/18
 * Time: 22:39
 */

namespace common\models;

use Yii;

final class CommonEnum
{
    private function __construct(){

    }
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const ROMA_FIRST = 'Ⅰ';
    const ROMA_SECOND = 'Ⅱ';
    const ROMA_THIRD = 'Ⅲ';

    const HUXUAN_FROM = 2;
    const HUXUAN_TO = 1;
}