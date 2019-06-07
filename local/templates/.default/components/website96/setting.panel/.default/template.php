<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

CModule::IncludeModule('website.template');

global $arCurrentSetting;

use Bitrix\Main\Page\Asset,
    Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

Asset::getInstance()->addJs(GetCurDir(__DIR__) . '/bundle.js');
Asset::getInstance()->addCss(GetCurDir(__DIR__) . '/style.css');

$arParameters = CWebsiteTemplate::$arParametersList;

dump($arParameters);
?>

<div class="settings-panel">
	<form class="settings-panel__inner tabs">
		<ul class="settings-panel__tabs-nav settings-panel-tabs-nav">
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle tabs__toggle_active">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#common"
                        aria-expanded="true"
                        aria-controls="common">Общие настройки</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#home"
                        aria-expanded="false"
                        aria-controls="home">Главная</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#contact"
                        aria-expanded="false"
                        aria-controls="contact">Контакты</button>
			</li>
			<li class="settings-panel-tabs-nav__item settings-panel-tabs-nav-item tabs__toggle">
				<button class="settings-panel-tabs-nav-item__btn"
                        data-toggle="collapse"
                        data-target="#catalog"
                        aria-expanded="false"
                        aria-controls="catalog">Каталог</button>
			</li>
		</ul>
		<div class="settings-panel__tabs-content settings-panel-tabs-content">
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content tabs__content_active" id="common" aria-label="<?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?>">
				<div class="settings-panel-tabs-content-item__header"><?=Loc::getMessage('SETTING_PANEL_TAB_GENERAL_SETTINGS')?></div>
				<div class="settings-panel-tabs-content-item__body">
                    <?foreach ($arParameters as $CODE => $parameters) {
                        switch ($CODE) {
                            //в 1 столбик (для цветовы)
                            case 'COLOR':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_COLOR_TITLE')?></div>
                                    <div class="settings-option__inner">
                                        <ul class="settings-option__colors settings-option-colors">
                                            <?foreach ($parameters as $id => $parameter) {?>
                                                <li class="settings-option-colors__item settings-option-colors-item">
                                                    <input type="radio"
                                                           name="<?=$CODE?>"
                                                           value="<?=$id?>"
                                                           id="<?=$CODE?>_<?=$id?>">
                                                    <label class="settings-option-colors-item__prviews"
                                                           for="<?=$CODE?>_<?=$id?>"
                                                           style="background-color: #<?=$parameter['VALUE']?>">
                                                </li>
                                            <?}?>
                                        </ul>
                                    </div>
                                </div>
                                <?break;
                            //в 2 столбика (для шрифтов)
                            case 'FONT':?>
                                <div class="settings-panel-tabs-content-item__option settings-panel-tabs-content-item__option_2column">
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_FONT_MAIN_TITLE')?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card">
                                                <select name="FONT" id="FONT" style="display: none;">
                                                    <?foreach ($parameters as $id => $parameter) {?>
                                                        <option value="<?=$parameter['FONT_CODE']?>"><?=$parameter['NAME']?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="settings-option">
                                        <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_FONT_SIZE_TITLE')?></div>
                                        <div class="settings-option__inner">
                                            <div class="settings-option__card settings-option-card">
                                                <select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
                                                    <?foreach ($arParameters['FONT_SIZE'] as $code => $parameter) {?>
                                                        <option value="<?=$code?>"><?=$parameter['VALUE']?></option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?break;
                            //в один столбик
                            case 'HEADER':
                            case 'FOOTER':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_'.$CODE.'_TITLE')?></div>
                                    <div class="settings-option__inner">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>"
                                                       id="<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox">
                                                <label for="<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                            //в 3 столбика
                            case '3':?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title">Готовое решение</div>
                                    <div class="settings-option__inner settings-option__inner_cards3">
                                        <div class="settings-option__card settings-option-card">
                                            <input type="radio" name="setting_1" value="1" id="setting_1_1" class="settings-option-card__checkbox">
                                            <label for="setting_1_1" class="settings-option-card__inner">
                                                <div class="settings-option-card__preview">
                                                    <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                </div>
                                                <div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
                                            </label>
                                        </div>
                                        <div class="settings-option__card settings-option-card">
                                            <input type="radio" name="setting_1" value="2" id="setting_1_2" class="settings-option-card__checkbox">
                                            <label for="setting_1_2" class="settings-option-card__inner">
                                                <div class="settings-option-card__preview">
                                                    <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                </div>
                                                <div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
                                            </label>
                                        </div>
                                        <div class="settings-option__card settings-option-card settings-option-card_disable">
                                            <input type="radio" name="setting_1" value="3" id="setting_1_3" class="settings-option-card__checkbox">
                                            <label for="setting_1_3" class="settings-option-card__inner">Отключить</label>
                                        </div>
                                    </div>
                                </div>
                                <?break;
                            default:?>
                                <div class="settings-panel-tabs-content-item__option settings-option">
                                    <div class="settings-option__title"><?=Loc::getMessage('SETTING_PANEL_'.$CODE.'_TITLE')?></div>
                                    <div class="settings-option__inner settings-option__inner_cards2">
                                        <?foreach ($parameters as $id => $parameter) {?>
                                            <div class="settings-option__card settings-option-card">
                                                <input type="radio"
                                                       name="<?=$CODE?>"
                                                       value="<?=$id?>" id="<?=$CODE?>_<?=$id?>"
                                                       class="settings-option-card__checkbox">
                                                <label for="<?=$CODE?>_<?=$id?>" class="settings-option-card__inner">
                                                    <div class="settings-option-card__preview">
                                                        <img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
                                                    </div>
                                                    <div class="settings-option-card__name"><?=$parameter['NAME']?></div>
                                                </label>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                                <?break;
                        }
                        ?>
                    <?}?>
					<!-- В 3 столбика -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner settings-option__inner_cards3">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_1" value="1" id="setting_1_1" class="settings-option-card__checkbox">
								<label for="setting_1_1" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_1" value="2" id="setting_1_2" class="settings-option-card__checkbox">
								<label for="setting_1_2" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card settings-option-card_disable">
								<input type="radio" name="setting_1" value="3" id="setting_1_3" class="settings-option-card__checkbox">
								<label for="setting_1_3" class="settings-option-card__inner">Отключить</label>
							</div>
						</div>
					</div>
					<!-- В 2 столбика -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner settings-option__inner_cards2">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_2" value="1" id="setting_2_1" class="settings-option-card__checkbox">
								<label for="setting_1_1" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_2" value="2" id="setting_2_2" class="settings-option-card__checkbox">
								<label for="setting_2_2" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
						</div>
					</div>
					<!-- В 1 столбик -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Готовое решение</div>
						<div class="settings-option__inner">
							<div class="settings-option__card settings-option-card">
								<input type="radio" name="setting_3" value="1" id="setting_3" class="settings-option-card__checkbox">
								<label for="setting_3" class="settings-option-card__inner">
									<div class="settings-option-card__preview">
										<img src="<?=GetCurDir(__DIR__)?>/uploads/previews_settings.png" alt="">
									</div>
									<div class="settings-option-card__name">Сайт с каталогом/ услугами</div>
								</label>
							</div>
						</div>
					</div>
					<!-- В 1 столбик -->
					<div class="settings-panel-tabs-content-item__option settings-option">
						<div class="settings-option__title">Основной цвет</div>
						<div class="settings-option__inner">
							<ul class="settings-option__colors settings-option-colors">
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
								<li class="settings-option-colors__item settings-option-colors-item">
									<input type="radio" name="color" value="red">
									<label class="settings-option-colors-item__prviews" style="background-color: #1abc9c" />
								</li>
							</ul>
						</div>
					</div>
					<!-- Для шрифтов в 2 стобика -->
					<div class="settings-panel-tabs-content-item__option settings-panel-tabs-content-item__option_2column">
						<div class="settings-option">
							<div class="settings-option__title">Основной шрифт</div>
							<div class="settings-option__inner">
								<div class="settings-option__card settings-option-card">
									<select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
										<option value="roboto_condensed">Roboto Condensed</option>
										<option value="open_sans">Open Sans</option>
										<option value="montserrat_alternates">Montserrat Alternates</option>
										<option value="ubuntu">Ubuntu</option>
										<option value="pt_sans">PT Sans</option>
										<option value="rubik">Rubik</option>
										<option value="play">Play</option>
										<option value="roboto">Roboto</option>
										<option value="default" selected="">Montserrat</option>
									</select>
								</div>
							</div>
						</div>
						<div class="settings-option">
							<div class="settings-option__title">Основной шрифт</div>
							<div class="settings-option__inner">
								<div class="settings-option__card settings-option-card">
									<select name="FONT[SIMPLE]" id="selectMainfont" style="display: none;">
										<option value="roboto_condensed">Roboto Condensed</option>
										<option value="open_sans">Open Sans</option>
										<option value="montserrat_alternates">Montserrat Alternates</option>
										<option value="ubuntu">Ubuntu</option>
										<option value="pt_sans">PT Sans</option>
										<option value="rubik">Rubik</option>
										<option value="play">Play</option>
										<option value="roboto">Roboto</option>
										<option value="default" selected="">Montserrat</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="home" aria-label="Главная">
				<div class="settings-panel-tabs-content-item__header">Главная</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="contact" aria-label="Контакты">
				<div class="settings-panel-tabs-content-item__header">Контакты</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
			<div class="settings-panel-tabs-content__item settings-panel-tabs-content-item tabs__content" id="catalog" aria-label="Каталог">
				<div class="settings-panel-tabs-content-item__header">Каталог</div>
				<div class="settings-panel-tabs-content-item__body">

				</div>
			</div>
		</div>
	</form>
	<div class="settings-panel__buttons">
		<button class="btn settings-panel__btn settings-panel__btn_toggle">
			<span class="btn__icon"><?=GetContentSvgIcon('magic_wand');?></span>
		</button>
		<button class="btn btn_icon-left settings-panel__btn settings-panel__btn_apply">
			<span class="btn__icon"><?=GetContentSvgIcon('success');?></span>
			<?=Loc::getMessage('SETTING_PANEL_BUTTON_APPLY')?>
		</button>
		<button class="btn btn_icon-left settings-panel__btn settings-panel__btn_reset">
			<span class="btn__icon"><?=GetContentSvgIcon('close');?></span>
			<?=Loc::getMessage('SETTING_PANEL_BUTTON_RESET')?>
		</button>
	</div>
</div>

<!-- <div class="box__modal-setting">
    <div class="settings__tabs modal__window">
        <ul class="settings__tabs-menu">
            <li class="settings__tabs-menu-item js-tab-trigger active" data-tab="1"><a href="#">Общие настройки</a></li>
            <li class="settings__tabs-menu-item js-tab-trigger" data-tab="2"><a href="#">Главная</a></li>
            <li class="settings__tabs-menu-item js-tab-trigger" data-tab="3"><a href="#">Футер</a></li>
        </ul>
        <a class="settings__tabs-reset js-init_reset_settings" data-name="TEMPLATE_RESET" data-value="Y">
            <svg width="27" height="27" viewBox="0 0 27 27" fill="transparent" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.4286 7.92857C18.4105 5.52669 15.3843 4 12.0014 4C5.92548 4 1 8.92487 1 15C1 21.0751 5.92548 26 12.0014 26C17.9941 26 22.8678 21.209 23 15.2487" stroke="#FF1E36" stroke-width="2"></path>
                <path d="M13 8.77832H20.7782V1.00015" stroke="#FF1E36" stroke-width="2"></path>
            </svg>
            <span>Сбросить</span>
        </a>
    </div>
    <div class="settings__panel modal__window">
        <div class="settings__panel-buttons-wrap">
            <div class="settings__panel-buttons">
                <a onclick="modalClose(event);" href="#" class="settings__panel-show"></a>
                <button class="js-init_apply_settings group__panel-submit">
                    <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.9348 0.299139C20.536 -0.0997131 19.8894 -0.0997131 19.4905 0.299139L7.25512 12.5347L2.55203 7.83158C2.15322 7.43273 1.50663 7.43277 1.10773 7.83158C0.708881 8.23039 0.708881 8.87698 1.10773 9.27584L6.53297 14.701C6.93167 15.0998 7.57873 15.0995 7.97727 14.701L20.9348 1.74343C21.3337 1.34462 21.3336 0.697992 20.9348 0.299139Z" fill="white"></path></svg>
                    Применить
                </button>
            </div>
        </div>
        <form action="/local/tools/setting_panel.php" method="get" enctype="multipart/form-data">
            <input type="hidden" name="sessid" id="sessid" value="fff49a34ca2e029a09ce222c41d74eb0">                <input type="hidden" value="Y" name="SET_SETTING">
            <div data-tab="3" class="settings__panel-content js-tab-content">
                <div class="group__panel page__view">
                    <div class="group__theme-title">Вид футера</div>
                    <div class="group__theme-list group__header">
                        <div class="col__line">
                            <label class="view__label view__line view__footer" for="footerView__default">
                                <img src="/local/templates/.default/views/footer/default/preview.png" alt="">
                                <input type="radio" name="FOOTER" id="footerView__default" value="default" checked="">
                                <span class="pageView__name">Вариант 1 (Основной вид)</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line view__footer" for="footerView__footer_2">
                                <img src="/local/templates/.default/views/footer/footer_2/preview.png" alt="">
                                <input type="radio" name="FOOTER" id="footerView__footer_2" value="footer_2">
                                <span class="pageView__name">Вариант 2</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line view__footer" for="footerView__footer_3">
                                <img src="/local/templates/.default/views/footer/footer_3/preview.png" alt="">
                                <input type="radio" name="FOOTER" id="footerView__footer_3" value="footer_3">
                                <span class="pageView__name">Вариант 3</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div data-tab="2" class="settings__panel-content js-tab-content">
                <div class="group__panel page__view">
                    <div class="group__theme-title">Блок "Отзывы"</div>
                    <div class="group__theme-list group__header">
                        <div class="col__line">
                            <label class="view__label view__line" for="REVIEWSView__default">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-reviews_default/preview.png" alt="">
                                <input type="radio" name="REVIEWS" id="REVIEWSView__default" value="default" checked="">
                                <span class="pageView__name">Вариант 1</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="REVIEWSView__2">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-reviews_2/preview.png" alt="">
                                <input type="radio" name="REVIEWS" id="REVIEWSView__2" value="2">
                                <span class="pageView__name">Вариант 2</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="group__panel page__view">
                    <div class="group__theme-title group__theme-title--checkbox">
                        <span>Слайдер на главной</span>
                        <div class="group__theme-checkbox__box">
                            <input type="checkbox" id="slider-checkbox"><label class="group__theme-label" for="slider-checkbox">во весь экран</label>
                        </div>
                    </div>
                    <div class="group__theme-list">
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__default">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_default/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__default" value="default" checked="">
                                <span class="pageView__name">Вариант 1</span>
                            </label>
                        </div>
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__2">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_2/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__2" value="2">
                                <span class="pageView__name">Вариант 2</span>
                            </label>
                        </div>
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__3">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_3/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__3" value="3">
                                <span class="pageView__name">Вариант 3</span>
                            </label>
                        </div>
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__4">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_4/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__4" value="4">
                                <span class="pageView__name">Вариант 4</span>
                            </label>
                        </div>
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__5">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_5/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__5" value="5">
                                <span class="pageView__name">Вариант 5</span>
                            </label>
                        </div>
                        <div class="col__part" data-view-type="default">
                            <label class="view__label view__label--slider" for="pageView__6">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-slider_6/preview.png" alt="">
                                <input type="radio" name="SLIDER" id="pageView__6" value="6">
                                <span class="pageView__name">Вариант 6</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="group__panel page__view">
                    <div class="group__theme-title">Преимущества</div>
                    <div class="group__theme-list group__header">
                        <div class="col__line">
                            <label class="view__label view__line" for="advantageView__default">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-advanatges_default/preview.png" alt="">
                                <input type="radio" name="ADVANTAGE" id="ADVANTAGEView__default" value="default" checked="">
                                <span class="pageView__name">Вариант 1</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="advantageView__2">
                                <img src="/local/templates/individual/components/bitrix/news.list/home-advanatges_2/preview.png" alt="">
                                <input type="radio" name="ADVANTAGE" id="ADVANTAGEView__2" value="2">
                                <span class="pageView__name">Вариант 2</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="group__panel page__view">
                    <div class="group__theme-title">Категории каталога</div>
                    <div class="group__theme-list group__header">
                        <div class="col__line">
                            <label class="view__label view__line view__category" for="sectionsView__default">
                                <img src="/local/templates/individual/components/bitrix/catalog.section.list/home-sections_default/preview.png">
                                <input type="radio" name="SECTIONS" id="sectionsView__default" value="default" checked="">
                                <span class="pageView__name">Плитками</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line view__category" for="sectionsView__2">
                                <img src="/local/templates/individual/components/bitrix/catalog.section.list/home-sections_2/preview.png">
                                <input type="radio" name="SECTIONS" id="sectionsView__2" value="2">
                                <span class="pageView__name">По 4 в ряд</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line view__category" for="sectionsView__3">
                                <img src="/local/templates/individual/components/bitrix/catalog.section.list/home-sections_3/preview.png">
                                <input type="radio" name="SECTIONS" id="sectionsView__3" value="3">
                                <span class="pageView__name">По 3 в ряд</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div data-tab="1" class="settings__panel-content js-tab-content active">
                <div class="group__panel" id="template-type">
                    <div class="group__theme-title">Готовое решение</div>
                    <div class="group__theme-list type__list">
                        <label class="type__label pageType__company " for="pageType__company">
                            <input type="radio" name="TEMPLATE_TYPE" id="pageType__company" value="COMPANY">
                            <span>Сайт компании</span>
                        </label>
                        <label class="type__label pageType__catalog type__checked" for="pageType__catalog">
                            <input type="radio" name="TEMPLATE_TYPE" id="pageType__catalog" value="CATALOG" checked="">
                            <span>Сайт с каталогом/услугами</span>
                        </label>
                        <label class="type__label pageType__shop " for="pageType__shop">
                            <input type="radio" name="TEMPLATE_TYPE" id="pageType__shop" value="SHOP">
                            <span>Интернет-магазин</span>
                        </label>
                    </div>
                </div>
                <div class="group-inline-panel">
                    <div class="group__panel" id="title-font">
                        <label class="group__theme-title" for="selectMainfont">Основной шрифт</label>
                        <div class="group__theme-list">
                            <div class="group__theme-type">
                                <select name="FONT[SIMPLE]" class="group__theme-template__select" id="selectMainfont" style="display: none;">
                                    <option value="roboto_condensed">Roboto Condensed</option>
                                    <option value="open_sans">Open Sans</option>
                                    <option value="montserrat_alternates">Montserrat Alternates</option>
                                    <option value="ubuntu">Ubuntu</option>
                                    <option value="pt_sans">PT Sans</option>
                                    <option value="rubik">Rubik</option>
                                    <option value="play">Play</option>
                                    <option value="roboto">Roboto</option>
                                    <option value="default" selected="">Montserrat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="group__panel" id="title-font">
                        <label class="group__theme-title" for="selectMainfont">Размер шрифта</label>
                        <div class="group__theme-list">
                            <div class="group__theme-type">
                               <select name="FONT_SIZE" class="group__theme-template__select" id="selectSizefont" style="display: none;">
                                    <option value="13">13px</option>
                                    <option value="15" selected="">15px</option>
                                    <option value="17">17px</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group__panel" id="simple-font">
                    <label class="group__theme-title" for="selectTitlefont">Шрифт для заголовков</label>
                    <div class="group__theme-list">
                        <div class="group__theme-type">
                           <select name="FONT[TITLE]" class="group__theme-template__select" id="selectTitlefont" style="display: none;">
                                <option value="roboto_condensed">Roboto Condensed</option>
                                <option value="open_sans">Open Sans</option>
                                <option value="montserrat_alternates">Montserrat Alternates</option>
                                <option value="ubuntu">Ubuntu</option>
                                <option value="pt_sans">PT Sans</option>
                                <option value="rubik">Rubik</option>
                                <option value="play">Play</option>
                                <option value="roboto">Roboto</option>
                                <option value="default" selected="">Montserrat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="group__panel">
                    <div class="group__theme-title">Активный (основный) цвет</div>
                    <div class="group__theme-list">
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_11" title="Бирюзовый">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_11" value="turquoise">
                                <span style="background-color: #1abc9c"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_12" title="Нефрит">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_12" value="nephritis">
                                <span style="background-color: #27ae60"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_13" title="Голубой">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_13" value="belize_hole">
                                <span style="background-color: #2980b9"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_14" title="Сиреневый">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_14" value="wisteria">
                                <span style="background-color: #8e44ad"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_15" title="Асфальт">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_15" value="asphalt">
                                <span style="background-color: #34495e"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_16" title="Оранжевый">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_16" value="orange">
                                <span style="background-color: #d35400"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_17" title="Морковь">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_17" value="carrot">
                                <span style="background-color: #e74c3c"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_18" title="Серый">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_18" value="silver">
                                <span style="background-color: #95a5a6"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_19" title="Голубые колокольчики">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_19" value="bluebell">
                                <span style="background-color: #341f97"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="actionColor_20" title="Стандартный (По умолчанию)">
                                <input type="radio" name="COLORS[ACTION]" id="actionColor_20" value="default" checked="">
                                <span style="background-color: #ff223d"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="group__panel">
                    <div class="group__theme-title">Дополнительный цвет</div>
                    <div class="group__theme-list">
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_11" title="Бирюзовый">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_11" value="turquoise">
                                <span style="background-color: #1abc9c"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_12" title="Нефрит">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_12" value="nephritis">
                                <span style="background-color: #27ae60"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_13" title="Голубой">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_13" value="belize_hole">
                                <span style="background-color: #2980b9"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_14" title="Сиреневый">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_14" value="wisteria">
                                <span style="background-color: #8e44ad"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_15" title="Асфальт">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_15" value="asphalt">
                                <span style="background-color: #34495e"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_16" title="Оранжевый">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_16" value="orange">
                                <span style="background-color: #d35400"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_17" title="Морковь">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_17" value="carrot">
                                <span style="background-color: #e74c3c"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_18" title="Серый">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_18" value="silver">
                                <span style="background-color: #95a5a6"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_19" title="Голубые колокольчики">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_19" value="bluebell">
                                <span style="background-color: #341f97"></span>
                            </label>
                        </div>
                        <div class="theme__color theme__default">
                            <label class="color__label" for="mainColor_20" title="Стандартный (По умолчанию)">
                                <input type="radio" name="COLORS[MAIN]" id="mainColor_20" value="default" checked="">
                                <span style="background-color: #fff"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="group__panel page__view">
                    <div class="group__theme-title">Вид шапки</div>
                    <div class="group__theme-list group__header">
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__default">
                                <img src="/local/templates/.default/views/header/default/preview.png">
                                <input type="radio" name="HEADER" id="headerView__default" value="default" checked="">
                                <span class="pageView__name">Вариант 1 (Основной вид)</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__header_2">
                                <img src="/local/templates/.default/views/header/header_2/preview.png">
                                <input type="radio" name="HEADER" id="headerView__header_2" value="header_2">
                                <span class="pageView__name">Вариант 2</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__header_3">
                                <img src="/local/templates/.default/views/header/header_3/preview.png">
                                <input type="radio" name="HEADER" id="headerView__header_3" value="header_3">
                                <span class="pageView__name">Вариант 3</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__header_4">
                                <img src="/local/templates/.default/views/header/header_4/preview.png">
                                <input type="radio" name="HEADER" id="headerView__header_4" value="header_4">
                                <span class="pageView__name">Вариант 4</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__header_5">
                                <img src="/local/templates/.default/views/header/header_5/preview.png">
                                <input type="radio" name="HEADER" id="headerView__header_5" value="header_5">
                                <span class="pageView__name">Вариант 5</span>
                            </label>
                        </div>
                        <div class="col__line">
                            <label class="view__label view__line" for="headerView__header_6">
                                <img src="/local/templates/.default/views/header/header_6/preview.png">
                                <input type="radio" name="HEADER" id="headerView__header_6" value="header_6">
                                <span class="pageView__name">Вариант 6</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> -->