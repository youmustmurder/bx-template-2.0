window.onload = function () {
	const headerToggleSearch = document.querySelector('.header-search-toggle'),
		headerSearchPanel = document.querySelector('.header-search-panel');

	headerToggleSearch.addEventListener('click', function() {
		headerToggleSearch.classList.toggle('header-search-toggle__fixed');
		headerSearchPanel.classList.toggle('header-search-panel_open');
	});

	const headerMenu = new HeaderMenu(document.querySelector('.header__hamburger'), document.querySelector('.header-menu'), { toggleActive: 'header__hamburger_fixed', targetActive: 'header-menu__show' });
	headerMenu.init();
};