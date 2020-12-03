<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/glide.core.min.css">
    <link rel="stylesheet" href="css/glide.theme.min.css">
    <title>FAVOURITE PAGE</title>
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
                    <i class="far fa-heart"></i>
                    <div>                            <h5>Tu znajdziesz swoich</h5>
                        <h5>ulubionych usługodawców</h5>
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
                            <script>
                                const config = {
                                    type: 'carousel',
                                    perView:3,
                                    breakpoints:{
                                        1024:{
                                            perView: 1
                                        },
                                        600:1
                                    }
                                }
                                new Glide('.glide', config).mount()
                            </script>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>