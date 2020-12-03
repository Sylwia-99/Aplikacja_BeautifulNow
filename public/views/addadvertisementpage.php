<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>ADDADVERTISEMENT PAGE</title>
</head>
<body>
<div class="container-base">
    <header>
        <img src="public/img/Logo.png">
        <div id="icon">
            <a ><img src="public/img/profile.svg"></i></a>
            <a href="homepage"><i class="fas fa-home"></i></a>
            <a href="settingpage"><i class="fas fa-cog"></i></a>
            <a href="addAdvertisement"><i class="fas fa-plus"></i></a>
        </div>
    </header>
    <div id="setting-favourite">
        <div class="add-advertisement-container" action="addAdvertisement" method="POST" ENCTYPE="multipart/form-data">
            <div class="message" style="color: white; font: normal normal normal 0.8em Segoe Script;">
                <?php if(isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <div id="name-surname">
                <div id="name">
                    <text>Imię</text>
                    <input name="name" type="text">
                </div>
                <div id="surname">
                    <text>Nazwisko</text>
                    <input name="surname" type="text">
                </div>
            </div>
            <text>Zawód</text>
            <input name="job" type="text">
            <text>Data</text>
            <input name="date" type="date">
            <text>Adres</text>
            <input name="address" type="text">
            <text>Telefon</text>
            <input name="telephone" type="text">
            <input type="button" id="loadFileXml" value="Dodaj Zdjęcie" onclick="document.getElementById('file').click();" />
            <input type="file" name="file" id="file" accept="image/phg, image/jpeg" style="display:none;"/>
            <button id="zr" type="submit">Dodaj Ogłoszenie</button>
        </div>
    </div>
</div>
</body>