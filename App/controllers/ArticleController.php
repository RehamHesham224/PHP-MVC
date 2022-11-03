<?php
namespace App\controllers;

use App\core\App;

class ArticleController
{
    public function create()
    {
        return view('articles/create');
    }

    public function store()
    {
        $validateName=$this->validate($name = $_POST['name']);
        $validateBody=$this->validate($body = $_POST['body']);
        $this->validation($validateName, $validateBody);
            App::get('database')->insert(
                'articles',
                [
                'name' => $validateName,
                'body' => $validateBody
                ]
            );

            redirect('/articles');
    }

    public  function  index(){
        $articles = App::get('database')->selectAll('articles');
        return view('articles/index',compact('articles'));
    }

    public  function  show(){
        $article = App::get('database')->select('articles',$_GET['id']);
        return view('articles/show',compact('article'));
    }

    public  function  edit(){
        $article = App::get('database')->select('articles',$_GET['id']);
        return view('articles/edit',compact('article'));;
    }

    public  function  update(){
        App::get('database')->update(
            'articles',
            "name=?,body=?",
            "id=?",
            [
              $_POST['name'],
                $_POST['body'],
                $_POST['id']
            ]
        );
        return redirect('/articles');
    }

    public  function  delete(){
        App::get('database')->delete('articles',$_POST['id']);
        return redirect('/articles');
    }

    protected function validate($data){
        $data=trim($data);
        $data= htmlspecialchars($data);
        $data=stripcslashes($data);
        return  $data;
    }
    protected  function  validation($name,$body): void
    {
        $errors=[];
        if(strlen($name)<2){
            $errors["name"]="name must be more than 2 char ..";
        }
        if(strlen($body)<2){
            $errors["body"]=" must be more than 2 char ..";
        }
        if(count($errors)>0){

            redirect("/articles/create?errors=".json_encode($errors));
            exit;
        }
    }



}