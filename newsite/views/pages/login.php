<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Auth</title>
</head>
<body>
<form>
    <label>login</label>
    <input name="login" type="text" placeholder="enter your login">
    <p class="login msg-error"></p>
    <label>password</label>
    <input name="password" type="password" placeholder="enter your password">
    <p class="password msg-error"></p>
    <button type="submit" class="login-btn">enter</button>
    <a href="register">registration</a>
    <p class="msg"></p>
</form>

<script src="../../assets/js/jquery-3.6.1.min.js"></script>
<script src = "../../assets/js/main.js"></script>

<noscript>
    <style>
        .registration-btn{
            display:none;
        }
    </style>
</noscript>
</body>
</html>