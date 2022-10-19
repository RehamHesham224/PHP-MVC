<?php
$config =require 'config.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';

$pdo=Connection::make($config['database']);
$query=new QueryBuilder($pdo);
return $query;