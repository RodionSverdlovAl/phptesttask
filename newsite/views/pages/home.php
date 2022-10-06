<?php
echo $_COOKIE['PHPSESSID'];
if(!$_COOKIE['user'] && !$_SESSION['user']){
    session_start();
    \App\Services\Router::redirect('/login');
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home page</h1>
    <h1 class="profile">Hello, <?=$_COOKIE['user']?></h1>
    <form action="/auth/logout" method="post">
        <button type="submit">Logout</button>
    </form>

    <script src="../../assets/js/jquery-3.6.1.min.js"></script>
    <script src = "../../assets/js/main.js"></script>
</body>
</html>