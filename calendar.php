<style type="text/css">
<!--
h3 {font-family: Times New Roman; color:black; font-size=18px;}
h2 {font-family: Times New Roman; color:black; font-size=16px;}
p {font-family: Tahoma; color:black; font-size=13px;}

TD {font-family: Tahoma; background-color:F7F7F7; color:black; border-color:999999; border-style:solid; border-width:1; font-size=12px; text-align:center; vertical-align:middle;}
TH {font-family: Tahoma; background-color:000000; color:white; border-color:999999; border-style:solid; border-width:1; font-size=12px; text-align:center; vertical-align:bottom;}
TABLE {border-collapse:collapse; border:0; font-family: Tahoma; color:black; font-size=12px; border-color:777777;}
img {margin:0;padding:0;}
a {text-decoration:none;}
a:link {color:black;} 
a:hover {color:red}
a:visited {color:black}
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

<html><head><META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=windows-1251'><title>Êàëåíäàðü</title></head><body bgcolor=EEEEEE><center>
<?php
$d=getdate();
$tya=$d[year];
$td=$d[mday];
$tmo=$d[mon];


include("connect.php");
$coni = coni();
$con = con();

if ($set!='') 
{
$q = "update newsMain set DateActual='".$mo."-".$da."-".$ya."' where NewsId=".$set."";
print $q;
$qres = mssql_query($q, $con);
?>
<script language="Javascript">
    opener.location.reload(true);
    self.close();
</script>
<?
}

	$q = "select yearr, dayy, c.monthh, monthname, weekD from calendar c, mesjaca m where yearr=".$ya." and c.monthh=".$mo." and c.monthh=m.monthh";
	$qres = mssql_query($q, $coni);
	$k = mssql_num_rows($qres);
	$a = mssql_fetch_row($qres);	
	print "<Table border=1>";
	print "<tr>";
          print "<th colspan=7>";
            print "<a href='calendar.php?ya=".($ya-1)."&mo=".$mo."'><<</a> ".$a[3]."&nbsp;".$ya." <a href='calendar.php?ya=".($ya+1)."&mo=".$mo."'>>></a>";
          print "</th>";
        print "</tr>";
        print "<tr>";
          print "<th>ÂÑ</tH>";
          print "<th>ÏÍ</tH>";
          print "<th>ÂÒ</tH>";
          print "<th>ÑÐ</tH>";
          print "<th>×Ò</tH>";
          print "<th>ÏÒ</tH>";
          print "<th>ÑÁ</tH>";
        print "</tr>";

	if ($k!=0) {

	$q=floor(($a[4]-2+$k)/7)+1;
		for ($i=1;$i<=$q;$i++)
		{
		print "<tr>";
		$j=1;
			for ($j=1;$j<=7;$j++)
			{
			
			if ($a[4]==$j) 
			{
			  if (($a[0]==$tya) and ($a[1]==$td) and ($a[2]==$tmo))
			  {
			    print "<td style='background-color:red;'>";
			  }
			  else
			  {
			    print "<td>";
			  }
			  print "<a href='calendar.php?set=".$nid."&ya=".$ya."&mo=".$mo."&da=".$a[1]."'>";
			  if (($a[0]==$ya) and ($a[1]==$da) and ($a[2]==$mo))
				{
				print "<b>".$a[1]."</b>";
				}
				else
				{
				print $a[1];
				}
			    print "</a>";
			  print "</td>";
			  $a = mssql_fetch_row($qres);
			}
			else
			    print "<td></td>";
			}
		}
	        print "</tr>";
	}
	$mon=$mo+1;
	$mop=$mo-1;
	$yap=$ya;
	$yan=$ya;
	if ($mo==1) 
	{
	$mop=12;
	$yap=$ya-1;
	}
	if ($mo==12) 
	{
	$mon=1;
	$yan=$ya+1;
	}

	$q = "select monthname from mesjaca m where monthh=".($mop);
	$qres = mssql_query($q, $coni);
	$a = mssql_fetch_row($qres);	
        print "<tr>";
	print "<td colspan=3><a href='calendar.php?ya=".$yap."&mo=".($mop)."'>".$a[0]."</a></td>";
	print "<td ><a href='calendar.php?ya=".$tya."&mo=".$tmo."'>*</a></td>";
	$q = "select monthname from mesjaca m where monthh=".($mon);
	$qres = mssql_query($q, $coni);
	$a = mssql_fetch_row($qres);	
	print "<td colspan=3><a href='calendar.php?ya=".$yan."&mo=".($mon)."'>".$a[0]."</a></td>";
        print "</tr>";
