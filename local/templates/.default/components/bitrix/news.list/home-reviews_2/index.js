window.addEventListener('load', () => {
	const sliderLogosNode = document.querySelector('.reviews-logos'),
		sliderDescNode = document.querySelector('.reviews-desc');

	var sliderLogos = tns({
		container: sliderLogosNode,
		items: 4,
		nav: false,
		controls: false,
		autoWidth: true,
		onInit: () => {
			const arraySlidesLogoNode = sliderLogosNode.querySelectorAll('.reviews-logos__item');
			Array.prototype.forEach.call(arraySlidesLogoNode, (slide) => {
				slide.addEventListener('click', handlerClickLogo);
			});
		}
	});
	var sliderDesc = tns({
		container: sliderDescNode,
		items: 1,
		nav: false,
		controls: false
	});
	const handlerClickLogo = (e) => {
		const indexDesc = e.target.getAttribute('indexDesc');
		sliderDesc.goTo(indexDesc);
		e.preventDefault();
	};
});