<?php
include ('../../../utilidades/conex.php');


$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "SELECT * FROM inf_sucursales WHERE nombre LIKE '%$q%' OR codigo LIKE '%$q%' ORDER BY cuenta";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_object($rsd)) {
	$cname = utf8_encode("$rs->codigo:$rs->nombre");
	echo "$cname\n";
	//echo $sql;
}

?>