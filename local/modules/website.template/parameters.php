<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

CWebsiteTemplate::$arParametersList = array(
    'TEMPLATE_TYPE' => CWebsiteTemplate::getSiteTypes() ?: false,
    'FONT' => CWebsiteTemplate::getElementsHLBlock(2),
    'COLOR' => CWebsiteTemplate::getElementsHLBlock(1),
    'FONT_SIZE' => array(
        'small' => array(
            'VALUE' => '13px'
        ),
        'default' => array(
            'VALUE' => '15px'
        ),
        'big' => array(
            'VALUE' => '17px'
        )
    ),
    'REVIEWS' => array(
        'default' => array(
            'NAME' => 'Вариант 1'
        ),
        '2' => array(
            'NAME' => 'Вариант 2'
        )
    ),
    'SLIDER' => array(
        'default' => array(
            'NAME' => 'Базовый вариант'
        ),
        '1' => array(
            'NAME' => 'Слайдер с преимуществами'
        ),
        '2' => array(
            'NAME' => 'Товарный слайдер с белым фоном'
        ),
        '3' => array(
            'NAME' => 'Слайдер с текстом по центру'
        )
    ),
    'ADVANTAGE' => array(
        'default' => array(
            'NAME' => 'Вариант 1'
        ),
        '2' => array(
            'NAME' => 'Вариант 2'
        ),
    ),
    'SECTIONS' => array(
        'default' => array(
            'NAME' => 'Нестандартная сетка'
        ),
        '1' => array(
            'NAME' => 'Нестандартная сетка c ценами'
        ),
        '2' => array(
            'NAME' => 'Базовое представление'
        ),
    ),
    'PRODUCTS' => array(
        'default' => array(
            'NAME' => 'Стандартный вид'
        ),
        '1' => array(
            'NAME' => 'Карточки для фото с прозрачным фоном'
        )
    ),
    'SERVICES' => array(
        'default' => array(
            'NAME' => 'Вид с изображениями'
        ),
        '1' => array(
            'NAME' => 'Вид с икноками'
        )
    ),
    'ABOUT' => array(
        'default' => array(
            'NAME' => 'Стандартный блок'
        ),
        '1' => array(
            'NAME' => 'Блок с преимуществами'
        ),
        '2' => array(
            'NAME' => 'Блок с преимуществами'
        )
    ),
    'NEWS' => array(
        'default' => array(
            'NAME' => 'Стандартный вид'
        ),
        '1' => array(
            'NAME' => 'Дополнительный'
        )
    ),
    'HEADER' => CWebsiteTemplate::getViewTemplates('header'),
    'FOOTER' => CWebsiteTemplate::getViewTemplates('footer')
);