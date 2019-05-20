$(document).ready(function() {
    $('.js-init__menu--desktop').on('click', function(){
        if($(this).hasClass('fixed')){
            $.arcticmodal('close');
        }
        $('.head-nav__modal--desktop').arcticmodal({
            overlay: {
                css: {
                    backgroundColor: '#fff',
                    opacity: 1
                }
            },
            beforeOpen: function() {
                $('.head-nav__modal--desktop').show().addClass('animated').addClass('slideInUp');
                $('.js-init__menu--desktop').addClass('box-modal_close').addClass('fixed');
                $('.header__menu').css('margin-right', '44px');
            },
            afterOpen: function() {
                openModalFix();
            },
            beforeClose: function() {
                $('.js-init__menu--desktop').removeClass('fixed').removeClass('box-modal_close');
                $('.head-nav__modal--desktop').removeClass('slideInUp').addClass('slideOutDown');
                $('.header__menu').css('margin-right', '0px');
                closeModalFix();
            },
            afterClose: function () {
                $('.head-nav__modal--desktop').hide().removeClass('slideOutDown').removeClass('animated');
            }
        });
    });
});