<?
require("/intranet/cnc.php");
function conn(){
	
    $conn = connect_sql_nb();
    mssql_select_db ("Nastja",$conn);
	return ($conn);
}
$conn=conn();

function coni(){
	
    $coni = connect_sql_invrep();
    mssql_select_db ("Invest",$coni);
	return ($coni);
}
$coni=coni();

?>