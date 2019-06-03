window.addEventListener('load', () => {
	const slider = document.querySelector('.slider-big'),
		nav = document.querySelector('.slide-big__nav'),
		prevBtn = document.querySelector('.slider-big__prev'),
		nextBtn = document.querySelector('.slider-big__next');

	const positionNav = (info) => {
		var right = -1 * (slider.getBoundingClientRect().left - document.querySelector('.tns-slide-active .slider-slider__inner').getBoundingClientRect().left - 15),
			nums = slider.querySelectorAll('.slider-slide')[info.displayIndex].querySelector('.slider-slide-numbers'),
			top;
		if (nums != null) {
			top = -1 *(slider.getBoundingClientRect().top - nums.getBoundingClientRect().top) + 'px';
		} else {
			top = 'calc(100% - 110px)';
		}
		nav.style.top = top;
		nav.style.right = `${right}px`;
	};

	var sliderBig = tns({
		container: '.slider-big-slides',
		items: 1,
		prevButton: prevBtn,
		nextButton: nextBtn,
		nav: false,
		autoHeight: true,
		// autoplay: (typeof sliderNode.getAttribute('data-autoplay') != 'undefined') ? (!!sliderNode.getAttribute('data-autoplay')) : false,
		// autoplayTimeout: (typeof sliderNode.getAttribute('data-speed') != 'undefined') ? (!!sliderNode.getAttribute('data-speed')) : 5000,
		autoplayButtonOutput: false,
		onInit: info => {
			positionNav(info);
		}
	});
	sliderBig.events.on('transitionEnd', info => {
		positionNav(info);
	});
	window.addEventListener(
		'resize',
		debounce(() => {
			positionNav(slider, nav, sliderBig.getInfo());
		}, 300)
	);
});