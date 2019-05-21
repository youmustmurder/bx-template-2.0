var	bodyScrollTop = null,
	bodyLocked = false;

export function lockScroll() {
	if (!bodyLocked) {
		console.log('lock');
		var body = document.querySelector('body');
		bodyScrollTop = (typeof window.pageYOffset !== 'undefined') ? window.pageYOffset: (document.documentElement || document.body.parentNode || document.body).scrollTop;
		body.classList.add('body-block');
		body.style.top = `${bodyScrollTop}px`;
		bodyLocked = true;
	}
}

export function unlockScroll() {
	if (bodyLocked) {
		console.log('unlock');
		var body = document.querySelector('body');
		body.classList.remove('body-block');
		body.style.top = null;
		window.scrollTo(0, bodyScrollTop);
		bodyLocked = false;
	}
}