'use strict';

window.addEventListener('load', function () {
  var mobileMenu = new HeaderMenu(document.querySelector('.header-responsive__burger'), document.querySelector('.mobile-menu'), {
    toggleActive: 'header-responsive__burger_open',
    targetActive: 'mobile-menu_open'
  });
  mobileMenu.init();
});