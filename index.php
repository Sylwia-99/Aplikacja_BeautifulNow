<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'AdvertisementController');
Routing::get('first', 'AdvertisementController');
Routing::get('home', 'AdvertisementController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::get('logout', 'SecurityController');
Routing::get('setting', 'DefaultController');
Routing::get('favourite', 'DefaultController');
Routing::get('history', 'DefaultController');
Routing::get('addresses', 'DefaultController');
Routing::get('hairdressers', 'AdvertisementController');
Routing::get('makeupartists', 'AdvertisementController');
Routing::get('barbers', 'AdvertisementController');
Routing::get('nailsstylists', 'AdvertisementController');
Routing::get('eyebrowstylists', 'AdvertisementController');
Routing::post('addadvertisement', 'AdvertisementController');
Routing::get('advertisements', 'AdvertisementController');
Routing::post('search', 'AdvertisementController');
Routing::post('searches', 'AdvertisementController');
Routing::get('like', 'AdvertisementController');

Routing::run($path);