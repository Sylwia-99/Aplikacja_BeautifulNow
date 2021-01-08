const config = {
    type: 'carousel',
    perView:3,
    breakpoints:{
        1024:{
            perView: 1
        },
        600:1
    }
}
new Glide('.glide', config).mount()