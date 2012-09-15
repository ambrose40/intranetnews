<style type="text/css">
<!--
h3 {font-family: Times New Roman; color:black; font-size=18px;}
h2 {font-family: Times New Roman; color:black; font-size=16px;}
p {font-family: Tahoma; color:black; font-size=13px;}

TD {font-family: Tahoma; color:black; border-color:black; border-style:solid; border-width:1; font-size=12px;border:solid windowtext .5pt; text-align:center;}
TH {font-family: Tahoma; color:black; border-color:black; border-style:solid; border-width:1; font-size=12px;border:solid windowtext .5pt; text-align:center;}
TABLE {border-collapse:collapse; border:0; font-family: Tahoma; color:black; font-size=12px;}

textarea 
{
border: 1px solid black;
}

.toolbar {
	padding-top: 0px;
	padding-bottom: 0px; padding-left: 0px;
	font-family: verdana;
	font-size: 11px; 
	color:black;
	background-color:white;
	border: 1px solid black;
}
-->
</style>

<script language=Javascript>
function b() {
	document.formata.text.focus();
	sel_1=document.selection.createRange();
	sel_1.text="<b>"+sel_1.text+"</b>";
}
function i() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<i>"+sel_2.text+"</i>";
}
function u() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<u>"+sel_2.text+"</u>";
}
function r() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<font color=RED>"+sel_2.text+"</font>";
}

function sb() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<sub>"+sel_2.text+"</sub>";
}
function sp() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<sup>"+sel_2.text+"</sup>";
}

function left() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<p align=LEFT>"+sel_2.text+"</p>";
}
function center() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<p align=CENTER>"+sel_2.text+"</p>";
}
function right() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<p align=RIGHT>"+sel_2.text+"</p>";
}
function justify() {
	document.formata.text.focus();
	sel_2=document.selection.createRange();
	sel_2.text="<p align=JUSTIFY>"+sel_2.text+"</p>";
}

function li() {
	document.formata.text.focus()
	sel_2=document.selection.createRange();
	sel_2.text="•"
}

</script>

<html><head><META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=windows-1251'><title>Новости для пользователей НЭС</title></head><body bgcolor=EEEEEE><center>
<p style="font-family:Lucida Sans Unicode; font-weight:500; font-size:14pt; vertical-align:middle;">*   Н О В О С Т И&nbsp;&nbsp;&nbsp;И Н Т Р А Н Е Т А&nbsp;&nbsp;&nbsp;Н Э С   *</p><p float=right>
<?php
if ($lang=="rus")
{
print "<img src='http://intranet/images1/rus.gif' border=1></p>";
}
if ($lang=="est")
{
print "<img src='http://intranet/images1/est.gif' border=1></p>";
}


include("connect.php");
$kasutajanimi = (str_replace('\\', '', str_replace('UPRAVLENIE', '', $REMOTE_USER)));
$dostup = dostup($kasutajanimi);
$con = con();

//if ($dostup==1) {
	if(!isset($action)) {$action=1;}


	//-------------------------------------Вывод текущего сообщения----------------------------------------------

	$q = "select m.TitleRus, m.TitleEst, m.TextRus, m.TextEst, m.RazdelID, m.ExterLink, m.ExterLinkE from newsMain m where NewsID=".$nid;
	$qres = mssql_query($q, $con);
	$k = mssql_num_rows($qres);

	if ($k!=0) 
	{
	$a = mssql_fetch_row($qres);
	
	if ($lang=="rus")
	{
	if ($a[5]!='n/a')
	{
	$extlink=$a[5];
	}
	if ($a[2]!='n/a')
	{
	$text=$a[2];
	}
	if ($a[0]!='n/a')
	{
	$ShortText=$a[0];
	}	
	}
	if ($lang=="est")
	{
	if ($a[6]!='n/a')
	{
	$extlink=$a[6];
	}
	if ($a[3]!='n/a')
	{
	$text=$a[3];
	}
	if ($a[1]!='n/a')
	{
	$ShortText=$a[1];
	}	
	}
	$sct=$a[4];
	}
	else	
	{
	print "Выбранная вами новость не была найдена в базе данных.";
	}

	print "<p><a href='default.php'>Архив всех новостей</a>";
	print "<br><br><br>";

