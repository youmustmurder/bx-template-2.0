class Tabs {
	constructor(el) {
		this.el = el;
		this.toggles = el.querySelectorAll('.tabs__toggle');
		this.contents = el.querySelectorAll('.tabs__content');
	}
	init() {
		Array.prototype.forEach.call(this.toggles, (toggle) => {
			toggle.addEventListener('click', (e) => this.toggle(e));
		});
	}
	toggle(e) {
		this.resetActive();
		var { target } = e,
			dataTarget = target.querySelector('button').getAttribute('data-target');

		target.classList.add('tabs__toggle_active');
		target.setAttribute('aria-expanded', true);
		this.el.querySelector(dataTarget).classList.add('tabs__content_active');
	}
	resetActive() {
		Array.prototype.forEach.call(this.toggles, (toggle) => {
			let activeToggle = this.el.querySelector('.tabs__toggle_active');
			if (activeToggle != null) {
				activeToggle.classList.remove('tabs__toggle_active');
				activeToggle.setAttribute('aria-expanded', false);
			}
		});
		Array.prototype.forEach.call(this.contents, (content) => {
			let activeContent = this.el.querySelector('.tabs__content_active');
			if (activeContent != null) {
				activeContent.classList.remove('tabs__content_active');
			}
		});
	}
}

export default Tabs;