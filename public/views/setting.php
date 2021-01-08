<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/mediaquery.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>SETTING PAGE</title>
</head>
<body>
    <div class="container-base">
        <?php include 'templates/header.php';?>
        <div id="setting">
            <nav>
                <div id="profile">
                    <img src="public/img/profile.svg">
                </div>
                <ul>
                    <li>
                        <a id="s" href="favourite" class="button"><i class="fas fa-heart"></i>Ulubione</a>
                    </li>
                    <li>
                        <a id="s" href="history" class="button"><i class="fas fa-history"></i>Historia Usług</a>
                    </li>
                    <li>
                        <a id="s" href="addresses" class="button"><i class="fas fa-location-arrow"></i>Adresy</a>
                    </li>
                    <li>
                        <form id="logout" action="logout" method="GET">
                            <button> <i class="fas fa-sign-out-alt"></i> Wyloguj</button>
                        </form>
                    </li>
                </ul>
                </div>
            </nav>
        </div>
    </div>
</body>