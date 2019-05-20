import customSelect from "../../../frontend/main/js/customSelect";

window.addEventListener('load', () => {
    var tabsBtns = document.querySelectorAll('.js-tab-trigger');
    
    function tabSelection(e) {
        var id = e.getAttribute('data-tab'),
            tab = document.querySelectorAll('.js-tab-trigger.active'),
            content = document.querySelectorAll('.js-tab-content'),
            contentData = document.querySelector('.js-tab-content[data-tab="'+ id +'"]');
    
        Array.prototype.forEach.call(tab, (preview) => {
            preview.classList.remove('active');
        });
        
        e.classList.add('active');
    
        Array.prototype.forEach.call(content, (preview) => {
            preview.classList.remove('active');
        });
        
        contentData.classList.add('active');
    }
    
    Array.prototype.forEach.call(tabsBtns, (preview) => {
        preview.addEventListener('click', function() {
            tabSelection(this);
        });
    });
    console.log(customSelect);
    var cartSelect = new customSelect({
        elem: 'selectMainfont'
    });
    var sizeSelect = new customSelect({
        elem: 'selectSizefont'
    });
    var titleSelect = new customSelect({
        elem: 'selectTitlefont'
    });
    
});










/*document.querySelectorAll('.js-tab-trigger').addEventListener('click', function() {
        alert(123);
        var id = this.getAttribute('data-tab'),
            content = document.querySelector('.js-tab-content[data-tab="'+ id +'"]');
        
        conslole.log(id, content);
        
        document.querySelector('.js-tab-trigger.active').classList.remove('active');
        this.classList.add('active');
        
        document.querySelector('.js-tab-trigger.active').classList.remove('active');
        content.classList.add('active');
        
    });*/


