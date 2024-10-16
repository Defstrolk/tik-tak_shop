const tl = gsap.timeline()

tl.fromTo('.moto1' , {
    y: 75,
    opacity: 0,
},{
    y:0,
    opacity: 1,
    duration: 0.5
}).fromTo('.action',{
    y: 75,
    opacity: 0,
},{
    y:0,
    opacity: 1,
    duration: 0.5
})
// .fromTo('.action1',{
//     y: 75,
//     opacity: 0,
// },{
//     y:0,
//     opacity: 1,
//     duration: 0.5
// })
