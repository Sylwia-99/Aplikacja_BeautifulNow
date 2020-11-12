<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('firstpage', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('homepage', 'DefaultController');
Routing::get('settingpage', 'DefaultController');
Routing::get('favouritepage', 'DefaultController');
Routing::get('addressespage', 'DefaultController');
Routing::get('hairdresserspage', 'DefaultController');
Routing::get('makeupartistspage', 'DefaultController');
Routing::get('barberspage', 'DefaultController');
Routing::get('nailsstylistspage', 'DefaultController');
Routing::get('eyebrowstylistspage', 'DefaultController');

Routing::run($path);