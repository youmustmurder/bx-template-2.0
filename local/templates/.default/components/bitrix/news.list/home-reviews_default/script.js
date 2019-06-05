'use strict';

window.addEventListener('load', function () {
  var sliderReviewsPhotosNode = document.querySelector('.reviews-photo-list'),
      sliderReviewsDescNode = document.querySelector('.reviews-main-list'),
      sliderReviewsPrevBtnNode = document.querySelector('.reviews__arrow_prev'),
      sliderReviewsNextBtnNode = document.querySelector('.reviews__arrow_next');

  var toggleActiveSliderReviews = function toggleActiveSliderReviews() {
    var info = sliderReviewsPhotos.getInfo(),
        indexPrev = info.indexCached,
        indexCurrent = info.index;
    info.slideItems[indexPrev].classList.remove('reviews-photo-list-item_active');
    info.slideItems[indexCurrent].classList.add('reviews-photo-list-item_active');
  };

  var sliderReviewsPhotos = tns({
    container: sliderReviewsPhotosNode,
    items: 1,
    gutter: 20,
    nav: false,
    prevButton: sliderReviewsPrevBtnNode,
    nextButton: sliderReviewsNextBtnNode,
    responsive: {
      490: {
        items: 4
      },
      370: {
        items: 2
      }
    },
    onInit: function onInit(info) {
      var indexPrev = info.indexCached,
          indexCurrent = info.index;
      info.slideItems[indexPrev].classList.remove('reviews-photo-list-item_active');
      info.slideItems[indexCurrent].classList.add('reviews-photo-list-item_active');
    }
  });
  var sliderReviewsDesc = tns({
    container: sliderReviewsDescNode,
    nav: false,
    items: 1,
    autoHeight: true,
    prevButton: sliderReviewsPrevBtnNode,
    nextButton: sliderReviewsNextBtnNode,
    mode: 'gallery'
  });
  sliderReviewsPhotos.events.on('indexChanged', function () {
    toggleActiveSliderReviews();
  });
  Array.prototype.forEach.call(sliderReviewsPhotos.getInfo().slideItems, function (slide, index) {
    slide.addEventListener('click', function () {
      var indexSlide = slide.getAttribute('data-index');
      sliderReviewsDesc.goTo(indexSlide);
      sliderReviewsPhotos.goTo(indexSlide);
      toggleActiveSliderReviews();
    });
  });
});