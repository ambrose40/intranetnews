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
a.head {color:white;} 
a {color:blue;} 
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

<script language="Javascript">
function goto()
{
window.location='http://intranet/uudised/default.php?add=1';
}

function goDel(a)
{
    if (confirm("�� ������������� ������ ������� ������ ������?")) 
	{
	window.location='http://intranet/uudised/default.php?del=' + a;
	}
}

function goNu(a)
{
    if (confirm("�� ������������� ������ �������� ���� ������������?")) 
	{
	window.location='http://intranet/uudised/default.php?nul=' + a;
	}
}

function goVie(a,b,c)
{
	if (b==0)
	{
	window.location='http://intranet/uudised/uudis_p.php?nid=' + a + '&lang=rus';
	}
	if (b==1)
	{
	window.location='http://intranet/uudised/uudis_p.php?nid=' + a + '&lang=est';
	}
}

function goEdt(a,b,c)
{
	if (c==1) 
	{
	t='link';
	}
	if (c==0) 
	{
	t='page';
	}
	if (b==0)
	{
	window.location='http://intranet/uudised/add.php?nid=' + a + '&lang=rus&typ=' + t;
	}
	if (b==1)
	{
	window.location='http://intranet/uudised/add.php?nid=' + a + '&lang=est&typ=' + t;
	}
}

function Calendar(a,b,c,d)
{
window.open('calendar.php?nid=' + a + '&ya=' + b + '&mo=' + c+ '&da=' + d,'_blank','width=150,height=180,'+'location=no,toolbar=no,menubar=no,status=yes,scroll=yes');return false;
}

</script>
<html><head><META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=windows-1251'><title>������� ��� ������������� ���</title></head><body bgcolor=EEEEEE><center>
<p style="font-family:Lucida Sans Unicode; font-weight:500; font-size:14pt; vertical-align:middle;">*   � � � � � � �&nbsp;&nbsp;&nbsp;� � � � � � � � �&nbsp;&nbsp;&nbsp;� � �   *</p>


<?php

include("connect.php");
$kasutajanimi = (str_replace('\\', '', str_replace('UPRAVLENIE', '', $REMOTE_USER)));
$dostup = dostup($kasutajanimi);
$con = con();

if ($ob.'e'=='e') 
{
$ob="";
$obp="";
}
else
{
$obp="Order by ".substr($ob,1);
}

if ($dostup!=1)

