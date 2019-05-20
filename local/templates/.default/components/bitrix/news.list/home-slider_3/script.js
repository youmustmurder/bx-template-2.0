'use strict';

window.addEventListener('load', function () {
  var sliderNode = document.querySelector('.slider-big__slides'),
      prevBtnNode = document.querySelector('.slider-big__prev'),
      nextBtnNode = document.querySelector('.slider-big__next'),
      navContainer = document.querySelector('.slide-big-dots');
  var sliderBig = tns({
    container: sliderNode,
    items: 1,
    prevButton: prevBtnNode,
    nextButton: nextBtnNode,
    nav: true,
    navContainer: navContainer
  });
});