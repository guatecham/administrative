<?php
include ('../../../utilidades/conex.php');

$q = strtolower($_GET["q"]);
if (!$q) return;


$sql = "SELECT * FROM inf_productos WHERE descripcion LIKE '%$q%' OR codigo LIKE '%$q%' ORDER BY codigo";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_object($rsd)) {
	$cname = utf8_encode("$rs->codigo:$rs->descipcion");
	echo "$cname\n";
	//echo $sql;
}

?>