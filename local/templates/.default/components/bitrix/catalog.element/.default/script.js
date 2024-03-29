'use strict';

window.addEventListener('load', function () {
  var productPage = function () {
    var sliderPreviewsNode = document.querySelector('.product-slider-previews'),
        sliderBigNode = document.querySelector('.product-slider__big'),
        anchorProduct = document.querySelectorAll('.anchor-product');

    var clickAnchorProduct = function clickAnchorProduct(e) {
      clickAnchorLink(e);
      var target = e.target.getAttribute('href');
      var tabTarget = document.querySelector('[data-target="' + target + '"]').parentNode;
      tabTarget.click();
    };

    Array.prototype.forEach.call(anchorProduct, function (anchor) {
      anchor.addEventListener('click', clickAnchorProduct);
    });

    var toggleActiveSliderReviews = function toggleActiveSliderReviews() {
      var info = sliderPreviews.getInfo(),
          indexPrev = info.indexCached,
          indexCurrent = info.index;
      info.slideItems[indexPrev].classList.remove('product-slider-previews-slide_active');
      info.slideItems[indexCurrent].classList.add('product-slider-previews-slide_active');
    };

    var sliderPreviews = null,
        media = window.matchMedia('(max-width: 768px)');
    initSliderPreview(media);
    media.addListener(initSliderPreview);

    function initSliderPreview(x) {
      var axis = '';
      x.matches ? axis = 'horizontal' : axis = 'vertical';

      if (sliderPreviews != null) {
        sliderPreviews.destroy();
        sliderPreviewsNode = document.querySelector('.product-slider-previews');
      }

      sliderPreviews = new tns({
        container: sliderPreviewsNode,
        items: 4,
        gutter: 10,
        nav: false,
        controls: false,
        axis: axis,
        onInit: function onInit(info) {
          var indexPrev = info.indexCached,
              indexCurrent = info.index;
          info.slideItems[indexPrev].classList.remove('product-slider-previews-slide_active');
          info.slideItems[indexCurrent].classList.add('product-slider-previews-slide_active');
        }
      });
      Array.prototype.forEach.call(sliderPreviews.getInfo().slideItems, function (slide, index) {
        slide.addEventListener('click', function () {
          var indexSlide = slide.getAttribute('data-index');
          sliderBig.goTo(indexSlide);
          sliderPreviews.goTo(indexSlide);
          toggleActiveSliderReviews();
        });
      });
    }

    ;
    var sliderBig = new tns({
      container: sliderBigNode,
      items: 1,
      controls: false,
      nav: false,
      mode: 'gallery'
    });
    var settingsTabs = new Tabs(document.querySelector('.product-tabs'));
    settingsTabs.init();
  }();
});