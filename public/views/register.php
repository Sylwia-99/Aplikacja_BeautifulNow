<?php
if(isset($_COOKIE['user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/setting");
    exit();
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>

    <title>REGISTER PAGE</title>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <form class="register" action="register" method="POST">
                <div class="logo">
                    <img src="public/img/Logo.png">
                </div>
                <?php include 'templates/message.php';?>
                <text id="register">Imię</text>
                <input id="register" name="name" type="text">
                <text id="register">Nazwisko</text>
                <input id="register" name="surname" type="text">
                <text id="register">E-mail</text>
                <input id="register" name="email" type="text">
                <text id="register">Hasło</text>
                <input id="register" name="password" type="password">
                <text id="register">Powtórz Hasło</text>
                <input id="register" name="confirmedPassword" type="password">
                <text id="register">Telefon</text>
                <input id="register" name="phone" type="text">
                <button id="zr" type="submit">Zarejestruj się</button>
            </form>
        </div>
    </div>
</body>