if ($dostup==1) {
	//-------------------------------------Ввод нового сообщения-------------------------------------------------
	print "<form action='uudis.php?lang=".$lang."&typ=".$typ."' method='post' enctype='multipart/form-data' name='formata'>";
	print "<input type=hidden name=actionT value='$action'>";

	if ($change) {
		$Mname = stripslashes(stripslashes($Mname));
		//$Mname = str_replace('\'', '\'\'', $Mname);
		$Mtext = stripslashes(stripslashes($Mtext));
		//$Mtext = str_replace('\'', '\'\'', $Mtext);
	}

	if (isset($nid)) {print "<input type=hidden name=nid value='$nid'>";}
	
	print "<p><b>ДОБАВЛЕНИЕ НОВОСТИ</b></p>";

	if ($typ=='' or $typ=='page') {
	print "<a href='add.php?typ=link&lang=".$lang."&nid=".$nid."' title='Изменить на новость в виде ссылки'>- новость в виде статьи -</a>";

	}
	if ($typ=='link') {
	print "<a href='add.php?typ=page&lang=".$lang."&nid=".$nid."' title='Изменить на новость в виде статьи'>- новость в виде ссылки -</a>";
	}

	
	print "<p>Заголовок новости:<br>";
	if (isset($Mname)) {print "<textarea title='Сюда вбивается название или заголовок статьи для отображения в перечне новостей на главной странице Интранета на русском языке' name='ShortText' rows=2 style='width:750'>".$Mname."";}
	else {print "<textarea title='Сюда вбивается название или заголовок статьи для отображения в перечне новостей на главной странице Интранета на русском языке' name='ShortText' rows=2 style='width:750'>".$ShortText."";}
	print "</textarea><br>";
	if ($typ=='' or $typ=='page') {
	print "<p>Текст новости:<br>";
	?>

	<p><input type='button' title='Жирный' value=' B ' style='font-weight:600' class='toolbar' onclick='b()'> 
	<input type='button' title='Курсив' value=' I ' style='font-style:italic;font-weight:600' class='toolbar' onclick='i()'> 
	<input type='button' title='Подчеркнуть' value=' U&nbsp; ' style='text-decoration:underline;font-weight:600' class='toolbar' onclick='u()'> 
	<input type='button' title='Выделить красным' value=' R '  style='font-weight:600;color:red;' class='toolbar' onclick='r()'> 
	<input type='button' title='Верхний индекс' value='   '  style='font-weight:600;background-image: url(img\superscript.PNG);background-repeat:no-repeat;' class='toolbar' onclick='sp()'> 
	<input type='button' title='Нижний индекс' value='   '  style='font-weight:600;background-image: url(img\subscript.png);background-repeat:no-repeat;' class='toolbar' onclick='sb()'> 
	<input type='button' title='Элемент списка' value=' • '  style='font-weight:600;' class='toolbar' onclick='li()'> 
	|
	<input type='button' title='Выравнивание по левому краю' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_left.png);background-repeat:no-repeat' class='toolbar' onclick='left()'> 
	<input type='button' title='Выравнивание по центру' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_center.png);background-repeat:no-repeat' class='toolbar' onclick='center()'> 
	<input type='button' title='Выравнивание по правому краю' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_right.png);background-repeat:no-repeat' class='toolbar' onclick='right()'> 
	<input type='button' title='Выравнивание по ширине' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_justify.png);background-repeat:no-repeat' class='toolbar' onclick='justify()'> 
	| <a href="picture.php" onclick="window.open('picture.php','_blank','width=500,height=50,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="Закачать картинку"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img.png);background-repeat:no-repeat' class='toolbar'></a> <a href="picture_t.php" onclick="window.open('picture_t.php','_blank','width=500,height=150,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="Закачать картинку с иконкой для предпросмотра"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img_t.png);background-repeat:no-repeat' class='toolbar'></a> <a href="picture_e.php" onclick="window.open('picture_e.php','_blank','width=500,height=150,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="Прикрепить внешнюю картинку с иконкой для предпросмотра"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img_ext.png);background-repeat:no-repeat' class='toolbar'></a>  
	| 

	<a href="link.php" onclick="window.open('link.php','_blank','width=550,height=200,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="Создать ссылку"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\link.png);background-repeat:no-repeat' class='toolbar'></a></p>


	<?php
	if (isset($Mtext)) {print "<textarea title='Сюда вбивается содержание или текст статьи со всем форматированием по стандарту HTML' name='text' rows=10 style='width:750'>".$Mtext."";}
	else {print "<textarea title='Сюда вбивается содержание или текст статьи со всем форматированием по стандарту HTML' name='text' rows=10 style='width:750'>".stripslashes(htmlspecialchars($text,ENT_QUOTES))."";}
	print "</textarea>";
	print "<input type=hidden name=extlink value='".$extlink."'>";
}
else
{
print "<input type=hidden name=text value='".htmlspecialchars($text,ENT_QUOTES)."'>";
print "<p>Впечатайте сюда ссылку для перехода:<br>";
if ($extlink!='n/a') 
{
print "<input type=text name=extlink size=100 value='".$extlink."'>";
}
else{
print "<input type=text name=extlink size=100 value=''>";
}
}
	print "<p align=center>Разместить новость в следующем новостном разделе:</p>";
	print "<select name=sct>";

	$q = "select * from newsSections order by 1";
	$qres = mssql_query($q, $con);
	$k = mssql_num_rows($qres);

	if ($k!=0) {

		for ($i=1;$i<=$k;$i++){
			$a = mssql_fetch_row($qres);
			if ($a[0]==$sct)
			{
			print "<option selected=true value=".$a[0].">$a[1]</option>";
			}
			else
			{
			print "<option value=".$a[0].">$a[1]</option>";
			}
		}
	}	
	
	print "</select>";

	print "<p align=center><input type=submit name=button1 value='Предпросмотр'> </p>";
	print "</form>";


	//-------------------------------------Создание предварительного просмотра сообщения-------------------------
	if ($button1) {
		print "<br><hr size=1 width=80%><br>";
		print "<a name=preview>";
		$message_name = $ShortText;
		$message_text = $text;
		$err = 0;

		if ($message_name=='') {
			print "<p align=center><b><font color=red>Не введено описание сообщения!</font></b></p>";
			$err = $err + 1;
		}
		if ($message_text=='') {
			print "<p align=center><b><font color=red>Не введен текст сообщения!</font></b></p>";
			$err = $err + 1;
		}

		if ($err==0) {
			print "<FORM ACTION='add.php' METHOD='post'>";
			?>
			<input type="hidden" name="message_text" value="<?= htmlspecialchars($message_text,ENT_QUOTES)?>">
			<input type="hidden" name="message_name" value="<?= htmlspecialchars($message_name,ENT_QUOTES)?>">
			
			<?php

			$ShortText = nl2br($ShortText);
			$ShortText = stripslashes($ShortText);
			//$ShortText = str_replace('\'', '\'\'', $ShortText);
			$text = nl2br($text);
			$text = stripslashes($text);
			//$text = str_replace('\'', '\'\'', $text);
			
			//print "<a name=preview>";
			print "<p align=center><b>Новость для пользователей Интранета</b></p>";
			print "<table width=750 border=1><tr bgcolor=white><td style='border-style:solid; border-width:1px;'>";
			print "<p align=justify>";
			print "$ShortText";
			print "</p><br><br><br>$text";
			print "</td></tr></table>";
			print "</a>";
			
			print "<input type=hidden name=action value='$actionT'>";
			if ($actionT==2) {print "<input type=hidden name=id value='$row_id'>";}

			print "<p align=center><table border=0><tr><td style='border:none windowtext .5pt;'><input type=submit name=button2 value='Подтверждаю добавление объявления'></p></form></td>";

			print "<td style='border:none windowtext .5pt;'>";
				print "<form action=".$PHP_SELF." method=post enctype=multipart/form-data>";
				print "<input type=hidden name=pic value=$pic>";
				?>
				
				<input type="hidden" name="Mname" value="<?= htmlspecialchars($message_name,ENT_QUOTES)?>">
				<input type="hidden" name="Mtext" value="<?= htmlspecialchars($message_text,ENT_QUOTES)?>">
				
				<?php
				print "<input type=hidden name=action value='$actionT'>";
				if ($actionT==2) {print "<input type=hidden name=id value='$row_id'>";}
				print "<input type=submit name=change value='   Изменить   '>";
				print "</form>";
			print "</td>";

			print "</tr>";
			print "</table>";

	      }
	}

}
//else {print "<p><b><font color=red>У вас нет доступа.</b>";}
//else {include("arhiiv.php");}

?>

<p align=center><a href='http://intranet/' TARGET='_top'><img src='../../image/intra_m.gif' alt='На главную страницу' border='0'></a></p>
</td></tr></table>

</body>
</html>