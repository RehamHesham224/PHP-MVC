<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <?php
            if(!isset($_SESSION['user'])) {
                echo "
                <li ><a href = '/login' > Login</a ></li >
                <li ><a href = '/register' > Register</a ></li >
                ";
            }
            ?>
        </ul>
        </nav
<h1>Login</h1>
    <form action="/login" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>