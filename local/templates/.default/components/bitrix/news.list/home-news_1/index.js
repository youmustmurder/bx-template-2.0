window.addEventListener('load', () => {
	const slider = document.querySelector('.news__slides'),
		prevBtn = document.querySelector('.news__nav--prev'),
		nextBtn = document.querySelector('.news__nav--next'),
		navContainer = document.querySelector('.news-dots');

	var sliderBig = tns({
		container: '.news__slides',
		items: 1,
		prevButton: prevBtn,
		nextButton: nextBtn,
		nav: true,
		navContainer,
		responsive: {
			768: {
				items: 3
			},
			576: {
				items: 2
			},
			320: {
				items: 1
			}
		}
	});
});

