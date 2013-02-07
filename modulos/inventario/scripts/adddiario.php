<?php
include ('../../../utilidades/conex.php');


foreach($_POST as $nombre_campo => $valor)
{
	$asignacion = "$" . $nombre_campo . "='" . $valor . "';";
	eval($asignacion);
}

// Encuentro los id's de Vendedor titular y rotativa
$sql="SELECT * FROM inf_personal WHERE nombre LIKE '$txt_vendedora'";
$rs=mysql_query($sql,$db);
if (mysql_num_rows($rs) == 0) { // No existe, hay que ingresarlo
	$sql="INSERT INTO inf_personal SET nombre = '$txt_vendedora'";
	echo $sql;
	$rs=mysql_query($sql,$db);
	$idVendedorTitular = mysql_insert_id();
} else {
 	$row=mysql_fetch_object($rs);
 	$idVendedorTitular = $row->id_empleado;
}

$sql="SELECT * FROM inf_personal WHERE nombre LIKE '$txt_rotativa'";
$rs=mysql_query($sql,$db);
if (mysql_num_rows($rs) > 0) {
	$row=mysql_fetch_object($rs);
	$idVendedorRotativa = $row->id_empleado;
} else {
	$idVendedorRotativa = 0;
}

$sql="SELECT * FROM data_diario WHERE fecha = '$fecha' AND sucursal = '$tienda'";
$rs=mysql_query($sql,$db);
if (mysql_num_rows($rs) > 0) { // Ya existe, se modifica
	$sql = "UPDATE data_diario SET ";
} else { // No existe, se ingresa.
	$sql = "INSERT INTO data_diario SET ";
}

$sql.="VendedorTitular = $idVendedorTitular, ";
$sql.="VendedorRotativa = $idVendedorRotativa, ";
$sql.="BilleteDoscientos=$txt_doscientos, ";
$sql.="BilleteCien=$txt_cien, ";
$sql.="BilleteCincuenta=$txt_cincuenta, ";
$sql.="BilleteVeinte=$txt_veinte, ";
$sql.="BilleteDiez=$txt_diez, ";
$sql.="BilleteCinco=$txt_cinco, ";
$sql.="BilleteUno=$txt_uno, ";
$sql.="Moneda=$txt_moneda ";

if (mysql_num_rows($rs) > 0) { // Ya existe, se modifica
	$sql.= "WHERE fecha = '$fecha' AND sucursal = $tienda";
} 

$rs=mysql_query($sql,$db);


// Encuentro el numero de reporte
$sql="SELECT * FROM data_diario WHERE fecha = '$fecha' AND sucursal = $tienda";
$rs=mysql_query($sql,$db);
$row=mysql_fetch_object($rs);
$id_reporte = $row->id_reporte;

// Se borra la informacion actual de las tablas data_sub1_diario y data_sub2_diario
/*$sql="DELETE * FROM data_sub1_diario WHERE reporte = $id_reporte";
mysql_query($sql,$db); */

$sql="DELETE * FROM data_sub2_diario WHERE reporte = $id_reporte";
$rs=mysql_query($sql,$db);

// Ingreso de informacion auxiliar
$tipo = 0;
$campos = array('cortes','reventas','otros');
foreach ($campos as $c) {
	$tipo++;
	for ($i=0;$i<3;$i++) {
		$asignacion = "\$". $c . "_txt_" . $i .";";
		if (eval($asignacion) != "") {
			$asignacion2 = "\$" . $c . "_qty_" . $i .";";
			$sql="INSERT INTO data_diario SET recibe = '".eval($asignacion) . "', monto = " . eval($asignacion2) . ", tipo = ". $tipo;
			$rs = mysql_query($sql,$db);
			mysql_free_result($rs);
		} // end if	
	} // end for
} // end foreach


// Ingreso de informacion de productos
$campos = array('inicial','entrada','salida','cambio','final');
$sql="SELECT * FROM inf_productos ORDER BY id_producto";
$rs=mysql_query($sql);
while ($row=mysql_fetch_object($rs)) {
	$sql="SELECT * FROM data_sub1_diario WHERE producto = $row->id_producto AND reporte = $id_reporte";
    $rs_aux = mysql_query($sql,$db);
    if (mysql_num_rows($rs_aux) > 0) { // Ya existe
        $sql="UPDATE data_sub1_diario SET ";
    } else { // No existe
         $sql="INSERT INTO data_sub1_diario SET reporte = $id_reporte, producto = $row->id_producto, ";
    }
        
    $bandera = 0;
    foreach ($campos as $c) {
		$asignacion = "\$aux = ". "\$" . "txt_" . $c . "_" . $row->id_producto . ";";
		eval($asignacion);
		$sql.="$c = $aux, ";
		if ($aux != 0) {
			$bandera = 1;
		}
	} // end foreach
	
	$asignacion = "\$" . "venta = " . "\$" . "txt_inicial_" . $row->id_producto; 
	$asignacion.= " + " . "\$" . "txt_entrada_" . $row->id_producto;
	$asignacion.= " - " . "\$" . "txt_salida_" . $row->id_producto;
	$asignacion.= " - " . "\$" . "txt_final_" . $row->id_producto . ";"; 
	eval($asignacion);
	$r=$venta * $row->precio;
	$sql.="venta = $r";
        if (mysql_num_rows($rs_aux) > 0) { // Ya existe
            $sql.=" WHERE producto = $row->id_producto AND reporte = $id_reporte";
        }        
       if ($bandera != 0) {
       		// echo $sql."<br>";
       		$rs_aux=mysql_query($sql,$db);
       }
    	
} // end while

header("Location: ../index.php");
?>

