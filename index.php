<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'AdvertisementController');
Routing::get('first', 'AdvertisementController');
Routing::get('home', 'AdvertisementController');
Routing::get('setting', 'DefaultController');
Routing::get('favourite', 'AdvertisementController');
Routing::get('history', 'AdvertisementController');
Routing::get('addresses', 'DefaultController');
Routing::get('yourAdvertisements', 'AdvertisementController');
Routing::get('logout', 'SecurityController');
Routing::get('saved', 'AdvertisementController');
Routing::get('addToSaved', 'AdvertisementController');
Routing::get('hairdressers', 'AdvertisementController');
Routing::get('makeupartists', 'AdvertisementController');
Routing::get('barbers', 'AdvertisementController');
Routing::get('nailsstylists', 'AdvertisementController');
Routing::get('eyebrowstylists', 'AdvertisementController');
Routing::get('advertisements', 'AdvertisementController');
Routing::get('like', 'AdvertisementController');
Routing::get('addToFavourite', 'AdvertisementController');
Routing::get('order', 'AdvertisementController');
Routing::get('deleteAdvertisement', 'AdvertisementController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('addadvertisement', 'AdvertisementController');
Routing::post('search', 'AdvertisementController');
Routing::post('searches', 'AdvertisementController');

Routing::run($path);