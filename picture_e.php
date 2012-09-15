<html>
<head>
<title>Вставить картинку</title>
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

if(!isset($go)) {
	?>

	<form action="<?php echo "$PHP_SELF"; ?>?go" method=post enctype=multipart/form-data>
	<table cellpading=3 cellspacing=0 border=0 width=100%>
	<tr>
	<td width=20%>Ссылка на картинку:</td>
    <td width=80%><input type=text name=image style="width: 100%;"></td>
	</tr>
	</table>
	<table>
	<tr>
	<td width=90%>Установите процент от всей картинки для генерации иконки:</td>
    <td width=10%><input type=text name=thumb size=5 value=15></td>
	</tr>
	<tr align=left>
    <td colspan=2>
      <input type="submit" value="Закачать">
      <input type="hidden" name="go" value=qqq>
    </td>
	</tr>
	</table>

	</form>

	<?
}
elseif(isset($go)) {


			$prc=$thumb;
			$size=getimagesize($image);
			$dw=$size[0] * $prc /100;
			$dh=$size[1] * $prc /100;
			print $prc;
			print $dw;
?>

		<script language="JavaScript">
			opener.document.formata.text.focus();
			sel = opener.document.selection.createRange();

			<?php
				$img_str="<a href='".$image."'><img width=".$dw." src='".$image."' border=1></a>";
			?> 
			
			sel.text="<?php echo $img_str; ?>";
			//window.location="thumb.php?img_new=<?php echo $image; ?>&prc=<?php echo $thumb; ?>";
			window.close();
		</script>
		
		<?
		echo "<input type=button value=\"закрыть\" onClick=\"window.close();\">";
	
}

?>

</body>
</html>