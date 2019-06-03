window.addEventListener('load', () => {
	const sliderNode = document.querySelector('.slider-big-slides'),
		prevBtnNode = document.querySelector('.slider-big__prev'),
		nextBtnNode = document.querySelector('.slider-big__next'),
		previewsNode = document.querySelectorAll('.slider-big-preview');

	const togglePrevies = (newIndex) => {
		Array.prototype.forEach.call(previewsNode, (prev) => {
			prev.classList.remove('slider-big-preview--active');
		});
		document.querySelector(`.slider-big-preview[indexSlide="${newIndex}"]`).classList.add('slider-big-preview--active');
	};

	var sliderBig = tns({
		container: sliderNode,
		items: 1,
		controls: (typeof sliderNode.getAttribute('data-arrows') != 'undefined') ? (!!sliderNode.getAttribute('data-arrows')) : true,
		prevButton: prevBtnNode,
		nextButton: nextBtnNode,
		nav: false,
		autoHeight: true,
		autoplay: (typeof sliderNode.getAttribute('data-autoplay') != 'undefined') ? (!!sliderNode.getAttribute('data-autoplay')) : false,
		autoplayTimeout: (typeof sliderNode.getAttribute('data-speed') != 'undefined') ? (sliderNode.getAttribute('data-speed')) : 5000,
		autoplayButtonOutput: false,
		onInit: info => {
			togglePrevies(info.displayIndex-1);
		}
	});
	sliderBig.events.on('transitionStart', info => {
		togglePrevies((info.displayIndex)-1);
	});
	Array.prototype.forEach.call(previewsNode, (preview) => {
		preview.addEventListener('click', (e) => {
			const newIndex = e.target.getAttribute('indexSlide');
			togglePrevies(newIndex);
			sliderBig.goTo(newIndex);
		});
	});
});