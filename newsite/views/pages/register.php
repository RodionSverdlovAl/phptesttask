<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registration</title>
</head>
    <form>
        <label>name</label>
        <input name="full_name" type="text" placeholder="enter your full name">
            <p class="name msg-error"></p>
        <label>login</label>
        <input name="login" type="text" placeholder="enter your login">
            <p class="login msg-error"></p>
        <label>email</label>
        <input name="email" type="text" placeholder="enter your email">
            <p class="email msg-error"></p>
        <label>password</label>
        <input name="password" type="password" placeholder="enter your password">
            <p class="password msg-error"></p>
        <label>repeat password</label>
        <input name="password_confirm" type="password" placeholder="repeat password">
            <p class="password_confirm msg-error"></p>
        <button type="submit" class="registration-btn">registration</button>
        <a href="login">authentication</a>
        <p class="msg"></p>
    </form>

<noscript>
    <style>
        .registration-btn{
            display:none;
        }
    </style>
</noscript>

    <script src="../../assets/js/jquery-3.6.1.min.js"></script>
    <script src = "../../assets/js/main.js"></script>
</body>
</html>