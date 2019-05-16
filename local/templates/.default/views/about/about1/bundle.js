'use strict';

window.addEventListener('load', function () {
  var slider = document.querySelector('.slider-big'),
      nav = document.querySelector('.slide-big__nav'),
      prevBtn = document.querySelector('.slider-big__prev'),
      nextBtn = document.querySelector('.slider-big__next');
  var sliderBig = tns({
    container: '.slider-big-slides',
    items: 1,
    prevButton: prevBtn,
    nextButton: nextBtn,
    nav: false,
    onInit: function onInit(info) {
      positionNav(slider, nav, info);
    }
  });
  sliderBig.events.on('transitionStart', function (info) {
    positionNav(slider, nav, info);
  });
});

var positionNav = function positionNav(slider, nav, info) {
  var right = -1 * (slider.getBoundingClientRect().left - document.querySelector('.container').getBoundingClientRect().left);
  var nums = slider.querySelectorAll('.slider-slide')[info.displayIndex].querySelector('.slider-slide-numbers');
  var top = -1 * (slider.getBoundingClientRect().top - nums.getBoundingClientRect().top);
  nav.style.top = "".concat(top, "px");
  nav.style.right = "".concat(right, "px");
};