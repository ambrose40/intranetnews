<html>
<head>
<title>�������� ��������</title>
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
	<td width=20%>��������:</td>
    <td width=80%><input type=file name=image style="width: 100%;"></td>
	</tr>

	<tr align=left>
    <td colspan=2>
      <input type="submit" value="��������">
      <input type="hidden" name="go" value=qqq>
    </td>
	</tr>
	</table>

	</form>

	<?
}
elseif(isset($go)) {
	if(!file_exists($image)){echo "������ ��������!!!"; exit;}
	if(isset($image) && ereg(".gif$",$image_name) || ereg(".jpg$",$image_name) || ereg(".jpeg$",$image_name)) $is_img="ok";
	if(isset($image) && $image !="" && $image !=" " && $image_size > 0) $is_file="ok";

	if(isset($is_img) && $is_img=="ok" && isset($is_file) && $is_file=="ok") {
		
		$image_name = str_replace (' ', '', $image_name);
		$new_image_name = strtolower($image_name);
		
		//����������� � ����� ����� ��������� �����
		mt_srand((double)microtime()*1000000);
		$uid=mt_rand(1,1000000);
		$img_new = $uid."_".$new_image_name;

		$imgdir = "pictures/";
		if(!file_exists($image)){echo "������ �����������!!!"; exit;}
		Copy($image,$imgdir.$img_new);

		echo "���� ��������<br>����� ������� ��� ����!!!<br>";
		?>

		<script language="JavaScript">
			opener.document.formata.text.focus();
			sel = opener.document.selection.createRange();

			<?php
			$img_str="<img src=pictures/".$img_new." border=1>";
			?> 
			
			sel.text="<?php echo $img_str; ?>";
			window.close();
		</script>
		
		<?
		echo "<input type=button value=\"�������\" onClick=\"window.close();\">";
	}
	else {
		echo "<font color=red>������ �������� ����� ��������!!!</font>";
		if(!isset($is_img)  || $is_img!="ok" ){echo "<p>���� �������� ����� ���� ������ <b>gif, jpg, jpeg</b>!</li>";}
		if(!isset($is_file) || $is_file!="ok"){echo "<p>�� �� ������� ���� ��� ��������!</li>";}
		echo "<hr size=1 color=black noshade></a><a href=javascript:history.back(2)><< ���������� ��� ���.</a>";
	}
}

?>

</body>
</html>