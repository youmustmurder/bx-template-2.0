window.onload = function () {
    document.querySelector('.header__search--desktop').addEventListener('click', function() {
        if(this.classList.contains('fixed')) {
            document.querySelector('.header__search--desktop').classList.remove("fixed");
            document.querySelector('.header__search-panel').classList.remove("open");
        } else {
        
            document.querySelector('.header__search--desktop').classList.add("fixed");
            document.querySelector('.header__search-panel').classList.add("open");
        }
    });
};
