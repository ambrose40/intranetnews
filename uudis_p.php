<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<title>AS Narva Elektrijaamad</title>
</head>

<style type="text/css">
<!--

p {font-family:  Lucida Sans Unicode; color:black; font-size:10pt;}
a {font-family:  Lucida Sans Unicode; color:blue; font-size:10pt; text-decoration:none;}
h3 {font-family: Lucida Sans Unicode; color:black; font-size:13pt; font-weight=bold;}
h2 {font-family: Lucida Sans Unicode; color:black; font-size:16pt; font-weight=bold;}
img {border-color:808080;}
-->
</style>

<body text=black bgcolor=#FFFFFF alink=blue vlink=blue link=blue>

<center>
<table width=90%><tr><td>
<?php
	include("connect.php");
	$kasutajanimi = (str_replace('\\', '', str_replace('UPRAVLENIE', '', $REMOTE_USER)));
	$dostup = dostup($kasutajanimi);
//	$con = con();

	mssql_query ( 'SET TEXTSIZE 65536' , $con);
	ini_set ( 'mssql.textlimit' , '65536' );
	ini_set ( 'mssql.textsize' , '65536' ); 
	$q = "select m.TitleRus, m.TitleEst, CAST(m.TextRus as text), m.TextEst, m.RazdelID, Day(m.datepost),Month(m.datepost),Year(m.datepost) from newsMain m where NewsID=".$nid;
	//print $q;
	$qres = mssql_query($q, $con);
	$k = mssql_num_rows($qres);
	if ($k!=0) 
	{
	$a = mssql_fetch_row($qres);
	//print "|".$a[2]."|";
	if ($lang=="rus")
	{
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


	print "<h3 align=right>";
	
	
	//$today = date($a[5]); 
	if ($lang=="rus") {
	$lang_c="<a href='uudis_p.php?nid=".$nid."&lang=est'><img src=img/est.png alt='Просмотреть данную новость на эстонском языке'></a>";}
	if ($lang=="est") {
	$lang_c="<a href='uudis_p.php?nid=".$nid."&lang=rus'><img src=img/rus.png alt='Vaata seda uudist vene keeles'></a>";}

	print $a[5].".".$a[6].".".$a[7]."  ".$lang_c;
	print "</h3>";

			$ShortText = nl2br($ShortText);
			$ShortText = stripslashes($ShortText);
	
			$text = nl2br($text);
			$text = stripslashes($text);
				
	
			print "<h2 align=center>";
			print "$ShortText";
			print "</h2><HR width=70%><br>";
			print "$text";
			
			print "</td>";

			print "</tr>";
			print "</table>";

?>

	</td></tr>
	</table>

	<br><br><br>

	<p align=center>
<!--	<a href="javascript:history.back(1)" target="_top"><img src="../../Images1/back2.gif" border=0 alt="Назад"></a>-->
	<? 
	print "<table width=100%><tr><td align=center>";
	if ($lang=='est') {print "<a href='http://intranet/?lang=est' target='_top'><img src='../../Images1/home.gif' border=0 alt='Intranet'><br>Intranet</a>";} 
	else {print "<a href='http://intranet/?lang=rus' target='_top'><img src='../../Images1/home.gif' border=0 alt='Интранет'><br>Интранет</a>";} 

	print "</td>";
	print "<td>";
	
	print "    </td>";
	print "<td align=center>";
	if ($lang=='est') {print "<a href='javascript:history.back(1)' target='_top'><img src='../../Images1/back2.gif' border=0 alt='Tagasi'><br>Tagasi</a>";} 
	else {print "<a href='javascript:history.back(1)' target='_top'><img src='../../Images1/back2.gif' border=0 alt='Назад'><br>Назад</a>";} 

	print "</td></tr></table>";
?>
	</p>


</td></tr>
</table>

</body>
</html>