<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if ($arResult['ITEMS']) {?>
    <div class="sidebar-news sidebar__block">
        <div class="sidebar-news__title">Акции</div>
        <ul class="sidebar-news__list sidebar-news-list">
            <?foreach ($arResult['ITEMS'] as $arItem) {?>
                <li class="sidebar-news-list__item sidebar-news-list-item">
                    <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                        <div class="sidebar-news-list-item__date"><?=$arItem['DATE_ACTIVE_FORMAT']?></div>
                        <span class="sidebar-news-list-item__name"><?=$arItem['NAME']?></span>
                    </a>
                </li>
            <?}?>
        </ul>
        <a href="#" class="link link_secondary link_icon-right sidebar-news__all-link">
            Все акции
            <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
        </a>
    </div>
<?}?>