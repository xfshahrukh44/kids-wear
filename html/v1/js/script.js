$('.section-2-slider').owlCarousel({
    loop:true,
    margin:25,
    nav:true,
    autoplay:true,
    autoplayTimeout: 5000,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:4
        }
    }
})

$('.slide-1').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout: 5000,
    center: true,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

