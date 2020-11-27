<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <title>REGISTER PAGE</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form class="register" action="register" method="POST">
                <div class="logo">
                    <img src="public/img/Logo.png">
                </div>
                <div class="message" style="color: white; font: normal normal normal 0.8em Segoe Script;">
                    <?php if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <text id="register">Imię</text>
                <input id="register" name="name" type="text">
                <text id="register">Nazwisko</text>
                <input id="register" name="surname" type="text">
                <text id="register">E-mail</text>
                <input id="register" name="email" type="text">
                <text id="register">Hasło</text>
                <input id="register" name="password" type="password">
            </form>
        </div>
        <button id="zr" type="submit">Zarejestruj się</button>
    </div>
</body>