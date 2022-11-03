<?php require('App/views/partials/head.php'); ?>
<?php require('App/views/partials/errors.php'); ?>

    <h1>Add Article</h1>
    <form action="/articles/store" method="POST">
       <div>
           <label for="name">Name</label>
           <input type="text" name="name" placeholder="Name" id="name">
           <?php
           if(isset($errors['name'])){
               echo $errors['name'];
           }
           ?>
       </div>

       <div>
           <label for="body">Body</label>
           <input type="text" name="body" placeholder="Body" id="body">
           <?php
           if(isset($errors['body'])){
               echo $errors['body'];
           }
           ?>
       </div>
        <button type="submit">Submit</button>
    </form>
<?php require('App/views/partials/footer.php'); ?>