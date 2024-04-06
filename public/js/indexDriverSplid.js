new Splide('.splide_default', {
    type: 'loop',
    perPage: 3,
    perMove: 1,
    autoplay: true,
    interval: 2000,
    pagination: false,
}).mount();

new Splide('.splide_mobile', {
    type: 'loop',
    perPage: 2,
    perMove: 1,
    focus: 'center',
    autoplay: true,
    pagination: false,
}).mount();

new Splide('.splide_mobile_800', {
    type: 'loop',
    perPage: 1,
    perMove: 1,
    autoplay: true,
    pagination: false,
}).mount();

var splide = new Splide('.splide_callendar', {
    direction: 'ttb',
    height: '100%',
    perPage: 4,
    perMover: 2,
    pagination: false,
    arrows: false, // Desativa as setas de navegação
    drag: true, // Permite navegação por meio do scroll
    wheel: true, // Ativa a navegação por meio do scroll
}).mount();