{
print "� ��� ��� ������� �� ������ ��������!";
}
else
{
if ($add==1) 
{
$q = "insert into newsMain (razdelID) values(1)";
$qres = mssql_query($q, $con);
?>
<script>
window.location='http://intranet/uudised/default.php';
</script>
<?}
if ($act!='') 
{
$q = "update newsMain set Archive=0 where NewsId='".$act."'";
$qres = mssql_query($q, $con);
}
if ($arc!='') 
{
$q = "update newsMain set Archive=1 where NewsId='".$arc."'";
$qres = mssql_query($q, $con);
}
if ($nul!='') 
{
$q = "update newsMain set DateActual=0 where NewsId='".$nul."'";
$qres = mssql_query($q, $con);
?>
<script language="Javascript">
window.location='http://intranet/uudised/default.php';
</script>
<?
}
if ($del!='') 
{
$q = "delete newsMain where NewsID=".$del;
$qres = mssql_query($q, $con);
?>
<script>
window.location='http://intranet/uudised/default.php';
</script>
<?php
}

print "<p align=left style='font-size:15;font-weight:600;'>������ ���� ��������:</p>";

print "<p align=left><input type='button' title='�������� ����� ������' value='   ' style='text-decoration:underline;font-weight:600;background-image: url(img\create.png);background-repeat:no-repeat' class='toolbar' onclick='goto()'> </p>";
print "<table border1 style='border-collapse:collapse;' width=100%>";
print "<tr>";
print "<th>�</th>";
print "<th colspan=2>���������</th>";
//print "<th>��������� <img src='http://intranet/images1/est.gif' border=1></th>";

print '<th>';
if (strstr($ob,"m.DatePost ASC")!=FALSE)
{
$oc=str_replace(",m.DatePost ASC",",m.DatePost DESC",$ob);
$sym="<img src=img\down.ico border=0>";
}
else
{
if (strstr($ob,",m.DatePost DESC")!=FALSE)
{
$oc=str_replace(",m.DatePost DESC","",$ob);
$sym="<img src=img\up.ico border=0>";
}
else
{
$oc=$ob.",m.DatePost ASC";
$sym="";
}
}
print '<a class=head title="������������� �� ���� ����������" href="default.php?ob='.$oc.'">���� ����������&nbsp;'.$sym.'</a></th>';


print '<th colspan=2>';
if (strstr($ob,"m.DateActual ASC")!=FALSE)
{
$oc=str_replace(",m.DateActual ASC",",m.DateActual DESC",$ob);
$sym="<img src=img\down.ico border=0>";
}
else
{
if (strstr($ob,",m.DateActual DESC")!=FALSE)
{
$oc=str_replace(",m.DateActual DESC","",$ob);
$sym="<img src=img\up.ico border=0>";
}
else
{
$oc=$ob.",m.DateActual ASC";
$sym="";
}
}
print '<a class=head title="������������� �� ���� ������������" href="default.php?ob='.$oc.'">���� ������������&nbsp;'.$sym.'</a></th>';

print '<th>';
if (strstr($ob,"m.Archive ASC")!=FALSE)
{
$oc=str_replace(",m.Archive ASC",",m.Archive DESC",$ob);
$sym="<img src=img\down.ico border=0>";
}
else
{
if (strstr($ob,",m.Archive DESC")!=FALSE)
{
$oc=str_replace(",m.Archive DESC","",$ob);
$sym="<img src=img\up.ico border=0>";
}
else
{
$oc=$ob.",m.Archive ASC";
$sym="";
}
}
print '<a class=head title="������������� �� �������" href="default.php?ob='.$oc.'">������&nbsp;'.$sym.'</a></th>';

print '<th>';
if (strstr($ob,"s.RazdelID ASC")!=FALSE)
{
$oc=str_replace(",s.RazdelID ASC",",s.RazdelID DESC",$ob);
$sym="<img src=img\down.ico border=0>";
}
else
{
if (strstr($ob,",s.RazdelID DESC")!=FALSE)
{
$oc=str_replace(",s.RazdelID DESC","",$ob);
$sym="<img src=img\up.ico border=0>";
}
else
{
$oc=$ob.",s.RazdelID ASC";
$sym="";
}
}
print '<a class=head title="������������� �� �������" href="default.php?ob='.$oc.'">������&nbsp;'.$sym.'</a></th>';


print "<th colspan=2>����������</th>";
print "</tr>";



	$q = "select m.NewsID, m.TitleRus, m.TitleEst, m.DatePost, m.DateActual, m.Archive, m.TextRus, m.TextEst, s.Description, s.RazdelID, Day(m.DateActual), Month(m.DateActual), year(m.DateActual), m.ExterLink, m.ExterLinkE from newsMain m, newsSections s where m.RazdelID=s.RazdelID ".$obp;;
	//print $q;
	$qres = mssql_query($q, $con);
	$k = mssql_num_rows($qres);

	if ($k!=0) {

		for ($i=1;$i<=$k;$i++){
			$a = mssql_fetch_row($qres);
			if ($a[13]!='n/a') {$t=1;} else {$t=0;}
			
			print "<tr>";
			print "<td rowspan=2  title='������������� � ��:".$a[0]."'>".$i."</td>";
			print "<td title='���.��.'><img style='border-width:1;border-style:solid;border-color:00C000;' src='img/rus.png'></td>";
			print "<td>";
			if ($a[1]=='n/a') 
			{
			print "-�����-";
			}
			else
			{
			if ($t==1) {print "<a href='".$a[13]."'>".$a[1]."</a>";} 
			else
			{print $a[1];}
			}
			print "</td>";	
			print "<td rowspan=2>".$a[3]."</td>";
			print "<td rowspan=2>";
			if ($a[10].".".$a[11].".".$a[12]=='1.1.1900') 
			{
			print "��� �����";
			$d=getdate();
			$ye=$d[year];
			$me=$d[mon];
			$de=$d[mday];
			}
			else
			{
			print $a[10].".".$a[11].".".$a[12];
			$ye=$a[12];
			$me=$a[11];
			$de=$a[10];
			}
			print "</td>";
			print "<td rowspan=2>";
			print "<img src='img/calendar.png' alt='�������� ���� ������������' onClick='Calendar(".$a[0].",".$ye.",".$me.",".$de.")'>";
			print " ' <img src='img/nulldate.PNG' alt='���������� ����������� ���� ������������ �������' onClick='goNu(".$a[0].")'>";
			print "</td>";
			print "<td rowspan=2>";
			if ($a[5]!=0)
			{
			print "<a href='default.php?act=".$a[0]."' title='�������� ������'>-� ������-</a>";
			}
			else
			{
			print "<a href='default.php?arc=".$a[0]."' title='�������� ������'>-�� �����-</a>";
			}
			print "</td>";
			print "<td rowspan=2>".$a[8]."</td>";	

			//print "<td>";
			//if ($a[6]=='n/a') 
			//{
			//print "-�����-";
			//}
			//else
			//{
			//print "<a href='uudis_p.php?nid=".$a[0]."&lang=rus'>�����������</a>";
			//}
			//print "</td>";

			print "<td rowspan=2>";
			print "<img src='img\del.png' alt='������� ��������� ������' onClick='goDel(".$a[0].")'>";
			print "</td>";	
			print "<td>";
			print "<img src='img\edit.png' alt='������������� ��������� ������' onClick='goEdt(".$a[0].",0,".$t.")'> ' ";
			if ($t==1) 
			{
			print "<a href='".$a[13]."'><img border=0 src='img/view.png' alt='����������� ��������� �������'></a>";
			}
			else
			{
			print "<img src='img/view.png' alt='����������� ��������� �������' onClick='goVie(".$a[0].",0,".$t.")'>";
			}
			print "</td>";	
			print "</tr>";

			if ($a[14]!='n/a') {$t=1;} else {$t=0;}
	
			print "<tr>";
			print "<td  title='���.��.'><img style='border-width:1;border-style:solid;border-color:00C000;' src='img/est.png'></td>";
			print "<td>";
			if ($a[2]=='n/a') 
			{
			print "-�����-";		
			}
			else
			{
			if ($t==1) {print "<a href='".$a[14]."'>".$a[2]."</a>";} 
			else
			{print $a[2];}
			}
			print "</td>";	

			print "<td>";
			print "<img src='img/edit.png' border=0 alt='������������� ��������� ������' onClick='goEdt(".$a[0].",1,".$t.")'> ' </a>";
			if ($t==1) 
			{
			print "<a href='".$a[14]."'><img border=0 src='img/view.png' alt='����������� ��������� �������'></a>";
			}
			else
			{
			print "<img src='img/view.png' alt='����������� ��������� �������' onClick='goVie(".$a[0].",1,".$t.")'>";
			}

			print "</td>";	


			//print "<td>";
			//if ($a[7]=='n/a') 
			//{
			//print "-�����-";
			//}
			//else
			//{
			//print "<a href='uudis_p.php?nid=".$a[0]."&lang=est'>�����������</a>";
			//}
			//print "</td>";

			print "</tr>";
		}
	}
	

print "</table>";
}

?>
