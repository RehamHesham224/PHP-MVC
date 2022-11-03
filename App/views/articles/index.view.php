<?php require('App/views/partials/head.php'); ?>
    <h1>All Articles</h1>
    <ul>
        <?php if (!empty($articles)) {
            foreach ($articles as $article): ?>
                <li>
                    <article>
                        <h2><a href="/article?id=<?= $article->id ?>"><?= $article->name ?></a></h2>
                        <p><?= $article->body ?></p>
                    </article>
                </li>
            <?php endforeach;
        } ?>

    </ul>
<?php require('App/views/partials/footer.php'); ?>