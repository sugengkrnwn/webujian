<?php

$host="localhost";
$username="root";
$password="";
$database="u910242882_komen";
$connect=mysql_connect($host,$username,$password);
if(mysql_select_db($database,$connect)==true){
	//echo "sukses";
}else{
	//echo "gagal";
}
?>