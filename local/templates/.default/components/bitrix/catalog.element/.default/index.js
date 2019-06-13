window.addEventListener('load', () => {
	var productPage = (() => {
		const sliderPreviewsNode = document.querySelector('.product-slider-previews'),
			sliderBigNode = document.querySelector('.product-slider__big');

		const toggleActiveSliderReviews = () => {
			var info = sliderPreviews.getInfo(),
				indexPrev = info.indexCached,
				indexCurrent = info.index;

			info.slideItems[indexPrev].classList.remove('product-slider-previews-slide_active');
			info.slideItems[indexCurrent].classList.add('product-slider-previews-slide_active');
		};

		var sliderPreviews = new tns({
				container: sliderPreviewsNode,
				items: 4,
				gutter: 10,
				nav: false,
				controls: false,
				axis: 'vertical',
				onInit: (info) => {
					var indexPrev = info.indexCached,
						indexCurrent = info.index;

					info.slideItems[indexPrev].classList.remove('product-slider-previews-slide_active');
					info.slideItems[indexCurrent].classList.add('product-slider-previews-slide_active');
				},
			}),
			sliderBig = new tns({
				container: sliderBigNode,
				items: 1,
				controls: false,
				nav: false,
				mode: 'gallery',
			});

		Array.prototype.forEach.call(sliderPreviews.getInfo().slideItems, (slide, index) => {
			slide.addEventListener('click', () => {
				var indexSlide = slide.getAttribute('data-index');
				sliderBig.goTo(indexSlide);
				sliderPreviews.goTo(indexSlide);
				toggleActiveSliderReviews();
			});
		});

		var settingsTabs = new Tabs(document.querySelector('.product-tabs'));
		settingsTabs.init();
	})();
});