'use strict';

window.addEventListener('load', function () {
  var sliderLogosNode = document.querySelector('.reviews-logos'),
      sliderDescNode = document.querySelector('.reviews-desc');
  var sliderLogos = tns({
    container: sliderLogosNode,
    items: 4,
    nav: false,
    controls: false,
    autoWidth: true,
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
    controls: false
  });

  var handlerClickLogo = function handlerClickLogo(e) {
    var indexDesc = e.target.getAttribute('indexDesc');
    sliderDesc.goTo(indexDesc);
    e.preventDefault();
  };
});