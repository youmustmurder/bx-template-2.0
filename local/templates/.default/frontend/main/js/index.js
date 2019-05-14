// counter

function catalogItemCounter(field){
    var fieldCount = function(el) {
        var
            // Мин. значение
            min = el.data('min') || false,
            // Макс. значение
            max = el.data('max') || false,
            // Кнопка уменьшения кол-ва
            dec = el.prev('.dec'),
            // Кнопка увеличения кол-ва
            inc = el.next('.inc');
        function init(el) {
            if(!el.attr('disabled')){
                dec.on('click', decrement);
                inc.on('click', increment);
            }
            // Уменьшим значение
            function decrement() {
                var value = parseInt(el[0].value);
                value--;
                if(!min || value >= min) {
                    el[0].value = value;
                }
            };
            // Увеличим значение
            function increment() {
                var value = parseInt(el[0].value);
                value++;
                if(!max || value <= max) {
                    el[0].value = value++;
                }
            };
        }
        el.each(function() {
            init($(this));
        });
    };
    $(field).each(function(){
        fieldCount($(this));
    });
}

catalogItemCounter('.form-stroke__fieldCount');
catalogItemCounter('.form-underline__fieldCount');

//select

$(document).ready(function() {
    var customSelect = function(options, cbAfter, cbChoose) {
        var elem = typeof(options.elem === 'string') ? document.getElementById(options.elem) : options.elem,
            mainClass = 'custom-dropdown',
            mainClassActive = 'custom-dropdown_active',
            buttonClass = 'custom-dropdown__button',
            buttonClass2 = 'custom-dropdown_button',
            buttonValueClass = 'custom-dropdown_button__value',
            buttonArrowClass = 'custom-dropdown_button__arrow',
            listContainerClass = 'custom-dropdown__content',
            listClass1 = 'custom-dropdown__list',
            listClass2 = 'custom-dropdown-list',
            liClass = 'custom-dropdown-list__item',
            selectedClass = 'custom-dropdown-list__item_active',
            openClass = 'custom-dropdown-list_open',
            selectOptions = elem.querySelectorAll('option'),
            optionsLength = selectOptions.length;
        
        var selectContainer = document.createElement('div');
        
        selectContainer.className = mainClass;
        
        if (elem.id) {
            selectContainer.id = 'custom-dropdown-' + elem.id;
        }
        
        var button = document.createElement('button');
        
        button.classList.add(buttonClass, buttonClass2);
        
        var button_value = document.createElement('div');
        button_value.className = buttonValueClass;
        button_value.textContent = selectOptions[0].textContent;
        
        var button_arrow = document.createElement('div');
        button_arrow.className = buttonArrowClass;
        //button_arrow.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" viewBox="0 0 20 26"><path id="arrows_double" class="cls-1" d="M1416.98,927.02L1407.96,937,1399,927h18Zm-17.96-4.042,9.02-9.978,8.96,10h-18Z" transform="translate(-1398 -912)"/></svg>';
        
        button.appendChild(button_value);
        button.appendChild(button_arrow);
        
        var listContainer = document.createElement('div');
        listContainer.className = listContainerClass;
        
        var ul = document.createElement('ul');
        
        ul.className = listClass1;
        ul.classList.add(listClass2);
        
        for (var i=0; i < optionsLength; i++) {
            var li = document.createElement('li');
            li.className = liClass;
            li.innerText = selectOptions[i].textContent;
            li.setAttribute('data-value', selectOptions[i].value);
            li.setAttribute('data-index', i);
            if (selectOptions[i].getAttribute('selected') != null) {
                li.classList.add(selectedClass);
                button_value.textContent = selectOptions[i].textContent;
            }
            
            ul.appendChild(li);
        }
        
        selectContainer.appendChild(button);
        listContainer.appendChild(ul);
        selectContainer.appendChild(listContainer);
        
        selectContainer.addEventListener('click', onClickSelect);
        
        elem.parentNode.insertBefore(selectContainer, elem);
        elem.style.display = 'none';
        
        if (typeof(cbAfter) != 'undefined') {
            cbAfter();
        }
        
        document.addEventListener('click', function(e) {
            if (!selectContainer.contains(e.target)) close();
        });
        
        function onClickSelect(e) {
            e.preventDefault();
            
            var t = e.target;
            
            if (t.className === buttonClass+' '+buttonClass2 || t.className === buttonValueClass) {
                toggle();
            }
            
            if (t.className === liClass) {
                selectContainer.querySelector('.' + buttonValueClass).innerText = t.innerText;
                elem.options.selectedIndex = t.getAttribute('data-index');
                
                var evt = new CustomEvent('change');
                
                elem.dispatchEvent(evt);
                
                for (var i=0; i < optionsLength; i++) {
                    ul.querySelectorAll('.' + liClass)[i].classList.remove(selectedClass);
                }
                t.classList.add(selectedClass);
                close();
                
                if (typeof(cbChoose) != 'undefined') {
                    cbChoose(selectContainer, t.innerText);
                }
            }
        }
        
        function toggle() {
            selectContainer.classList.toggle(mainClassActive);
            ul.classList.toggle(openClass);
        }
        
        function open() {
            selectContainer.classList.add(mainClassActive);
            ul.classList.add(openClass);
        }
        
        function close() {
            selectContainer.classList.remove(mainClassActive);
            ul.classList.remove(openClass);
        }
        
        return {
            toggle: toggle,
            close: close,
            open: open
        }
    }
    
    var customSelectExample = new customSelect({
        elem: 'form-stroke__select'
    });
    
    var customSelectExample2 = new customSelect({
        elem: 'form-underline__select'
    });
});

