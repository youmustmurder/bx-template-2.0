'use strict';

window.addEventListener('load', function () {
  var sliderNode = document.querySelector('.slider-big-slides'),
      prevBtnNode = document.querySelector('.slider-big__prev'),
      nextBtnNode = document.querySelector('.slider-big__next'),
      previewsSliderNode = document.querySelector('.slider-big__previews'),
      previewsNode = document.querySelectorAll('.slider-big-preview');
  var sliderBig = tns({
    container: sliderNode,
    items: 1,
    controls: typeof sliderNode.getAttribute('data-arrows') != 'undefined' ? !!sliderNode.getAttribute('data-arrows') : true,
    prevButton: prevBtnNode,
    nextButton: nextBtnNode,
    nav: false,
    autoHeight: true,
    // autoplay: (typeof sliderNode.getAttribute('data-autoplay') != 'undefined') ? (!!sliderNode.getAttribute('data-autoplay')) : false,
    // autoplayTimeout: (typeof sliderNode.getAttribute('data-speed') != 'undefined') ? (sliderNode.getAttribute('data-speed')) : 5000,
    autoplayButtonOutput: false
  });
  var sliderPreviews = tns({
    container: previewsSliderNode,
    items: 3,
    nav: false,
    prevButton: prevBtnNode,
    nextButton: nextBtnNode,
    onInit: function onInit(info) {
      updateSliderPrevies(info);
    }
  });
  sliderBig.events.on('indexChanged', function () {
    updateSliderPrevies(sliderPreviews.getInfo());
  });

  function updateSliderPrevies(info) {
    var indexPrev = info.indexCached,
        indexCurrent = info.index;
    info.slideItems[indexPrev].classList.remove('slider-big-preview_active');
    info.slideItems[indexCurrent].classList.add('slider-big-preview_active');
    console.log(info);
  }

  Array.prototype.forEach.call(sliderPreviews.getInfo().slideItems, function (preview) {
    preview.addEventListener('click', function (e) {
      var newIndex = e.target.getAttribute('indexslide');
      sliderBig.goTo(newIndex);
      sliderPreviews.goTo(newIndex);
      updateSliderPrevies(sliderPreviews.getInfo());
    });
  });
});