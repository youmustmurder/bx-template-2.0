'use strict';

window.onload = function () {
  var headerMenu = new HeaderMenu(document.querySelector('.header__hamburger'), document.querySelector('.header-menu'), {
    toggleActive: 'header__hamburger_fixed',
    targetActive: 'header-menu__show'
  });
  headerMenu.init();
};