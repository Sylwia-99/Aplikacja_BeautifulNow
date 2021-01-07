<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'AdvertisementController');
Routing::get('firstpage', 'AdvertisementController');
Routing::get('homepage', 'AdvertisementController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
#Routing::post('logout', 'SecurityController');
Routing::get('settingpage', 'DefaultController');
Routing::get('favouritepage', 'DefaultController');
Routing::get('historypage', 'DefaultController');
Routing::get('addressespage', 'DefaultController');
Routing::get('hairdresserspage', 'AdvertisementController');
Routing::get('makeupartistspage', 'AdvertisementController');
Routing::get('barberspage', 'AdvertisementController');
Routing::get('nailsstylistspage', 'AdvertisementController');
Routing::get('eyebrowstylistspage', 'AdvertisementController');
Routing::post('addadvertisementpage', 'AdvertisementController');
Routing::get('advertisementpage', 'AdvertisementController');
Routing::post('search', 'AdvertisementController');
Routing::post('searches', 'AdvertisementController');
Routing::get('like', 'AdvertisementController');

Routing::run($path);