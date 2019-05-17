window.addEventListener('load', () => {
	const sliderNode = document.querySelector('.slider-big__slides'),
		prevBtnNode = document.querySelector('.slider-big__prev'),
		nextBtnNode = document.querySelector('.slider-big__next');
		
	var sliderBig = tns({
		container: sliderNode,
		items: 1,
		prevButton: prevBtnNode,
		nextButton: nextBtnNode,
		nav: false,
	});
});