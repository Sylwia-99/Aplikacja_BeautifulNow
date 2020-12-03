<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>ADDRESSES PAGE</title>
</head>
<body>
    <div class="container-base">
        <header>
            <img src="public/img/Logo.png">
            <div id="icon">
                <a ><img src="public/img/profile.svg"></i></a>
                <a href="homepage"><i class="fas fa-home"></i></a>
                <a href="settingpage"><i class="fas fa-cog"></i></a>
                <a href="addadvertisementpage"><i class="fas fa-plus"></i></a>
            </div>
        </header>
        <div id="setting-favourite">
            <nav id=favourites>
                <div id="profile">
                    <img src="public/img/profile.svg">
                </div>
                <ul id="f">
                    <li>
                        <a id="f" href="favouritepage" class="button"><i class="fas fa-heart"></i> Ulubione</a>
                    </li>
                    <li>
                        <a id="f" href="historypage" class="button"><i class="fas fa-history"></i> Historia Usług</a>
                    </li>
                    <li>
                        <a id="f" href="addressespage" class="button"><i class="fas fa-location-arrow"></i> Adresy</a>
                    </li>
                    <li>
                        <a id="f" href="login" class="button"><i class="fas fa-sign-out-alt"></i> Wyloguj</a>
                    </li>
                </ul>
            </nav>
            <main id=favourites>
                <div id=description>
                    <i class="far fa-compass"></i>
                    <div>
                        <h5>Tu znajdziesz dodane</h5>
                        <h5>przez Ciebe adresy</h5>
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