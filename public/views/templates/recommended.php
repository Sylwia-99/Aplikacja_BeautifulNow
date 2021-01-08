<li class="glide__slide">
    <div id="<?= $advertisement->getId()?>">
        <img id="recommended1" src="public/uploads/<?= $advertisement->getImage()?>">
        <div id="recommended">
            <h2><?= $advertisement->getName()." ".$advertisement->getSurname()." - ".$advertisement->getJob(); ?></h2>
            <h3><?= $advertisement->getAddress().", ".$advertisement->getDate().", Kontakt: ".$advertisement->getTelephone(); ?></h3>
            <div id="social-section">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fas fa-heart"></i>
                <i class="fas fa-thumbs-up"> <?= $advertisement->getLike()?></i>
                <i <button>umów się</button></i>
            </div>
        </div>
    </div>
</li>
