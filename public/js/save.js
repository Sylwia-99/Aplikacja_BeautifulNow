const saveButtons = document.querySelectorAll(".fa-save");

function saved(){
    const save = this;
    const container = save.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/addToSaved/${id}`)
        .then(function (){
            save.classList.add('fav');
        })
}

saveButtons.forEach(button => button.addEventListener("click", saved));