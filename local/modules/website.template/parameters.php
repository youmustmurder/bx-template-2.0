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
            'NAME' => '13px',
            'VALUE' => '13px'
        ),
        'default' => array(
            'NAME' => '15px',
            'VALUE' => '15px'
        ),
        'big' => array(
            'NAME' => '17px',
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
            'NAME' => 'Вариант 1'
        ),
        '2' => array(
            'NAME' => 'Вариант 2'
        ),
        '3' => array(
            'NAME' => 'Вариант 3'
        ),
        '4' => array(
            'NAME' => 'Вариант 4'
        ),
        '5' => array(
            'NAME' => 'Вариант 5'
        ),
        '6' => array(
            'NAME' => 'Вариант 6'
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
            'NAME' => 'Плитками'
        ),
        '2' => array(
            'NAME' => 'По 4 в ряд'
        ),
        '3' => array(
            'NAME' => 'По 3 в ряд'
        ),
    ),
    'HEADER' => CWebsiteTemplate::getViewTemplates('header'),
    'FOOTER' => CWebsiteTemplate::getViewTemplates('footer')
);