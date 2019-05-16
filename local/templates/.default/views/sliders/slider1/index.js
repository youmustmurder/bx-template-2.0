window.addEventListener('load', () => {
	const slider = document.querySelector('.slider-big'),
		nav = document.querySelector('.slide-big__nav'),
		prevBtn = document.querySelector('.slider-big__prev'),
		nextBtn = document.querySelector('.slider-big__next');
	var sliderBig = tns({
		container: '.slider-big-slides',
		items: 1,
		prevButton: prevBtn,
		nextButton: nextBtn,
		nav: false,
		onInit: info => {
			positionNav(slider, nav, info);
		}
	});
	sliderBig.events.on('transitionStart', info => {
		positionNav(slider, nav, info);
	});
	window.addEventListener('resize', debounce(() => {
		positionNav(slider, nav, sliderBig.getInfo());
	}, 300));
});

const positionNav = (slider, nav, info) => {
	const right = -1 * (slider.getBoundingClientRect().left - document.querySelector('.container').getBoundingClientRect().left) + 15;
	const nums = slider.querySelectorAll('.slider-slide')[info.displayIndex].querySelector('.slider-slide-numbers');
	const top = -1 * (slider.getBoundingClientRect().top - nums.getBoundingClientRect().top);
	nav.style.top = `${top}px`;
	nav.style.right = `${right}px`;
};
