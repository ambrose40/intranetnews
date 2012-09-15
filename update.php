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

<html><head><META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=windows-1251'><title>Новости для пользователей НЭС</title></head><body bgcolor=EEEEEE><center>
<p style="font-family:Lucida Sans Unicode; font-weight:500; font-size:14pt; vertical-align:middle;">*   Н О В О С Т И&nbsp;&nbsp;&nbsp;И Н Т Р А Н Е Т А&nbsp;&nbsp;&nbsp;Н Э С   *</p><p float=right>
<?php



include("connect.php");
$kasutajanimi = (str_replace('\\', '', str_replace('UPRAVLENIE', '', $REMOTE_USER)));
$dostup = dostup($kasutajanimi);
$con = con();
mssql_query("SET TEXTSIZE 2147483647");

if ($dostup==1) {
	if(!isset($action)) {$action=1;}
//print "<textarea>".$message_text."</textarea>";
	$message_text = stripslashes(stripslashes($message_text));
	$message_text = str_replace('\'', '\'\'', $message_text);

//print "<textarea>".$message_text."</textarea>";

	$message_name = stripslashes(stripslashes($message_name));
	$message_name = str_replace('\'', '\'\'', $message_name);

	//-------------------------------------Вывод текущего сообщения----------------------------------------------
	
	if ($extlink=='') {$extlink='n/a';}
	$qres = mssql_query("SET TEXTSIZE 1024000", $con);
	if ($lang=='rus')
	{
	$q = "update newsMain set razdelid=".$sct.", titleRus='".$message_name."', textRus='".$message_text."', exterLink='".$extlink."' where NewsID=".$nid;
	
	}
	if ($lang=='est')
	{
	$q = "update newsMain set razdelid=".$sct.", titleEst='".$message_name."', textEst='".$message_text."', exterLinkE='".$extlink."' where NewsID=".$nid;
	}
	$qres = mssql_query($q, $con);

	//print strlen($message_text);
	//print "<textarea>".$message_text."</textarea>";
print "<p align=center><b><font color=red>Обновление новости прошло успешно.</b>";
print "<p align=center><a href='default.php'>Архив всех новостей</a>";
}
else {print "<p><b><font color=red>У вас нет доступа.</b>";}

?>

<p align=center><a href='http://intranet/' TARGET='_top'><img src='../../image/intra_m.gif' alt='На главную страницу' border='0'></a></p>
</td></tr></table>

</body>
</html>