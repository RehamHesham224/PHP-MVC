<?php if(! empty($article)){?>
 <?php require('App/views/partials/head.php'); ?>
    <h1>Show</h1>
    <h2><?= $article->name ?></h2>
    <p><?=  $article->body ?></p>
    <a href="/articles">Back</a>

<?php require('App/views/partials/footer.php'); ?>
   <?php }else{
    echo "No article found for this id";
} ?>

