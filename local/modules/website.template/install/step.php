<?if(!check_bitrix_sessid()) return;?>
<?=CAdminMessage::ShowNote(GetMessage('WEBSITE_TEMPLATE_INSTALL_SUCCESS'));?>
<form action="<?=$APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?=LANG?>">
    <input type="submit" name="" value="<?=GetMessage('WEBSITE_TEMPLATE_INSTALL_BACK')?>">
<form>
