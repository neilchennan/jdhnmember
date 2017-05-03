<?php

use yii\bootstrap\Nav;
use mdm\admin\components\MenuHelper;
use dmstr\widgets\Menu;

?>

<aside class="main-sidebar">
    <?php
    $callback = function($menu){
        $data = json_decode($menu['data'], true);
        $items = $menu['children'];
        $return = [
            'label' => $menu['name'],
            'url' => [$menu['route']],
        ];
        //处理我们的配置
        if ($data) {
            //visible
            isset($data['visible']) && $return['visible'] = $data['visible'];
            //icon
            isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];
            //other attribute e.g. class...
            $return['options'] = $data;
        }
        //没配置图标的显示默认图标
        (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'circle-o';
        $items && $return['items'] = $items;
        return $return;
    };

    //这里对一开始写的菜单menu进行了优化
//    echo Menu::widget([
//        'options' => ['class' => 'sidebar-menu'],
//        'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
//    ]);

    echo dmstr\widgets\Menu::widget( [
        'options' => ['class' => 'sidebar-menu'],
        'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback),
    ] );
    ?>
</aside>


