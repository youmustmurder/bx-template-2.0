'use strict';

window.addEventListener('load', function () {
  var burgerNode = document.querySelector('.header-responsive__burger'),
      mobileMenuNode = document.querySelector('.mobile-menu');
  var openMenu = false;

  var toggleMenu = function toggleMenu() {
    openMenu = !openMenu;
    openMenu ? lockScroll() : unlockScroll();
    burgerNode.classList.toggle('header-responsive__burger_open');
    mobileMenuNode.classList.toggle('mobile-menu_open');
  };

  burgerNode.addEventListener('click', function () {
    toggleMenu();
  });
});