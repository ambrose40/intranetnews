<?
require("/intranet/cnc.php");

function con(){
	
    $con = connect_sql_nb();
    mssql_select_db ("Nastja",$con);
	return ($con);
}
$con=con();

function coni(){
	
    $coni = connect_sql_invrep();
    mssql_select_db ("Invest",$coni);
	return ($coni);
}
$coni=coni();

function Refresh($Str) {
	echo "<HTML><HEAD><META HTTP-EQUIV='Refresh' CONTENT='0; URL=default.php'></HEAD></HTML>";
}

function dostup($kasutajanimi) {
	$con=con();
	$q = "SELECT kasutajanimi NEJNEWS FROM Dostup WHERE kasutajanimi='$kasutajanimi' AND NejNews=1";
	$qres = mssql_query($q, $con);
	$dostup = mssql_num_rows($qres);
	return ($dostup);
}


?>