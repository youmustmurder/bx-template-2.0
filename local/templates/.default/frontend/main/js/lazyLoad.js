import debounce from './debounce';

const lazyLoad = (() => {
	document.addEventListener('DOMContentLoaded', function() {
		var lazyImages = document.querySelectorAll('img[lazy-image]');
		function handlerLazyLoadImages() {
			Array.prototype.forEach.call(lazyImages, function(img) {
				if ((img.getBoundingClientRect().top <= window.innerHeight && img.getBoundingClientRect().bottom >= 0) && getComputedStyle(img).display != 'none') {
					setImage(img);
				}
			});
			lazyImages = document.querySelectorAll('img[lazy-image]:not([data-loaded="true"])');
		}
		function setImage(img) {
			const src = img.getAttribute('lazy-image');
			img.setAttribute('data-loaded', 'true');
			fetch(src, {
				method: 'GET'
			}).then(res => {
				img.setAttribute('src', src);
				img.classList.remove('lazy-image');
				img.removeAttribute('lazy-image');
			}).catch(err => {
				console.log(err);
			});
		}
		handlerLazyLoadImages();
		document.addEventListener('scroll', debounce(handlerLazyLoadImages, 300, false));
		window.addEventListener('resize', debounce(handlerLazyLoadImages, 300, false));
		window.addEventListener('orientationchange', debounce(handlerLazyLoadImages, 300, false));
	});
})();

export default lazyLoad;