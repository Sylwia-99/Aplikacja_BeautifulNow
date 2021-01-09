const loveButtons = document.querySelectorAll(".fa-heart");

function functionFavourite(){
    const loves = this;
    const container = loves.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/addToFavourite/${id}`)
        .then(function (){
            loves.classList.add('fav');
        })
}

loveButtons.forEach(button => button.addEventListener("click", functionFavourite));