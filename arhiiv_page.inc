<?		
print "<font face='Tahoma' size=2>";
if ($lang=="est")
{
$l=1;
print "<p align= center><font face='Tahoma' size=2 color=#3f8cff><b>UUDISTE ARHIIV</b> </font></p>";}
else
{
$l=0;
print "<p align= center><font face='Tahoma' size=2 color=#3f8cff><b>¿–’»¬ ÕŒ¬Œ—“≈…</b> </font></p>";}
print "<p align=center>";
print "<table border=0 width=100%>";
include("uudised\connect3.php");
$conn = conn();
$cal[1][0]="ﬂÕ¬¿–ﬂ";
$cal[2][0]="‘≈¬–¿Àﬂ";
$cal[3][0]="Ã¿–“¿";
$cal[4][0]="¿œ–≈Àﬂ";

$cal[5][0]="Ã¿ﬂ";
$cal[6][0]="»ﬁÕﬂ";
$cal[7][0]="»ﬁÀﬂ";
$cal[8][0]="¿¬√”—“¿";

$cal[9][0]="—≈Õ“ﬂ¡–ﬂ";
$cal[10][0]="Œ “ﬂ¡–ﬂ";
$cal[11][0]="ÕŒﬂ¡–ﬂ";
$cal[12][0]="ƒ≈ ¿¡–ﬂ";
$cal[13][0]="œÓ‰Ó·ÌÂÂ...";

$cal[1][1]="JAANUAR";
$cal[2][1]="VEEBRUAR";
$cal[3][1]="M&Auml;RTS";
$cal[4][1]="APRILL";

$cal[5][1]="MAI";
$cal[6][1]="JUUNI ";
$cal[7][1]="JUULI";
$cal[8][1]="AUGUST";

$cal[9][1]="SEPTEMBER";
$cal[10][1]="OKTOOBER";
$cal[11][1]="NOVEMBER";
$cal[12][1]="DETSEMBER";
$cal[13][1]="T&auml;istekst";

if ($l==1) 
{$q1 = "select day(Datepost) from newsMain where Archive=1 and titleEst<>'n/a' and year(Datepost)='".$ye."' and month(datepost)='".$mo."' group by day(Datepost) order by 1 desc";
}
else
{$q1 = "select day(Datepost) from newsMain where Archive=1 and titleRus<>'n/a' and year(Datepost)='".$ye."' and month(datepost)='".$mo."' group by day(Datepost) order by 1 desc";
}

    //print $q1;
    $qres1 = mssql_query($q1, $conn);
    $k2 = mssql_num_rows($qres1);
    if ($k2!=0) 
    {
      for ($i1=1;$i1<=$k2;$i1++)
      {
	$a1 = mssql_fetch_row($qres1);
	print "<tr><td>";
	print "<font size=2 face=Tahoma style='color: black'><b>".$a1[0]." ".$cal[$mo][$l]." ".$ye."</font></b><br>";

if ($l==1) 
{	$q3 = "select * from newsMain where Archive=1 and titleEst<>'n/a' and day(Datepost)='".$a1[0]."' and month(Datepost)='".$mo."' and Year(Datepost)='".$ye."'";
}
else
{	$q3 = "select * from newsMain where Archive=1 and titleRus<>'n/a' and day(Datepost)='".$a1[0]."' and month(Datepost)='".$mo."' and Year(Datepost)='".$ye."'";
}
	//print $q3;
	$qres3 = mssql_query($q3, $conn);
	$k3 = mssql_num_rows($qres3);

	if ($k3!=0) 
        {
          for ($i2=1;$i2<=$k3;$i2++)
          {
            $a3 = mssql_fetch_row($qres3);
            print '<font size=2 face=Tahoma color=black><img src=Images1/1.gif>&nbsp;';
	    print $a3[1];

	    if ($a3[9]!='n/a') 
            {
	      print "<br><a href='".$a3[9]."' target='_top'><font face=Tahoma size=2 color=red>".$cal[13][$l]."</a></i><br>";
 	    }
            else
	    {
	      print "<br><a href='uudised\uudis_p.php?lang=rus&nid=".$a3[0]."' target='_top'><font face=Tahoma size=2 color=red>".$cal[13][$l]."</a></i><br>";
            }
	  }
	}

	print "</tr></td>";
      }
    }
?>


		</table>

		<p align=right>
		<font face="Tahoma" size=2 color=black>
		<a href="javascript:history.back(1)" target="_top" alt="Õ‡Á‡‰"><font face="Tahoma" size=2 color=#3f8cff><u><<<</u></a></font>
		</p>

		<br>
		<center>
		<a href="" TARGET="_top"><img src="image/intra_m.gif" alt="Õ‡ „Î‡‚ÌÛ˛ ÒÚ‡ÌËˆÛ" border="0"></a><br><br><br>