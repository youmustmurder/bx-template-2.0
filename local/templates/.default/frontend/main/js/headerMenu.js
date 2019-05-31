import { lockScroll, unlockScroll } from './bodyBlock';

class HeaderMenu {
	constructor(toggleSource, toggleTarget, classes) {
		this.toggleSource = toggleSource;
		this.toggleTarget = toggleTarget;
		this.classes = { ...classes };
		this.openMenu = false;
	}
	init() {
		this.toggleSource.addEventListener('click', () => {
			this.toggleMenu();
		});
	}
	toggleMenu() {
		this.openMenu = !this.openMenu;
		(this.openMenu) ? lockScroll() : unlockScroll();
		this.toggleSource.classList.toggle(this.classes.toggleActive);
		this.toggleTarget.classList.toggle(this.classes.targetActive);
	};
}

export default HeaderMenu;