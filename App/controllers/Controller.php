<?php
namespace App\controllers;

class Controller
{
    public function model($model)
    {
        require_once '../App/models/' . $model . '.php';
        return new $model();
    }
    function view($name,$data=[])
    {
        extract($data);
        return require "App/views/{$name}.view.php";
    }
    function redirect($path)
    {
        header("Location: {$path}");
    }

}