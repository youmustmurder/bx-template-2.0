'use strict';

window.addEventListener('load', function () {
  var sliderLogosNode = document.querySelector('.reviews-logos'),
      sliderDescNode = document.querySelector('.reviews-desc');

  var handlerClickLogo = function handlerClickLogo(e) {
    var indexDesc = e.target.getAttribute('indexDesc');
    sliderDesc.goTo(indexDesc);
    e.preventDefault();
  };

  var sliderLogos = tns({
    container: sliderLogosNode,
    items: 3,
    gutter: 25,
    nav: false,
    controls: false,
    responsive: {
      400: {
        items: 4,
        gutter: 25
      }
    },
    onInit: function onInit() {
      var arraySlidesLogoNode = sliderLogosNode.querySelectorAll('.reviews-logos__item');
      Array.prototype.forEach.call(arraySlidesLogoNode, function (slide) {
        slide.addEventListener('click', handlerClickLogo);
      });
    }
  });
  var sliderDesc = tns({
    container: sliderDescNode,
    items: 1,
    nav: false,
    controls: false,
    autoHeight: true
  });
});