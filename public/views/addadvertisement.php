<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>ADDADVERTISEMENT PAGE</title>
</head>
<body>
<div class="container-base">
    <?php include 'templates/header.php';?>
    <div id="setting-favourite">
        <form class="add-advertisement-container" action="addadvertisement" method="POST" ENCTYPE="multipart/form-data">
            <?php include 'templates/message.php';?>
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
            <select name="job">
                <option>Fryzjer</option>
                <option>Makijażysta</option>
                <option>Barber</option>
                <option>Stylista paznokci</option>
                <option>Stylista brwi</option>
            </select>
            <text>Opis</text>
            <input name="description" type="text">
            <text>Data</text>
            <input name="date" type="date">
            <text>Adres</text>
            <input name="address" type="text">
            <text>Telefon</text>
            <input name="telephone" type="text">
            <input type="button" id="loadFileXml" value="Dodaj Zdjęcie" onclick="document.getElementById('file').click();" />
            <input type="file" name="file" id="file" accept="image/phg, image/jpeg"/>
            <button id="zr" type="submit">Dodaj Ogłoszenie</button>
        </form>
    </div>
</div>
</body>