<?php

$query=require 'bootstrap.php';

require 'Article.php';

$articles = $query->selectAll('articles','Article');

require 'views/index.view.php';