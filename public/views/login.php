<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <form class="login" action="login" method="POST">
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