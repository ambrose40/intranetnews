<html>
<head>
<title>Создать ссылку</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

<style type="text/css">
<!--
h3 {font-family: Times New Roman; color:black; font-size=18px;}
h2 {font-family: Times New Roman; color:black; font-size=16px;}
p {font-family: Tahoma; color:black; font-size=13px;}

TD {font-family: Arial; color:black; border-style:none; border-width:0; font-size=12px;}
TH {font-family: Arial; color:black; border-style:none; border-width:0; font-size=12px;}
TABLE {border-collapse:collapse; border:0; font-family: Arial; color:black; font-size=12px;}
-->
</style>

</head>
<body bgcolor=EEEEEE>
<?

if(!isset($golink)) {
	?>

	<form action="<?php echo "$PHP_SELF"; ?>?golink" method=post name="form1">
	<table cellpading=3 cellspacing=0 border=0 width=100%>
	<tr>
	<td width=20%>Адрес ссылки:</td>
	<td width=80%><input type="text" name="link" value="" style="width: 100%;"></td>
	</tr>

	<tr>
	<td>Описание ссылки:</td>
	<td><input type="text" name="linktext" style="width: 100%;" value="">
		<script language=Javascript>
			document.form1.linktext.focus()
			sel_3=opener.document.selection.createRange();
			form1.linktext.value=sel_3.text
		</script>
	</td>
	</tr>

	<tr>
	<td colspan=2 align=left>
	<input type="submit" value="Записать">
	<input type="hidden" name="golink" value=qqq>
	</td>
	</tr>
	</table>
	</form>

	<?php
}
elseif(isset($golink)) {
	if (!isset($link) && !isset($linktext)) {echo "Необходимо ввести значения всех полей! Запись не произведена!"; exit;}
	if (isset($link) || $link!=""  && $linktext!="") {
		?>
		
		<script language="JavaScript">
			opener.document.formata.text.focus()
			sel_4=opener.document.selection.createRange();
			if (sel_4=="<?php echo $linktext;?>") {
				sel_4.text="<a href='<?php echo str_replace(" "," ", $link); ?>' target=_blank>"+sel_4.text+"</a>"
			}
			else {
				<?php
				$ssylka="<a href='".str_replace(" "," ", $link)."' target=_blank>".$linktext."</a>";
				?>
				sel_4.text="<?php echo $ssylka?>";
			}
			window.close();
		</script>

		<?php
	}
}
?>