const tl = gsap.timeline()

tl.fromTo('.moto1' , {
    y: 75,
    opacity: 0,
},{
    y:0,
    opacity: 1,
    duration: 1,
})
.fromTo('.slider-wrapper',{
    opacity: 0,
},{
    opacity: 1,
    duration: 1
})
.fromTo('#myBtn',{
    opacity:0,
    rotation: -360 ,
},{
    opacity:1,
    rotation: 0 ,
    duration: 0.4
})

