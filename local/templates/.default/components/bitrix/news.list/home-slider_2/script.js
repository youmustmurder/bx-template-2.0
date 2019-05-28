'use strict';

window.addEventListener('load', function () {
  var sliderNode = document.querySelector('.slider-big-slides'),
      prevBtnNode = document.querySelector('.slider-big__prev'),
      nextBtnNode = document.querySelector('.slider-big__next'),
      previewsNode = document.querySelectorAll('.slider-big-preview');

  var togglePrevies = function togglePrevies(newIndex) {
    Array.prototype.forEach.call(previewsNode, function (prev) {
      prev.classList.remove('slider-big-preview--active');
    });
    document.querySelector(".slider-big-preview[indexSlide=\"".concat(newIndex, "\"]")).classList.add('slider-big-preview--active');
  };

  var sliderBig = tns({
    container: sliderNode,
    items: 1,
    prevButton: prevBtnNode,
    nextButton: nextBtnNode,
    nav: false,
    autoHeight: true,
    onInit: function onInit(info) {
      togglePrevies(info.displayIndex - 1);
    }
  });
  sliderBig.events.on('transitionStart', function (info) {
    togglePrevies(info.displayIndex - 1);
  });
  Array.prototype.forEach.call(previewsNode, function (preview) {
    preview.addEventListener('click', function (e) {
      var newIndex = e.target.getAttribute('indexSlide');
      togglePrevies(newIndex);
      sliderBig.goTo(newIndex);
    });
  });
});