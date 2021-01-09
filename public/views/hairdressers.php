<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/glide.core.min.css">
    <link rel="stylesheet" href="css/glide.theme.min.css">
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script type="text/javascript" src="./public/js/searches.js" defer></script>
    <script type="text/javascript" src="./public/js/glide.js" defer></script>
    <script type="text/javascript" src="./public/js/order.js" defer></script>
    <script type="text/javascript" src="./public/js/favourite.js" defer></script>

    <title>HAIRDRESSERS PAGE</title>
</head>
<body>
    <div class="container-base">
        <?php include 'templates/header.php';?>
        <div id="main">
            <?php include 'templates/categories.php';?>
            <main>
                <?php include 'templates/searchByAddressAndDate.php';?>
                <h4>Fryzjerzy</h4>
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <?php foreach ($hairdressers as $advertisement): ?>
                                <?php include 'templates/recommended.php';?>
                            <?php endforeach;?>
                        </ul>
                        <?php include 'templates/glideArrows.php';?>
                    </div>
                </div>
                <section class="search">
                    <?php foreach ($hairdressers as $advertisement): ?>
                        <?php include 'templates/selectedAds.php';?>
                    <?php endforeach;?>
                </section>
            </main>
        </div>
    </div>
</body>

<?php include 'templates/advertisementTemplate.php';?>