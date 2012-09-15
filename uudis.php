<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<title>AS Narva Elektrijaamad</title>
</head>

<style type="text/css">
<!--
td {font-family: Lucida Sans Unicode; color:black; font-size=16px;}
th {font-family: Lucida Sans Unicode; color:black; font-size=16px;}
p {font-family:  Lucida Sans Unicode; color:black; font-size=13px;}
p.zagolovok1 {font-family: Lucida Sans Unicode; color:black; font-size=18px; font-weight=bold;}
p.zagolovok2 {font-family: Lucida Sans Unicode; color:black; font-size=22px; font-weight=bold;}
img {border-color:808080;}
-->
</style>

<body text=black bgcolor=#FFFFFF alink=blue vlink=blue link=blue>

<center>
<table width=90%><tr><td>

	<p align=right class="zagolovok1">
	<?php

	$today = getdate(); 
	print $today[mday].".".$today[mon].".".$today[year];
	?>
	</p>

<?php


include("connect.php");
$kasutajanimi = (str_replace('\\', '', str_replace('UPRAVLENIE', '', $REMOTE_USER)));
$dostup = dostup($kasutajanimi);
$con = con();

if ($dostup==1) {
		$message_name = $ShortText;
		$message_text = $text;
		$err = 0;

		if ($message_name=='') {
			print "<p align=center><b><font color=red>Не введено описание сообщения!</font></b></p>";
			$err = $err + 1;
		}
		if ($message_text=='' and $typ=='page') {
			print "<p align=center><b><font color=red>Не введен текст сообщения!</font></b></p>";
			$err = $err + 1;
		}

		if ($err==0) {
			print "<FORM ACTION='update.php?lang=".$lang."&typ=".$typ."' METHOD='post'>";
			?>
			<input type="hidden" name="message_text" value="<?= htmlspecialchars($message_text,ENT_QUOTES)?>">
			<input type="hidden" name="message_name" value="<?= htmlspecialchars($message_name,ENT_QUOTES)?>">


			<?php
			print "<input type=hidden name=extlink value='$extlink'>";
			print "<input type=hidden name=sct value='$sct'>";
			print "<input type=hidden name=nid value='$nid'>";
			$ShortText = nl2br($ShortText);
			$ShortText = stripslashes($ShortText);

			$text = nl2br($text);
			$text = stripslashes($text);
				
	
			print "<p align=center class='zagolovok2'>";
			print "$ShortText";
			print "</p><br>";
			print "$text";
			print "</td>";

			print "<p align=center><table border=0><tr><td style='border:none windowtext .5pt;'><input type=submit name=button2 value='Подтверждаю добавление новости'></p></form></td>";

			print "<td style='border:none windowtext .5pt;'>";
				print "<form action='add.php?lang=".$lang."&typ=".$typ."' method=post enctype=multipart/form-data>";
				print "<input type=hidden name=pic value=$pic>";
				?>
				
				<input type="hidden" name="Mname" value="<?= htmlspecialchars($message_name,ENT_QUOTES)?>">
				<input type="hidden" name="Mtext" value="<?= htmlspecialchars($message_text,ENT_QUOTES)?>">
				
				<?php
				print "<input type=hidden name=extlink value='$extlink'>";
				print "<input type=hidden name=sct value='$sct'>";
				print "<input type=hidden name=nid value='$nid'>";
				print "<input type=submit name=change value='   Изменить   '>";
				print "</form>";
			print "</tr>";
			print "</table>";
}
}
?>

	</td></tr>
	</table>

	<br><br><br>

	<p align=center>
	<? 
	if ($lang=='est') {print "Tagasi<br><a href='javascript:history.back(1)' target='_top'><img src='img/back.png' border=0 alt='Tagasi'></a>";} 
	else {print "Назад<br><a href='javascript:history.back(1)' target='_top'><img src='img/back.png' border=0 alt='Назад'></a>";} 
	?>
	
	</p>


</td></tr>
</table>

</body>
</html>