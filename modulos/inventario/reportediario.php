<?php
if (isset($_REQUEST["sucursal"])) {
	$sucursal = $_REQUEST["sucursal"];
} else {
	$sucursal = 0;
}

if ($sucursal != 0) {
	$sql="SELECT * FROM inf_sucursales WHERE id_sucursal = $sucursal";
	$rs=mysql_query($sql,$db);
	$row=mysql_fetch_object($rs);
	$titulo_sucursal = $row->nombre;

} else {
	$titulo_sucursal = "[Seleccione tienda]";
}

if (isset($_REQUEST["fecha"])) {
	$fecha = $_REQUEST["fecha"];
} else {
	$fecha = date('d/m/Y');
}

$aux = explode("/",$fecha);
$fechaSQL = $aux[2]."-".$aux[1]."-".$aux[0];
$sql= "SELECT * FROM data_diario WHERE fecha = '$fechaSQL' AND sucursal = $sucursal";
$rs=mysql_query($sql,$db);
$row=mysql_fetch_object($rs);
if (mysql_num_rows($rs) == 0) { // Se ingresa
	
	// !Datos generales, en blanco	
	$variable = array('VendedorTitular', 'VendedorRotativa'); 
	foreach ($variable as $nombre_campo ) {
		$asignacion = "\$" . $nombre_campo . "='';";
		eval($asignacion); 
	}
	
	$variable=array('BilleteDoscientos', 'BilleteCien', 'BilleteCincuenta','BilleteVeinte', 'BilleteDiez', 'BilleteCinco', 'BilleteUno', 'Moneda');
	foreach ($variable as $nombre_campo ) {
		$asignacion = "\$" . $nombre_campo . " = 0;";
		eval($asignacion); 
	}
	
	// !Datos auxiliares, en blanco	
	$extra = array ('cortes','reventas','otros');
	foreach ($extra as $e) {
		for ($i=0;$i<3;$i++) {
			$asignacion = "\$" . $e . "_txt_" . $i . "='';";
			eval($asignacion); 
			
			$asignacion = "\$" . $e . "_qty_" . $i . "='';";
			eval($asignacion); 			
		} // end for
	} // end foreach

	// !Datos de productos, en blanco
	$sql="SELECT * FROM inf_productos ORDER BY id_producto";
	$rs_aux = mysql_query($sql,$db);
	while ($row_aux = mysql_fetch_object($rs_aux)) {
		
		$campos = array('inicial', 'entrada', 'salida', 'cambio', 'final');
		foreach ($campos as $c) {	
			$asignacion = "\$" . "txt_" . $c . "_" . $row_aux->id_producto ."=0;";
			eval($asignacion); 
		} // end foreach				
	} // end while
	
	
} else { // Ya existe, se recuperan los datos y se asignan a variables

	// !Datos generales, seleccionado
	$variable = array('VendedorTitular', 'VendedorRotativa'); 
	foreach ($variable as $nombre_campo ) {
		$asignacion = "\$" . $nombre_campo . "=\$"."row->".$nombre_campo.";";
		eval($asignacion); 
	}
	
	$variable=array('BilleteDoscientos', 'BilleteCien', 'BilleteCincuenta','BilleteVeinte', 'BilleteDiez', 'BilleteCinco', 'BilleteUno', 'Moneda');
	foreach ($variable as $nombre_campo ) {
		$asignacion = "\$" . $nombre_campo . "=\$"."row->".$nombre_campo.";";
		eval($asignacion); 
	}

	// !Datos auxiliares, seleccionado	
	for ($t=1;$t<=3;$t++) {
		$tipo = array('cortes', 'reventas', 'otros');
		$sql = "SELECT * FROM data_sub2_diario WHERE reporte = $row->id_reporte AND tipo = $t";
		$rs_aux=mysql_query($sql,$db);
		$t_aux=$t-1;
	
		if (mysql_num_rows($rs_aux) > 0) {
				$i=0;
			while ($row_aux = mysql_fetch_object($rs_aux)) {
				$asignacion = "\$" . $tipo[$i+1] . "_txt_" . $t_aux . "=\$"."row_aux->recibe;";
				$asignacion = "\$" . $tipo[$i+1] . "_qty_" . $t_aux . "=\$"."row_aux->monto;";
				eval($asignacion);
				$i++;
			} // end while
		} else {
			for ($i=0;$i<3;$i++) {
				$asignacion = "\$" . $tipo[$i] . "_txt_" . $t_aux . "='';";
				//echo $asignacion."<br>";
				eval($asignacion); 
			
				$asignacion = "\$" . $tipo[$i] . "_qty_" . $t_aux . "='';";
				//echo $asignacion."<br>";
				eval($asignacion); 
			} // end for	
		} // end if-else			
	} // end for
	
	// !Datos de producto, seleccionado
	$sql="SELECT * FROM inf_productos ORDER BY id_producto";
	$rs_aux = mysql_query($sql,$db);
	while ($row_aux = mysql_fetch_object($rs_aux)) {
			
		$campos = array('inicial', 'entrada', 'salida', 'cambio', 'final');
		foreach ($campos as $c) {	
			$sql="SELECT * FROM data_sub1_diario WHERE reporte = $row->id_reporte AND producto = $row_aux->id_producto";
			$rs_aux2 = mysql_query($sql,$db);
			if (mysql_num_rows($rs_aux2) > 0) {
				$row_aux2 = mysql_fetch_object($rs_aux2);
				$asignacion = "\$" . "txt_" . $c . "_" . $row_aux->id_producto . "=\$"."row_aux2->".$c.";";				 
			} else {
				$asignacion = "\$" . "txt_" . $c . "_" . $row_aux->id_producto . "=0;";
			} // end if-else
			eval($asignacion);
		} // end foreach				
	} // end while
			
} // end if
?>
<script type="text/javascript" src="comun/funciones.js"></script>
<script type="text/javascript" src="comun/validaciones.js"></script>

