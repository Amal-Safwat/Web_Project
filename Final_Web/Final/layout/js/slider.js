var slideNumber = 1;
var slides = document.querySelectorAll('.slider .slide');
var maxPageSlide = slides.length;
var rightButton = document.getElementById('right-slide');
var leftButton = document.getElementById('left-slide');

function slide() {
  document.getElementById('slider').style.left = -(slideNumber - 1) * 100 + "%";
  console.log(slideNumber);
}
rightButton.addEventListener('click', function() {
  slideNumber++;
  if (slideNumber > maxPageSlide) {
    slideNumber = 1;
  }
  slide();
})
leftButton.addEventListener('click', function() {
  slideNumber--;
  if (slideNumber <= 0) {
    slideNumber = maxPageSlide;
  }
  slide();
});