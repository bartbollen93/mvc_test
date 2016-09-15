<?php
/**
 * Created by PhpStorm.
 * User: bartbollen
 * Date: 13/09/16
 * Time: 13:49
 */

class Controller
{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->string = "Updated Data, thanks to MVC and PHP!";
    }
}