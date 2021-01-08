<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/glide.core.min.css">
    <link rel="stylesheet" href="css/glide.theme.min.css">
    <script type="text/javascript" src="./public/js/glide.js" defer></script>

    <title>FAVOURITE PAGE</title>
</head>
<body>
    <div class="container-base">
        <?php include 'templates/header.php';?>
        <div id="setting-favourite">
            <?php include 'templates/userSettingMenu.php';?>
            </nav>
            <main id=favourites>
                <div id=description>
                    <i class="far fa-heart"></i>
                    <div>
                        <h1 id="setting">Tu znajdziesz swoich</h1>
                        <h1 id="setting">ulubionych usługodawców</h1>
                    </div>
                </div>
                <div class="favourites">
                    <div id="f" class="glide">
                        <div id="f" class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <div id="favourite1">
                                        <img src="public/img/profile.svg">
                                        <h2>Imię Nazwisko</h2>
                                        <h3>Fryzjer</h3>
                                        <p>Opis</p>
                                        <a id="contact" href="#" class="button"></i> Kontakt</a>
                                    </div>
                                </li>
                                <li class="glide__slide">
                                    <div id="favourite1">
                                        <img src="public/img/profile.svg">
                                        <h2>Imię Nazwisko</h2>
                                        <h3>Fryzjer</h3>
                                        <p>Opis</p>
                                        <a id="contact" href="#" class="button"></i> Kontakt</a>
                                    </div>
                                </li>
                            </ul>
                            <div id="f" class="glide__arrows" data-glide-el="controls">
                                <button id="f" class="glide__arrow glide__arrow--left" data-glide-dir="<"><</button>
                                <button id="f" class="glide__arrow glide__arrow--right" data-glide-dir=">">></button>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>