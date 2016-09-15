<?php
/**
 * Created by PhpStorm.
 * User: bartbollen
 * Date: 13/09/16
 * Time: 13:50
 */

include ('model/model.php');
include ('controller/controller.php');
include ('vieuw/vieuw.php');

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();