var	bodyScrollTop = null,
	bodyLocked = false;

export function lockScroll(bodyFixed = true) {
	if (!bodyLocked) {
		var body = document.querySelector('body');
		bodyScrollTop = (typeof window.pageYOffset !== 'undefined') ? window.pageYOffset: (document.documentElement || document.body.parentNode || document.body).scrollTop;
		body.classList.add('body-block');
		(bodyFixed) ? body.style.position = 'fixed' : body.style.position = 'unset';
		body.style.top = `${bodyScrollTop}px`;
		bodyLocked = true;
	}
}

export function unlockScroll() {
	if (bodyLocked) {
		var body = document.querySelector('body');
		body.classList.remove('body-block');
		body.style.position = 'unset';
		body.style.top = null;
		window.scrollTo(0, bodyScrollTop);
		bodyLocked = false;
	}
}