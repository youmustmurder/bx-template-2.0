window.addEventListener('load', () => {
	const sliderLogosNode = document.querySelector('.reviews-logos'),
		sliderDescNode = document.querySelector('.reviews-desc');

	const handlerClickLogo = (e) => {
		const indexDesc = e.target.getAttribute('indexDesc');
		sliderDesc.goTo(indexDesc);
		e.preventDefault();
	};

	var sliderLogos = tns({
		container: sliderLogosNode,
		items: 3,
		gutter: 25,
		nav: false,
		controls: false,
		responsive: {
			400: {
				items: 4,
				gutter: 25,
			}
		},
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
		controls: false,
		autoHeight: true,
	});
});