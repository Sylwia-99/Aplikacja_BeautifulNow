<?php
    if(isset($_COOKIE['user'])){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
        exit();
    }
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>

    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form class="login" action="login" method="POST">
                <div class="logo">
                    <img src="public/img/Logo.png">
                </div>
                <?php include 'templates/message.php';?>
                <text>E-mail</text>
                <input name="email" type="text">
                <text>Hasło</text>
                <input name="password" type="password">
                <button type="submit">Zaloguj się</button>
            </form>
        </div>
        <a id="zr" href="register" class="button">Zarejestruj się</a>
    </div>
</body>