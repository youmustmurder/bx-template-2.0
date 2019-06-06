<?php
/**
 * @author Lukmanov Mikhail <lukmanof92@gmail.com>
 */

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>
<section class="section-about section-about__1 section-about__catalog">
    <div class="container">
        <div class="about-item">
            <div class="row">
                
                   <div class="about-item_content">
                    <div class="img"><img src="<?=$arParams['BLOCK_IMG']?>"></div>
                    <div class="section-title">
                        <h2><?=$arParams['BLOCK_TITLE'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_BLOCK_TITLE')?></h2>
                    </div>
                    <div class="about-item__text">
                        <?$APPLICATION->IncludeFile(
                                "/include/".SITE_ID."/content/home/home-about_text.php",
                                array(), array(
                                    "SHOW_BORDER" => true,
                                    "MODE" => "html"
                                )
                        );?>
                    </div>
                    <a href="<?=$arParams['SECTION_LINK'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_SECTION_LINK_DEFAULT', array('#SITE_DIR#' => SITE_DIR))?>"
                       class="btn btn-link">
                        <?=$arParams['SECTION_LINK_NAME'] ?: Loc::getMessage('HOME_ABOUT_DEFAULT_SECTION_LINK_NAME')?>
                        <span class="link__icon"><?=GetContentSvgIcon('arrow_right');?></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
