<?php 
if (($lang=='') or ($lang=='rus'))
{
?>
<p align=center><font face="Tahoma" size=2 color=#3f8cff><b>мнбнярх х яннаыемхъ</b></font></p>
<?

include("uudised\connect2.php");
$conn = conn();

$q = "select m.RazdelID, s.Description from newsMain m, newsSections s where m.Archive=0 and titleRus<>'n/a' and m.RazdelID=s.RazdelID Group by m.RazdelID, s.Description";
$qres = mssql_query($q, $conn);
$k = mssql_num_rows($qres);
if ($k!=0) 
  {
  for ($i=1;$i<=$k;$i++)
  {
    $a = mssql_fetch_row($qres);
    print "<p align=justify><font face=Tahoma size=2 color=#3f8cff><b><u>".$a[1]."</u></b></font><br>";
	
    $q2 = "select day(Datepost),month(Datepost),year(Datepost) from newsMain where Archive=0 and titleRus<>'n/a' and razdelid=".$a[0]." group by day(Datepost),month(Datepost),year(Datepost) order by 3 desc, 2 desc,1 desc";
    //print $q2;
    $qres2 = mssql_query($q2, $conn);
    $k2 = mssql_num_rows($qres2);
    if ($k2!=0) 
      {
      for ($i1=1;$i1<=$k2;$i1++)
      {
	$a2 = mssql_fetch_row($qres2);
	if (strlen($a2[0])<2)
	{$d='0'.$a2[0];}
	else
	{$d=$a2[0];}

	if (strlen($a2[1])<2)
	{$m='0'.$a2[1];}
	else
	{$m=$a2[1];}

	if (strlen($a2[2])<2)
	{$y='0'.$a2[2];}
	else
	{$y=$a2[2];}

if ($a[0]!=4) {
	print "<br><font face=Tahoma size=2 color=#3f8cff><b>".$d.".".$m.".".$y."</b></font>";}
	$q3 = "select * from newsMain where Archive=0 and titleRus<>'n/a' and day(Datepost)='".$a2[0]."' and month(Datepost)='".$a2[1]."' and Year(Datepost)='".$a2[2]."' and razdelid=".$a[0]." order by datepost desc";
	//print $q3;
	$qres3 = mssql_query($q3, $conn);
	$k3 = mssql_num_rows($qres3);

	if ($k3!=0) 
        {
          for ($i2=1;$i2<=$k3;$i2++)
          {
            $a3 = mssql_fetch_row($qres3);
            if ($a3[9]!='n/a') 
            {
	      print "<li><a href='".$a3[9]."' target='_top'><font face=Tahoma size=2 color=black>".$a3[1]."</a>";
 	    }
            else
	    {
	      print "<li><a href='uudised/uudis_p.php?lang=rus&nid=".$a3[0]."' target='_top'><font face=Tahoma size=2 color=black>".$a3[1]."</a>";
            }
	  }
	}
      }
    }
  }
}
}
?>
<?php 
if ($lang=='est')
{
?>
<p align= center><font face="Tahoma" size=2 color=#3f8cff><b>UUDISED JA TEATED</b></font></p>

<?
include("uudised\connect3.php");
$conn = conn();

$q = "select m.RazdelID, s.DescriptionE from newsMain m, newsSections s where m.Archive=0 and titleEst<>'n/a' and m.RazdelID=s.RazdelID Group by m.RazdelID, s.DescriptionE";
$qres = mssql_query($q, $conn);
$k = mssql_num_rows($qres);
if ($k!=0) 
  {
  for ($i=1;$i<=$k;$i++)
  {
    $a = mssql_fetch_row($qres);
    print "<p align=justify><font face=Tahoma size=2 color=#3f8cff><b><u>".$a[1]."</u></b></font><br>";
	
    $q2 = "select day(Datepost),month(Datepost),year(Datepost) from newsMain where Archive=0 and titleEst<>'n/a' and razdelid=".$a[0]." group by day(Datepost),month(Datepost),year(Datepost) order by 3 desc, 2 desc,1 desc";
    //print $q2;
    $qres2 = mssql_query($q2, $conn);
    $k2 = mssql_num_rows($qres2);
    if ($k2!=0) 
      {
      for ($i1=1;$i1<=$k2;$i1++)
      {
	$a2 = mssql_fetch_row($qres2);
	if (strlen($a2[0])<2)
	{$d='0'.$a2[0];}
	else
	{$d=$a2[0];}

	if (strlen($a2[1])<2)
	{$m='0'.$a2[1];}
	else
	{$m=$a2[1];}

	if (strlen($a2[2])<2)
	{$y='0'.$a2[2];}
	else
	{$y=$a2[2];}
if ($a[0]!='4') {
	print "<br><font face=Tahoma size=2 color=#3f8cff><b>".$d.".".$m.".".$y."</b></font>";}
	$q3 = "select * from newsMain where Archive=0 and titleEst<>'n/a' and day(Datepost)='".$a2[0]."' and month(Datepost)='".$a2[1]."' and Year(Datepost)='".$a2[2]."' and razdelid=".$a[0]." order by datepost desc";
	//print $q3;
	$qres3 = mssql_query($q3, $conn);
	$k3 = mssql_num_rows($qres3);

	if ($k3!=0) 
        {
          for ($i2=1;$i2<=$k3;$i2++)
          {
            $a3 = mssql_fetch_row($qres3);
            if ($a3[9]!='n/a') 
            {
	      print "<li><a href='".$a3[10]."' target='_top'><font face=Tahoma size=2 color=black>".$a3[2]."</a>";
 	    }
            else
	    {
	      print "<li><a href='uudised/uudis_p.php?lang=est&nid=".$a3[0]."' target='_top'><font face=Tahoma size=2 color=black>".$a3[2]."</a>";
            }
	  }
	}
      }
    }
  }
}

}
print "<br><br>";
?>