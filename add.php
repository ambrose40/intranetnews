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
	sel_2.text="�"
}

</script>

<html><head><META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=windows-1251'><title>������� ��� ������������� ���</title></head><body bgcolor=EEEEEE><center>
<p style="font-family:Lucida Sans Unicode; font-weight:500; font-size:14pt; vertical-align:middle;">*   � � � � � � �&nbsp;&nbsp;&nbsp;� � � � � � � � �&nbsp;&nbsp;&nbsp;� � �   *</p><p float=right>
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


	//-------------------------------------����� �������� ���������----------------------------------------------

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
	print "��������� ���� ������� �� ���� ������� � ���� ������.";
	}

	print "<p><a href='default.php'>����� ���� ��������</a>";
	print "<br><br><br>";

if ($dostup==1) {
	//-------------------------------------���� ������ ���������-------------------------------------------------
	print "<form action='uudis.php?lang=".$lang."&typ=".$typ."' method='post' enctype='multipart/form-data' name='formata'>";
	print "<input type=hidden name=actionT value='$action'>";

	if ($change) {
		$Mname = stripslashes(stripslashes($Mname));
		//$Mname = str_replace('\'', '\'\'', $Mname);
		$Mtext = stripslashes(stripslashes($Mtext));
		//$Mtext = str_replace('\'', '\'\'', $Mtext);
	}

	if (isset($nid)) {print "<input type=hidden name=nid value='$nid'>";}
	
	print "<p><b>���������� �������</b></p>";

	if ($typ=='' or $typ=='page') {
	print "<a href='add.php?typ=link&lang=".$lang."&nid=".$nid."' title='�������� �� ������� � ���� ������'>- ������� � ���� ������ -</a>";

	}
	if ($typ=='link') {
	print "<a href='add.php?typ=page&lang=".$lang."&nid=".$nid."' title='�������� �� ������� � ���� ������'>- ������� � ���� ������ -</a>";
	}

	
	print "<p>��������� �������:<br>";
	if (isset($Mname)) {print "<textarea title='���� ��������� �������� ��� ��������� ������ ��� ����������� � ������� �������� �� ������� �������� ��������� �� ������� �����' name='ShortText' rows=2 style='width:750'>".$Mname."";}
	else {print "<textarea title='���� ��������� �������� ��� ��������� ������ ��� ����������� � ������� �������� �� ������� �������� ��������� �� ������� �����' name='ShortText' rows=2 style='width:750'>".$ShortText."";}
	print "</textarea><br>";
	if ($typ=='' or $typ=='page') {
	print "<p>����� �������:<br>";
	?>

	<p><input type='button' title='������' value=' B ' style='font-weight:600' class='toolbar' onclick='b()'> 
	<input type='button' title='������' value=' I ' style='font-style:italic;font-weight:600' class='toolbar' onclick='i()'> 
	<input type='button' title='�����������' value=' U&nbsp; ' style='text-decoration:underline;font-weight:600' class='toolbar' onclick='u()'> 
	<input type='button' title='�������� �������' value=' R '  style='font-weight:600;color:red;' class='toolbar' onclick='r()'> 
	<input type='button' title='������� ������' value='   '  style='font-weight:600;background-image: url(img\superscript.PNG);background-repeat:no-repeat;' class='toolbar' onclick='sp()'> 
	<input type='button' title='������ ������' value='   '  style='font-weight:600;background-image: url(img\subscript.png);background-repeat:no-repeat;' class='toolbar' onclick='sb()'> 
	<input type='button' title='������� ������' value=' � '  style='font-weight:600;' class='toolbar' onclick='li()'> 
	|
	<input type='button' title='������������ �� ������ ����' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_left.png);background-repeat:no-repeat' class='toolbar' onclick='left()'> 
	<input type='button' title='������������ �� ������' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_center.png);background-repeat:no-repeat' class='toolbar' onclick='center()'> 
	<input type='button' title='������������ �� ������� ����' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_right.png);background-repeat:no-repeat' class='toolbar' onclick='right()'> 
	<input type='button' title='������������ �� ������' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\align_justify.png);background-repeat:no-repeat' class='toolbar' onclick='justify()'> 
	| <a href="picture.php" onclick="window.open('picture.php','_blank','width=500,height=50,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="�������� ��������"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img.png);background-repeat:no-repeat' class='toolbar'></a> <a href="picture_t.php" onclick="window.open('picture_t.php','_blank','width=500,height=150,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="�������� �������� � ������� ��� �������������"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img_t.png);background-repeat:no-repeat' class='toolbar'></a> <a href="picture_e.php" onclick="window.open('picture_e.php','_blank','width=500,height=150,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="���������� ������� �������� � ������� ��� �������������"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\img_ext.png);background-repeat:no-repeat' class='toolbar'></a>  
	| 

	<a href="link.php" onclick="window.open('link.php','_blank','width=550,height=200,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;" onMouseOut="window.status=''; return true;" title="������� ������"><input type='button' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\link.png);background-repeat:no-repeat' class='toolbar'></a></p>


	<?php
	if (isset($Mtext)) {print "<textarea title='���� ��������� ���������� ��� ����� ������ �� ���� ��������������� �� ��������� HTML' name='text' rows=10 style='width:750'>".$Mtext."";}
	else {print "<textarea title='���� ��������� ���������� ��� ����� ������ �� ���� ��������������� �� ��������� HTML' name='text' rows=10 style='width:750'>".stripslashes(htmlspecialchars($text,ENT_QUOTES))."";}
	print "</textarea>";
	print "<input type=hidden name=extlink value='".$extlink."'>";
}
else
{
print "<input type=hidden name=text value='".htmlspecialchars($text,ENT_QUOTES)."'>";
print "<p>���������� ���� ������ ��� ��������:<br>";
if ($extlink!='n/a') 
{
print "<input type=text name=extlink size=100 value='".$extlink."'>";
}
else{
print "<input type=text name=extlink size=100 value=''>";
}
}
	print "<p align=center>���������� ������� � ��������� ��������� �������:</p>";
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

	print "<p align=center><input type=submit name=button1 value='������������'> </p>";
	print "</form>";


	//-------------------------------------�������� ���������������� ��������� ���������-------------------------
	if ($button1) {
		print "<br><hr size=1 width=80%><br>";
		print "<a name=preview>";
		$message_name = $ShortText;
		$message_text = $text;
		$err = 0;

		if ($message_name=='') {
			print "<p align=center><b><font color=red>�� ������� �������� ���������!</font></b></p>";
			$err = $err + 1;
		}
		if ($message_text=='') {
			print "<p align=center><b><font color=red>�� ������ ����� ���������!</font></b></p>";
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
			print "<p align=center><b>������� ��� ������������� ���������</b></p>";
			print "<table width=750 border=1><tr bgcolor=white><td style='border-style:solid; border-width:1px;'>";
			print "<p align=justify>";
			print "$ShortText";
			print "</p><br><br><br>$text";
			print "</td></tr></table>";
			print "</a>";
			
			print "<input type=hidden name=action value='$actionT'>";
			if ($actionT==2) {print "<input type=hidden name=id value='$row_id'>";}

			print "<p align=center><table border=0><tr><td style='border:none windowtext .5pt;'><input type=submit name=button2 value='����������� ���������� ����������'></p></form></td>";

			print "<td style='border:none windowtext .5pt;'>";
				print "<form action=".$PHP_SELF." method=post enctype=multipart/form-data>";
				print "<input type=hidden name=pic value=$pic>";
				?>
				
				<input type="hidden" name="Mname" value="<?= htmlspecialchars($message_name,ENT_QUOTES)?>">
				<input type="hidden" name="Mtext" value="<?= htmlspecialchars($message_text,ENT_QUOTES)?>">
				
				<?php
				print "<input type=hidden name=action value='$actionT'>";
				if ($actionT==2) {print "<input type=hidden name=id value='$row_id'>";}
				print "<input type=submit name=change value='   ��������   '>";
				print "</form>";
			print "</td>";

			print "</tr>";
			print "</table>";

	      }
	}

}
//else {print "<p><b><font color=red>� ��� ��� �������.</b>";}
//else {include("arhiiv.php");}

?>

<p align=center><a href='http://intranet/' TARGET='_top'><img src='../../image/intra_m.gif' alt='�� ������� ��������' border='0'></a></p>
</td></tr></table>

</body>
</html>