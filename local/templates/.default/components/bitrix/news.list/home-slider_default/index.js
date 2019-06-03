window.addEventListener('load', () => {
	const sliderNode = document.querySelector('.slider-big__slides'),
		prevBtnNode = document.querySelector('.slider-big__prev'),
		nextBtnNode = document.querySelector('.slider-big__next'),
		navContainer = document.querySelector('.slide-big-dots');

	var sliderBig = tns({
		container: sliderNode,
		items: 1,
		prevButton: prevBtnNode,
		nextButton: nextBtnNode,
		nav: true,
		navContainer,
		autoHeight: true,
		// autoplay: (typeof sliderNode.getAttribute('data-autoplay') != 'undefined') ? (!!sliderNode.getAttribute('data-autoplay')) : false,
		// autoplayTimeout: (typeof sliderNode.getAttribute('data-speed') != 'undefined') ? (!!sliderNode.getAttribute('data-speed')) : 5000,
		autoplayButtonOutput: false
	});
});