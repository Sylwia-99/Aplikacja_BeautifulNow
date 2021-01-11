<?php
if(!isset($_COOKIE['user'])){
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
    exit();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>HISTORY PAGE</title>
</head>
<body>
<div class="container-base">
    <?php include 'templates/header.php';?>
    <div id="setting-favourite">
        <?php include 'templates/userSettingMenu.php';?>
        <main id=favourites>
            <div id=description>
                <i class="fas fa-history"></i>
                <div>
                    <h1 id="setting">Tu znajdziesz</h1>
                    <h1 id="setting">Historie twoich usług</h1>
                </div>
            </div>
            <?php if($history !=null):?>
            <section id="history" class="favourites">
                <?php foreach ($history as $advertisement): ?>
                    <div id="<?= $advertisement->getId(); ?>" class="history1">
                        <div>
                            <h2><?= $advertisement->getName()." ".$advertisement->getSurname(); ?></h2>
                            <h3><?= $advertisement->getJob(); ?></h3>
                            <h3><?= $advertisement->getDescription(); ?></h3>
                            <a id="again" href="#" class="button"> Umów ponownie </a>
                        </div>
                        <h2><?= $advertisement->getDate(); ?></h2>
                    </div>
                <?php endforeach;?>
            </section>
            <?php else:?>
                <text id="no-advertisement">Do tej pory nie zamawiałaś żadnych usług </text>
            <?php endif;?>
        </main>
    </div>
</div>
</body>