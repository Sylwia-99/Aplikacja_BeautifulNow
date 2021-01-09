<div id="<?= $advertisement->getId()?>">
    <img src="public/uploads/<?= $advertisement->getImage()?>">
    <div>
        <h1><?= $advertisement->getName()." ".$advertisement->getSurname(); ?></h1>
        <p><?= $advertisement->getDescription(); ?></p>
        <h3><?= $advertisement->getTelephone(); ?></h3>
        <h5><?= $advertisement->getAddress(); ?></h5>
        <h4><?= $advertisement->getDate(); ?></h4>
        <div id="social-section">
            <i class="fas fa-heart"></i>
            <i class="fas fa-thumbs-up"> <?= $advertisement->getLike()?></i>
            <form id="order" action="order" method="GET">
                <i id="order" <button>umów się</button></i>
            </form>
        </div>
    </div>
</div>