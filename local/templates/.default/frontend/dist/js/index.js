"use strict";// counter
function catalogItemCounter(a){var b=function(a){function b(a){// Уменьшим значение
// Увеличим значение
a.attr("disabled")||(e.on("click",function(){var b=parseInt(a[0].value);b--,(!c||b>=c)&&(a[0].value=b)}),f.on("click",function(){var b=parseInt(a[0].value);b++,(!d||b<=d)&&(a[0].value=b++)}))}var// Мин. значение
c=a.data("min")||!1,// Макс. значение
d=a.data("max")||!1,// Кнопка уменьшения кол-ва
e=a.prev(".dec"),// Кнопка увеличения кол-ва
f=a.next(".inc");a.each(function(){b($(this))})};$(a).each(function(){b($(this))})}catalogItemCounter(".form-stroke__fieldCount"),catalogItemCounter(".form-underline__fieldCount");