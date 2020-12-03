<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>ADVERTISEMENT PAGE</title>
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
    <div id="main">
        <nav>
            <ul>
                <li>
                    <a href="hairdresserspage" class="button">Fryzjerzy</a>
                </li>
                <li>
                    <a href="makeupartistspage" class="button">Makijażyści</a>
                </li>
                <li>
                    <a href="barberspage" class="button">Barberzy</a>
                </li>
                <li>
                    <a id="two_line" href="nailsstylistspage" class="button">Styliści paznokci</a>
                </li>
                <li>
                    <a id="two_line" href="eyebrowstylistspage" class="button">Styliści brwi</a>
                </li>
            </ul>
        </nav>
        <main>
            <div id="invitation">
                <h1>Czas na zmianę</h1>
                <h2>Podaj adres i znajdz usługodawcę z dojazdem do Twojej okolicy</h2>
            </div>
            <div id ="find">
                <input type="search" placeholder="Adres, np. Armi Krajowej 1">
                <input type="submit" value="Szukaj">
            </div>
            <h4>Polecane</h4>
            <section class="recommendeds">
                <div id="recommended1">
                    <img src="public/uploads/<?= $advertisement->getImage()?>">
                    <div>
                        <h2><? $advertisement->getName()." ".$advertisement->getSurname()?></h2>
                        <h3><?$advertisement->getJob()?></h3>
                        <p><?$advertisement->getTelephone()?></p>
                        <div id="social-section">
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </div>
                </div>

            </section>
        </main>
    </div>
</div>
</body>