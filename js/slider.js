let sliderIndex = 1;
showSlides(sliderIndex);

function plusSlides(n) {
  showSlides((sliderIndex += n));
}
function currentSlide(n) {
  showSlides((sliderIndex = n));
}
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySleder");

  if (n > slides.length) {
    sliderIndex = 1;
  }
  if (n < 1) {
    sliderIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[sliderIndex - 1].style.display = "block";
}

let timer = setInterval(function(){
  sliderIndex++;
  showSlides(sliderIndex);
},5000);





// function screen_resize() {
//   var w = parseInt(window.innerWidth);

//   if (w <= 500) {
//     const h1 = document.querySelector(".mySleder");

//     const parent = mySleder.parentNode;

//     parent.removeChild(mySleder);
//   }
// }
