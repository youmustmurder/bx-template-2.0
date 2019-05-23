window.addEventListener('load', () => {
	const sliderNode = document.querySelector('.slider-big-slides'),
		navNode = sliderNode.querySelector('.slide-big__nav'),
		prevBtnNode = document.querySelector('.slider-big__prev'),
		nextBtnNode = document.querySelector('.slider-big__next'),
		previewsNode = document.querySelectorAll('.slider-big-preview');
	var sliderBig = tns({
		container: sliderNode,
		items: 1,
		prevButton: prevBtnNode,
		nextButton: nextBtnNode,
		nav: false,
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

	const togglePrevies = (newIndex) => {
		Array.prototype.forEach.call(previewsNode, (prev) => {
			prev.classList.remove('slider-big-preview--active');
		});
		document.querySelector(`.slider-big-preview[indexSlide="${newIndex}"]`).classList.add('slider-big-preview--active');
	};
});