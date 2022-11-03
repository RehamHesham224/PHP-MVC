<?php
//Pages
$router->get('','PagesController@home');
$router->get('about','PagesController@about');
$router->get('contact','PagesController@contact');

//Articles

$router->get('articles/create','ArticleController@create');

$router->post('articles/store','ArticleController@store');
$router->get('articles','ArticleController@index');

$router->get('article','ArticleController@show');


$router->get('article/edit','ArticleController@edit');


$router->post('article/update','ArticleController@update');

$router->post('article/delete','ArticleController@delete');

//Auth

$router->get('login','AuthController@login');

$router->post('login','AuthController@verify');

$router->get('register','AuthController@register');

$router->post('register','AuthController@store');

$router->get('logout','AuthController@logout');

