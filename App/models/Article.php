<?php
namespace App\Models;
class Article
{
    private $name;
    private $body;
    public function __construct($name=null, $body=null)
    {
        $this->name = $name;
        $this->body = $body;
    }


}