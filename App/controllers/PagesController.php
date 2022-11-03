<?php
namespace App\controllers;

 use App\core\App;

 class PagesController
 {

     public  function  home(){

         return view('index');
     }
     public function  about(){
         return view('about');
     }
    public function  contact(){
        return view('contact');
    }

 }