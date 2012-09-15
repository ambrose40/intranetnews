<?		
print "<font face='Tahoma' size=2>";
if ($lang=="est")
{print "<p align= center><font face='Tahoma' size=2 color=#3f8cff><b>UUDISTE ARHIIV</b> </font></p>";}
else
{print "<p align= center><font face='Tahoma' size=2 color=#3f8cff><b>¿–’»¬ ÕŒ¬Œ—“≈…</b> </font></p>";}
print "<p align=center>";

include("uudised\connect3.php");
$conn = conn();
$q1 = "select year(Datepost) from newsMain where Archive=1 and titleRus<>'n/a' and year(Datepost)>='2008' group by year(Datepost) order by 1 desc";
    //print $q1;
    $qres1 = mssql_query($q1, $conn);
    $k2 = mssql_num_rows($qres1);
    if ($k2!=0) 
      {
      for ($i1=1;$i1<=$k2;$i1++)
      {
	$a1 = mssql_fetch_row($qres1);
	print "<b><u>".$a1[0].":</u></b> ";

$q2 = "select month(Datepost) from newsMain where Archive=1 and titleRus<>'n/a' and year(Datepost)='".$a1[0]."' group by month(Datepost) order by 1 asc";
    //print $q2;
    $qres1 = mssql_query($q2, $conn);
      for ($i2=1;$i2<=11;$i2++)
      {
	$a2 = mssql_fetch_row($qres1);

	if (strlen($i2) < 2)
	{
	$istr="0".$i2;
	}
	else
	{
	$istr=$i2;
	}
	if ($a2[0]==$i2) {

	print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=p&ye=".$a1[0]."&mo=".$a2[0]."&lang=".$lang."' target='_top'><font face='Tahoma' size=2 style='color: red'> ".$istr." </font></a>| ";
	} else {print $istr." | ";}
      }

	$a2 = mssql_fetch_row($qres1);

	if ($a2[0]==12) {

	print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=p&ye=".$a1[0]."&mo=".$a2[0]."&lang=".$lang."' target='_top'><font face='Tahoma' size=2 style='color: red'> 12 </font></a>";
	} else {print "12 ";}
	print "<br>";
      }
      }
