window.addEventListener('load', () => {
	const sliderReviewsPhotosNode = document.querySelector('.reviews-photo-list'),
		sliderReviewsDescNode = document.querySelector('.reviews-main-list');

	// const handlerClickLogo = (e) => {
	// 	const indexDesc = e.target.getAttribute('indexDesc');
	// 	sliderDesc.goTo(indexDesc);
	// 	e.preventDefault();
	// };

	var sliderReviewsPhotos = tns({
		container: sliderReviewsPhotosNode,
		items: 4,
		gutter: 20,
		nav: false,
		controls: false,
		// onInit: () => {
		// 	const arraySlidesLogoNode = sliderLogosNode.querySelectorAll('.reviews-logos__item');
		// 	Array.prototype.forEach.call(arraySlidesLogoNode, (slide) => {
		// 		slide.addEventListener('click', handlerClickLogo);
		// 	});
		// }
	});
	var sliderReviewsDesc = tns({
		container: sliderReviewsDescNode,
		items: 1,
		nav: false,
		controls: false,
		autoHeight: true,
	});
});