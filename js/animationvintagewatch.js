const tl = gsap.timeline()

tl.fromTo('.product-card' , {
    y: 75,
    opacity: 0,
},{
    y:0,
    opacity: 1,
    duration: 1,
    stagger:0.2,
})

