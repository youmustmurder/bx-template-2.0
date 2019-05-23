<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if(isset($_REQUEST['ajax_form']) && !empty($_REQUEST['ajax_form'])){?>
    <div class="callback__modal-form modal__box">
        <span onclick="modalClose();" class="modal__close"></span>
        <div class="modal__content">
            <h3 class="modal__box-title"><?=$arParams['FORM_TITLE'];?></h3>
            <form method="POST" action="<?=POST_FORM_ACTION_URI; ?>" class="modal__form">
                <input type="hidden" name="ajax_send" value="Y"/>
                <input type="hidden" name="sign" value="<?= $arResult["JSON_SIGN"] ?>"/>
                <input type="hidden" name="ajax_form" value="<?= $arParams['IBLOCK_ID'] ?>"/>
                <?=bitrix_sessid_post();?>
                <?foreach ($arResult['FIELDS'] as $arField){?>
                    <div class="form__group<?=$arField['VALUE']['IBLOCK_CODE'] == 'catalog' ? ' product__order-item' : ''?>">
                    <?switch ($arField['PROPERTY_TYPE']) {
                        case 'E':
                            if($arField['VALUE']['IBLOCK_CODE'] == 'catalog'){?>
                                <div class="product__order-image"
                                     style="background-image: url(<?=$arField['VALUE']['PREVIEW_PICTURE']?>)";>
                                </div>
                                <div class="product__order-content">
                                    <div class="product__order-name"><?=$arField['VALUE']['NAME']?></div>
                                    <?if($arField['VALUE']['PROPERTIES']['PRODUCT_PRICE']['VALUE']){?>
                                        <div class="product__order-price">
                                            <span class="product-price"><?=$arField['VALUE']['PROPERTIES']['PRODUCT_PRICE']['VALUE']?></span>
                                            <?=$arField['VALUE']['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'] ? '<span class="product-price price__old">' . $arField['VALUE']['PROPERTIES']['PRODUCT_OLD_PRICE']['VALUE'] . '</span>' : ''; ?>
                                        </div>
                                    <?} else {?>
                                        <?if($arField['VALUE']['PROPERTIES']['PRODUCT_STATUS']['VALUE']){?>
                                            <div class="product__status <?=$arField['VALUE']['PROPERTIES']['PRODUCT_STATUS']['VALUE_XML_ID']?>"><?=$arField['VALUE']['PROPERTIES']['PRODUCT_STATUS']['VALUE']?></div>
                                        <?}?>
                                    <?}?>
                                </div>
                                <input type="hidden"
                                       name="FIELDS[<?=$arField['CODE']?>]"
                                       value="<?=$arField['VALUE']['ID']?>">
                            <?}
                            break;
                        case 'S':
                            if(is_array($arField['DEFAULT_VALUE'])){?>
                            <textarea id="<?=$arField['CODE']?>"
                                      class="textarea_inp modal__inp"
                                      name="FIELDS[<?=$arField['CODE']?>]"
                                      placeholder="<?=$arField['HINT'] ? $arField['HINT'] : $arField['NAME']?>"></textarea>
                            <?}else{?>
                                <input id="<?=$arField['CODE']?>"
                                       class="inp modal__inp"
                                       <?if(stristr($arField['CODE'], 'PHONE') || stristr($arField['CODE'], 'phone')){?>
                                            data-inputmask="'mask':'+7 (999) 999-99-99'"
                                       <?}?>
                                       type="text"
                                       name="FIELDS[<?=$arField['CODE']?>]"
                                       placeholder="<?=$arField['HINT'] ? $arField['HINT'] : $arField['NAME']?>">
                            <?}
                            break;
                        case 'F':?>
                            <div class="files form__files">
                                <ul class="filelist"></ul>
                                <label for="<?=$arField['CODE']?>" class="btn btn-default"><?=$arField['NAME']?><?=$arField['FILE_TYPE'] ? ' ('.strtoupper($arField['FILE_TYPE']).')' : ''?></label>
                                <input type="file"
                                       data-file-type="<?=$arField['FILE_TYPE']?>"
                                       name="FIELDS[<?=$arField['CODE']?>]"
                                       class="form__upload"
                                       accept=".doc,.txt,.rtf,.pdf,.docx"
                                       id="<?=$arField['CODE']?>" <?=$arField['MULTIPLE'] == 'Y' ? 'multiple' : ''?>/>
                            </div>
                            <?break;
                        case 'L':?>
                                <?
                                if (isset($arField['VALUE']) && is_array($arField['VALUE'])) { ?>
                                    <select name="FIELDS[<?= $arField['CODE'] ?>]"
                                            id="<?= $arField['CODE'] ?>">
                                        <option selected disabled value=""><?= $arField['NAME'] ?></option>
                                        <? foreach ($arField['VALUE'] as $value) { ?>
                                            <option value="<?= $value['ID'] ?>"><?= $value['VALUE'] ?></option>
                                        <? } ?>
                                    </select>
                                <? } else { ?>
                                    <label class="lbl politic__checkbox">
                                        <input id="<?= $arField['CODE'] ?>" type="checkbox"
                                               name="FIELDS[<?= $arField['CODE'] ?>]" checked/>
                                        <span class="politic__text"><?= $arField['HINT'] ?>
                                            <?= $arField['URL'] ? '<a href="' . $arField['URL'] . '" target="_blank">' . $arField['NAME'] . '</a>' : $arField['NAME'] ?>
                                        </span>
                                    </label>
                                <?
                                } ?>
                            <?break;
                    }?>
                    </div>
                <?}?>
                <div class="form__group form__group-btn">
                    <button type="submit" class="btn btn_mid modal__form-submit"><?=$arParams['FORM_BTN_SUBMIT'];?></button>
                </div>
            </form>
        </div>
    </div>
<?} else {?>
    <a href="#"
       class="<?=$arParams['FORM_BTN_TYPE']?> js-init-modal__form"
       data-sign="<?=$arResult["JSON_SIGN"]?>"
       data-lang="<?= LANGUAGE_ID ?>"
       data-site-id="<?= LANGUAGE_ID ?>"
       data-modal="<?=$arParams['IBLOCK_ID']?>"><?=$arParams['FORM_BTN_TYPE'] == 'btn-icon' ? GetContentSvgIcon('phone') : $arParams['FORM_BTN_OPEN']?></a>
<?}?>