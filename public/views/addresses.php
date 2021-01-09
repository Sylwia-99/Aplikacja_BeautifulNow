<?php
if(!isset($_COOKIE['user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>ADDRESSES PAGE</title>
</head>
<body>
    <div class="container-base">
        <?php include 'templates/header.php';?>
        <div id="setting-favourite">
            <?php include 'templates/userSettingMenu.php';?>
            <main id=favourites>
                <div id=description>
                    <i class="far fa-compass"></i>
                    <div>
                        <h1 id="setting">Tu znajdziesz dodane</h1>
                        <h1 id="setting">przez Ciebe adresy</h1>
                    </div>
                </div>
                <div class="input">
                    <input class="form-control" type="search" placeholder="Nawigacja/ Adres">
                    <span class="input-addon"><i class="fas fa-plus-circle "></i></span>
                </div>
                <hr/>
                <div id="addresses">
                    <h2>Adresy</h2>
                    <button class="button.edit-adress" data-address-mode="addaddress"> Dodaj Adres</button>
                    <section class="added">
                        <p>Twoja lista adresowa jest pusta</p>
                    </section>
                </div>
        </div>
        </main>
    </div>
</div>
</body>