?>
		<b><u>2007:</u></b> 
		
		<?php
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_jaanuar' target='_top'><font face='Tahoma' size=2 style='color: red'> 01 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_veebruar' target='_top'><font face='Tahoma' size=2 style='color: red'> 02 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_marts' target='_top'><font face='Tahoma' size=2 style='color: red'> 03 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_aprill' target='_top'><font face='Tahoma' size=2 style='color: red'> 04 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_mai' target='_top'><font face='Tahoma' size=2 style='color: red'> 05 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_juuli' target='_top'><font face='Tahoma' size=2 style='color: red'> 07 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_august' target='_top'><font face='Tahoma' size=2 style='color: red'> 08 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_september' target='_top'><font face='Tahoma' size=2 style='color: red'> 09 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_oktoober' target='_top'><font face='Tahoma' size=2 style='color: red'> 10 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_november' target='_top'><font face='Tahoma' size=2 style='color: red'> 11 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2007_detsember' target='_top'><font face='Tahoma' size=2 style='color: red'> 12 </font></a>";
		?>		
		<br>

		<b><u>2006:</u></b> 
		<?php
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_jaanuar' target='_top'><font face='Tahoma' size=2 style='color: red'> 01 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_veebruar' target='_top'><font face='Tahoma' size=2 style='color: red'> 02 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_marts' target='_top'><font face='Tahoma' size=2 style='color: red'> 03 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_aprill' target='_top'><font face='Tahoma' size=2 style='color: red'> 04 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_mai' target='_top'><font face='Tahoma' size=2 style='color: red'> 05 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_juuli' target='_top'><font face='Tahoma' size=2 style='color: red'> 07 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_august' target='_top'><font face='Tahoma' size=2 style='color: red'> 08 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_september' target='_top'><font face='Tahoma' size=2 style='color: red'> 09 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_oktoober' target='_top'><font face='Tahoma' size=2 style='color: red'> 10 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_november' target='_top'><font face='Tahoma' size=2 style='color: red'> 11 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2006_detsember' target='_top'><font face='Tahoma' size=2 style='color: red'> 12 </font></a>";
		?>

		<br>


		<b><u>2005:</u></b> 
		<?php
		print "01 | ";
		print "02 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_marts' target='_top'><font face='Tahoma' size=2 style='color: red'> 03 </font></a>|";
		print " 04 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_mai' target='_top'><font face='Tahoma' size=2 style='color: red'> 05 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_juuli' target='_top'><font face='Tahoma' size=2 style='color: red'> 07 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_august' target='_top'><font face='Tahoma' size=2 style='color: red'> 08 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_september' target='_top'><font face='Tahoma' size=2 style='color: red'> 09 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_oktoober' target='_top'><font face='Tahoma' size=2 style='color: red'> 10 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_november' target='_top'><font face='Tahoma' size=2 style='color: red'> 11 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2005_detsember' target='_top'><font face='Tahoma' size=2 style='color: red'> 12 </font></a>";
		?>

		<br>

		
		<b><u>2004:</u></b> 
		<?php
		print "01 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2004_veebruar' target='_top'><font face='Tahoma' size=2 style='color: red'> 02 </font></a>|";
		print " 03 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2004_aprill' target='_top'><font face='Tahoma' size=2 style='color: red'> 04 </font></a>|";
		print " 05 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2004_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print " 07 | ";
		print "08 | ";
		print "09 | ";
		print "10 | ";
		print "11 | ";
		print "12";
		?>
		
		<br>

		
		<b><u>2003:</u></b> 
		<?php
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_jaanuar' target='_top'><font face='Tahoma' size=2 style='color: red'> 01 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_veebruar' target='_top'><font face='Tahoma' size=2 style='color: red'> 02 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_marts' target='_top'><font face='Tahoma' size=2 style='color: red'> 03 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_aprill' target='_top'><font face='Tahoma' size=2 style='color: red'> 04 </font></a>|";
		print " 05 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print " 07 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_august' target='_top'><font face='Tahoma' size=2 style='color: red'> 08 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_september' target='_top'><font face='Tahoma' size=2 style='color: red'> 09 </font></a>|";
		print " 10 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_november' target='_top'><font face='Tahoma' size=2 style='color: red'> 11 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2003_detsember' target='_top'><font face='Tahoma' size=2 style='color: red'> 12 </font></a>";
		?>
		
		<br>

		<b><u>2002:</u></b> 
		
		<?php
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_jaanuar' target='_top'><font face='Tahoma' size=2 style='color: red'> 01 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_veebruar' target='_top'><font face='Tahoma' size=2 style='color: red'> 02 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_marts' target='_top'><font face='Tahoma' size=2 style='color: red'> 03 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_aprill' target='_top'><font face='Tahoma' size=2 style='color: red'> 04 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_mai' target='_top'><font face='Tahoma' size=2 style='color: red'> 05 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_juuni' target='_top'><font face='Tahoma' size=2 style='color: red'> 06 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_juuli' target='_top'><font face='Tahoma' size=2 style='color: red'> 07 </font></a>|";
		print " 08 | ";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_september' target='_top'><font face='Tahoma' size=2 style='color: red'> 09 </font></a>|";
		print "<a href='".$_SERVER['PHP_SELF']."?id=".$id."&name=2002_oktoober' target='_top'><font face='Tahoma' size=2 style='color: red'> 10 </font></a>|";
		print " 11 | ";
		print "12";
		?>
		</p>





		</p>
		<br><br><br><br>
		<center>
		<a href="" TARGET="_top"><img src="image/intra_m.gif" alt="Õ‡ „Î‡‚ÌÛ˛ ÒÚ‡ÌËˆÛ" border="0"></a><br><br><br>







