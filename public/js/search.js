const search = document.querySelector('input[placeholder="Adres, np. Armi Krajowej 1"]');
const advertisementContainer = document.querySelector(".search");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (advertisementpage) {
            advertisementContainer.innerHTML = "";
            loadAdvertisements(advertisementpage)
        });
    }
});

function loadAdvertisements(advertisementpage) {
    advertisementpage.forEach(advertisement => {
        console.log(advertisement);
        createAdvertisement(advertisement);
    });
}

function createAdvertisement(advertisement) {
    const template = document.querySelector("#advertisement-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = advertisement.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${advertisement.image}`;
    const nameAndSurname = clone.querySelector("h1");
    nameAndSurname.innerHTML = [advertisement.name, advertisement.surname];
    const profession = clone.querySelector("h2");
    profession.innerHTML = advertisement.profession;
    const description = clone.querySelector("p");
    description.innerHTML = advertisement.description;
    const telephone = clone.querySelector("h3");
    telephone.innerHTML = advertisement.telephone;
    const address = clone.querySelector("h5");
    address.innerHTML = advertisement.address;

    const instagram = clone.querySelector(".fa-instagram");
    instagram.innerText = advertisement.instagram;
    const twitter = clone.querySelector(".fa-twitter");
    twitter.innerText = advertisement.twitter;
    const facebook = clone.querySelector(".fa-facebook-f");
    facebook.innerText = advertisement.facebook;

    advertisementContainer.appendChild(clone);
}