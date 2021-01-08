const address = document.querySelector('input[placeholder="Adres, np. Armi Krajowej 1"]');
const advertisementContainer = document.querySelector(".search");

const button = document.querySelector('#ss');

function functionSearch(){
    const data = {
        address: address.value
    };

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (advertisements) {
        advertisementContainer.innerHTML = "";
        loadAdvertisements(advertisements)
    });
}

button.addEventListener("click", functionSearch);


function loadAdvertisements(advertisements) {
    advertisements.forEach(advertisement => {
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
    nameAndSurname.innerHTML = `${advertisement.name}  ${advertisement.surname}`;
    const profession = clone.querySelector("h2");
    profession.innerHTML = advertisement.profession;
    const description = clone.querySelector("p");
    description.innerHTML = advertisement.description;
    const telephone = clone.querySelector("h3");
    telephone.innerHTML = advertisement.telephone;
    const address = clone.querySelector("h5");
    address.innerHTML = advertisement.address;
    const date = clone.querySelector("h4");
    date.innerHTML = advertisement.date;

    clone.querySelector(".fa-instagram");
    clone.querySelector(".fa-facebook-f");
    clone.querySelector(".fa-heart");
    //favourite.innerText = advertisement.favourite;
    const like = clone.querySelector(".fa-thumbs-up");
    like.innerText = advertisement.like;
    clone.querySelector(".order");
    advertisementContainer.appendChild(clone);
}