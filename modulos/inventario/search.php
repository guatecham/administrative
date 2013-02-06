<?php
include ('../../../utilidades/conex.php');


$q = strtolower($_GET["birds"]);

$query = mysql_query("select * from inf_sucursales where nombre like '%$q%'");
while ($row = mysql_fetch_array($query)) {
    echo json_encode($row);
}

?>