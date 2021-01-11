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
            <?php if($saved !=null):?>
                <section id="history">
                    <?php foreach ($saved as $advertisement): ?>
                        <div id="<?= $advertisement->getId()?>">
                            <img src="public/uploads/<?= $advertisement->getImage()?>">
                            <div>
                                <h1><?= $advertisement->getName()." ".$advertisement->getSurname(); ?></h1>
                                <p><?= $advertisement->getDescription(); ?></p>
                                <h2><?= $advertisement->getTelephone(); ?></h2>
                                <h2><?= $advertisement->getAddress(); ?></h2>
                                <h4 id="your"><?= $advertisement->getDate(); ?></h4>
                                <i class="fas fa-thumbs-up"> <?= $advertisement->getLike()?></i>
                            </div>
                        </div>
                    <?php endforeach;?>
                </section>
            <?php else:?>
                <text id="no-advertisement">Nie masz zapisanych ogłoszeń </text>
            <?php endif;?>
        </main>
    </div>
</div>
</body>