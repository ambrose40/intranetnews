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
	</table>
	<table>
	<tr>
	<td width=90%>���������� ������� �� ���� �������� ��� ��������� ������:</td>
    <td width=10%><input type=text name=thumb size=5 value=15></td>
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
	if(isset($image) && ereg(".gif$",$image_name) || ereg(".PNG$",$image_name) || ereg(".png$",$image_name) || ereg(".JPEG$",$image_name) || ereg(".GIF$",$image_name) || ereg(".JPG$",$image_name) || ereg(".jpg$",$image_name) || ereg(".jpeg$",$image_name)) $is_img="ok";
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

<?php 
$img_path=$imgdir.$img_new;
//���������� ������ �� ������� ��������
$ext=substr($img_path,strlen($img_path)-3);
if (($ext=="jpg") or ($ext=="JPG") or ($ext=="jpeg") or ($ext=="JPEG"))
{
$im = imagecreatefromjpeg($img_path);
}
elseif (($ext=="png") or ($ext=="PNG"))
{
$im = imagecreatefrompng($img_path);
}
elseif (($ext=="bmp") or ($ext=="BMP"))
{
$im = imagecreatefrombmp($img_path);
}
elseif (($ext=="gif") or ($ext=="GIF"))
{
$im = imagecreatefromgif($img_path);
}
$prc=$thumb;
$size=getimagesize($img_path);
$dw=$size[0] * $prc /100;
$dh=$size[1] * $prc /100;
print "Height:".$dh;
print "Width:".$dw;
$tim=imagecreate ($dw, $dh);
imagecopyresized ($tim, $im, 0, 0, 0, 0, $dw, $dh, $size[0], $size[1]);
imagepng($tim,$imgdir."thmb_".$img_new);
?>

		<script language="JavaScript">
			opener.document.formata.text.focus();
			sel = opener.document.selection.createRange();

			<?php
			$img_str="<a href='pictures/".$img_new."'><img src='pictures/thmb_".$img_new."' border=1></a>";
			?> 
			
			sel.text="<?php echo $img_str; ?>";
			//window.location="thumb.php?img_new=<?php echo $imgdir.$img_new; ?>&prc=<?php echo $thumb; ?>";
			window.close();
		</script>
		
		<?
		echo "<input type=button value=\"�������\" onClick=\"window.close();\">";
	}
	else {
		echo "<font color=red>������ �������� ����� ��������!!!</font>";
		if(!isset($is_img)  || $is_img!="ok" ){echo "<p>���� �������� ����� ���� ������ <b>png, gif, jpg, jpeg</b>!</li>";}
		if(!isset($is_file) || $is_file!="ok"){echo "<p>�� �� ������� ���� ��� ��������!</li>";}
		echo "<hr size=1 color=black noshade></a><a href=javascript:history.back(2)><< ���������� ��� ���.</a>";
	}
}

?>

</body>
</html>