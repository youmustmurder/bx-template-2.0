'use strict';

window.onload = function () {
  var headerToggleSearch = document.querySelector('.header-search-toggle'),
      headerSearchPanel = document.querySelector('.header-search-panel');
  headerToggleSearch.addEventListener('click', function () {
    headerToggleSearch.classList.toggle('header-search-toggle__fixed');
    headerSearchPanel.classList.toggle('header-search-panel_open');
  });
};