<div class="grid_24 ui-state-highlight ui-corner-all" style="margin-top: 10px; margin-bottom: 10px; padding: 0.9em;">
<form action="index.php" method="POST" name="frm_main" id="frm_main">
		<table>          
            <tr>
                <td width="50%"><strong><label id="tienda" name="tienda"><?php echo $titulo_sucursal ?></label></strong></td>
                <td width="50%"><strong>Fecha</strong><input type="text" id="fecha" name="fecha" size="15" value="<?php echo $fecha ?>"  onchange="document.getElementById('frm_main').submit();"></td>
            </tr> 
         </table>
         <input type="hidden" id="s" name="s" value="<?php echo $s ?>">
         <input type="hidden" id="sucursal" name="sucursal" value="<?php echo $sucursal ?>">
</form>         
</div>

<form action="scripts/adddiario.php" method="POST" name="frm_diario" id="frm_diario">
    <div class="grid_24 ui-state-highlight ui-corner-all" style="margin-top: 10px; margin-bottom: 10px; padding: 0.9em;">
    <div class="grid_9 alpha"><?php include ('segmentos/listadotiendas.php') ?></div>
    <div class="grid_9"><?php include ('segmentos/datosauxiliares.php') ?></div>
    <div class="grid_6 omega"><?php include ('segmentos/datosgenerales.php') ?>
 <?php
// !Boton de ingreso
?>
		<input type="hidden" id="tienda" name="tienda" value="<?php echo $sucursal ?>">
		<input type="hidden" id="fecha" name="fecha" value="<?php echo $fechaSQL ?>">
        <div align="center"><input type="button" id="btn_ingresar" name="btn_ingresar" value="Ingresar informacion" onclick="validarHojaDiario('<?php echo $titulo_sucursal ?>','<?php echo $fecha ?>')"></div>
        <p>&nbsp;</p>
        <div align="center"><input type="button" id="btn_cancelar" name="btn_cancelar" value="Cancelar ingreso" onClick="window.location.reload()"></div>
   </div>       
</div>
<div class="clearfix"></div>

<?php
// !Captura de datos principal
?>

<div class="grid_24" align="left"><?php include('segmentos/listadoproductos.php') ?></div>
</form>
	