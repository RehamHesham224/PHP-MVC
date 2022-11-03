<?php
namespace App\models;

class User
{
    private $name;
    private $email;
    private $password;
    public function __construct($name=null, $email=null, $password=null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function selectAllUsers (){
        return [
            [
                'name' => 'John',
                'email' => 'john@gmail.com',
                'password' => 'password'
            ],
             [
                 'name' => 'reham',
                 'email' => 'reham@gmail.com',
                 'password' => 'password'
             ]

        ];
    }
}