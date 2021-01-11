const deleteButtons = document.querySelectorAll(".fa-trash");

function deleted(){
    const del = this;
    const container = del.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/deleteAdvertisement/${id}`)
        .then(function (){
            del.classList.add('ordered');
        })
}

deleteButtons.forEach(button => button.addEventListener("click", deleted));