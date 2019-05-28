'use strict';

window.addEventListener('load', function () {
  var slider = document.querySelector('.slider-big'),
      nav = document.querySelector('.slide-big__nav'),
      prevBtn = document.querySelector('.slider-big__prev'),
      nextBtn = document.querySelector('.slider-big__next');

  var positionNav = function positionNav(info) {
    var right = -1 * (slider.getBoundingClientRect().left - document.querySelector('.tns-slide-active .slider-slider__inner').getBoundingClientRect().left - 15),
        nums = slider.querySelectorAll('.slider-slide')[info.displayIndex].querySelector('.slider-slide-numbers'),
        top;

    if (nums != null) {
      top = -1 * (slider.getBoundingClientRect().top - nums.getBoundingClientRect().top) + 'px';
    } else {
      top = 'calc(100% - 110px)';
    }

    nav.style.top = top;
    nav.style.right = "".concat(right, "px");
  };

  var sliderBig = tns({
    container: '.slider-big-slides',
    items: 1,
    prevButton: prevBtn,
    nextButton: nextBtn,
    nav: false,
    autoHeight: true,
    onInit: function onInit(info) {
      positionNav(info);
    }
  });
  sliderBig.events.on('transitionEnd', function (info) {
    positionNav(info);
  });
  window.addEventListener('resize', debounce(function () {
    positionNav(slider, nav, sliderBig.getInfo());
  }, 300));
});