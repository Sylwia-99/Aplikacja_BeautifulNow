const orderButtons = document.querySelectorAll("#order");

function ordered(){
    const order = this;
    const container = order.parentElement.parentElement.parentElement;
    const id = container.getAttribute("id");

    fetch(`/order/${id}`)
        .then(function (){
            order.classList.add('ordered');
        })
}

orderButtons.forEach(button => button.addEventListener("click", ordered));
