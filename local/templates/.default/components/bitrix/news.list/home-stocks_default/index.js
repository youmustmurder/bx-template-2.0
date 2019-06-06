window.addEventListener('load', () => {
	var sliderStock = (() => {
		const sliderNode = document.querySelector('.slider-stocks__slider'),
			prevBtnNode = document.querySelector('.section-stocks__arrow_prev'),
			nextBtnNode = document.querySelector('.section-stocks__arrow_next'),
			navContainer = document.querySelector('.section-stocks-dots');

		var sliderBig = tns({
			container: sliderNode,
			items: 1,
			prevButton: prevBtnNode,
			nextButton: nextBtnNode,
			nav: true,
			navContainer,
			autoHeight: true
		});
	})();
});