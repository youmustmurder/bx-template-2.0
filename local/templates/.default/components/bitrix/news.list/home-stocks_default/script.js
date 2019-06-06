'use strict';

window.addEventListener('load', function () {
  var sliderStock = function () {
    var sliderNode = document.querySelector('.slider-stocks__slider'),
        prevBtnNode = document.querySelector('.section-stocks__arrow_prev'),
        nextBtnNode = document.querySelector('.section-stocks__arrow_next'),
        navContainer = document.querySelector('.section-stocks-dots');
    var sliderBig = tns({
      container: sliderNode,
      items: 1,
      prevButton: prevBtnNode,
      nextButton: nextBtnNode,
      nav: true,
      navContainer: navContainer,
      autoHeight: true
    });
  }();
});