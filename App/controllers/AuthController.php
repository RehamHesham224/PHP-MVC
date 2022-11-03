<?php
namespace App\controllers;

use App\core\App;

class AuthController
{
    public function login(){
        view('Auth/login');
    }
    public function register(){
        view('Auth/register');
    }
    public function verify(){
        $user = App::get('database')->selectUser('users',$_POST['email']);
        if($user){
            if(password_verify($_POST['password'],$user->password)){
            session_start() ;
                $_SESSION['user'] = $user->id;
                return redirect('/');
            }
        }
        return redirect('register');
    }


    public  function logout(){
        session_start() ;
        unset($_SESSION['user']);
        return redirect('/login');
    }
    public function store(){
        $this->validation();
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        App::get('database')->insert('users',[
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $password
        ]);
        return redirect('/login');
    }

    private function validation()
    {
        $errors = [];
        if (strlen($_POST['name']) < 2) {
            $errors['name'] = 'name must be more than 2 char ..';
        }
        if (strlen($_POST['email']) < 2) {
            $errors['email'] = 'email must be more than 2 char ..';
        }
        if (strlen($_POST['password']) < 2) {
            $errors['password'] = 'password must be more than 2 char ..';
        }
        if (count($errors) > 0) {
            redirect("/register?errors=" . json_encode($errors));
            exit;
        }
    }

}
