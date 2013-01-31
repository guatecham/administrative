<?php
if (isset($_REQUEST["desde"])) {
	$desde = $_REQUEST["desde"];
} else {
	$desde = date('1/m/Y');	
}

if (isset($_REQUEST["hasta"])) {
	$hasta = $_REQUEST["hasta"];
} else {
	$hasta = date('d/m/Y');	
}

$aux = explode("/",$desde);
$desde_consulta = $aux[2]."-".$aux[1]."-".$aux[0];

$aux = explode("/",$hasta);
$hasta_consulta = $aux[2]."-".$aux[1]."-".$aux[0];

?>
<div class="grid_18 omega" align="right">
<form action="inicio.php" method="post" id="frm_rango" name="frm_rango">
<?php /*
<label for="producto">Producto</label>
<input type="text" name="searchProducto" id="searchProducto" size="30"> */ ?>
<label for="desde">Desde</label>
<input type="text" id="desde" name="desde" value="<?php echo $desde ?>" onChange="document.getElementById('frm_rango').submit()" />
<label for="hasta">Hasta</label>
<input type="text" id="hasta" name="hasta" value="<?php echo $hasta ?>" onChange="document.getElementById('frm_rango').submit()" />
<input type="hidden" id="seleccion" name="seleccion" value="<?php echo $menu_seleccion ?>">
</form>
</div>
<div class="clear"></div>
<br>
<div class="prefix_1 grid_17 sufix_1" align="center">
<table>
	<tr>
		<th width="10%">CODIGO</td>
		<th width="45%">PRODUCTO</td>
		<th width="15%">RECIBIDO</td>				
		<th width="15%">VENTA</td>
		<th width="15%">CAMBIOS</td>				
	</tr>
<?php
$totalRecibido = $totalVenta = $totalCambios = 0;
$sql="SELECT * FROM inf_productos ORDER BY codigo";
$rs=mysql_query($sql,$db);
while ($row=mysql_fetch_object($rs)) {
	$sql="SELECT SUM(entrada), SUM(salida), SUM(cambio) FROM data_diario INNER JOIN data_sub1_diario ON id_reporte = reporte ";
	$sql.="WHERE producto = $row->id_producto AND fecha BETWEEN '$desde_consulta' AND '$hasta_consulta'";
	$rs_aux=mysql_query($sql,$db);
	$row_aux=mysql_fetch_array($rs_aux);
	$recibido = $row_aux["SUM(entrada)"];
	$venta = $row_aux["SUM(salida)"];
	$cambios = $row_aux["SUM(cambio)"];
	
	$totalRecibido+=$recibido;
	$totalVenta+=$venta;
	$totalCambios+=$cambios;
?>
	<tr class="contenido" onMouseOut="this.style.background='#ECECEC'; this.style.color='black';" onMouseOver="this.style.background='#80AEA4'; this.style.color='white';">
		<td width="15%"><?php echo $row->codigo ?></td>
		<td width="40%"><?php echo utf8_encode($row->descripcion) ?></td>
		<td width="15%" align="center"><?php echo number_format($recibido,1) ?></td>				
		<td width="15%" align="center"><?php echo number_format($venta,1) ?></td>
		<td width="15%" align="center"><?php echo number_format($cambios,1) ?></td>				
	</tr>
<?php
} // end while
?>	
	<tr>
		<th colspan="2" align="right">TOTALES</td>
		<th width="15%" align="center"><?php echo number_format($totalRecibido,1) ?></td>				
		<th width="15%" align="center"><?php echo number_format($totalVenta,1) ?></td>
		<th width="15%" align="center"><?php echo number_format($totalCambios,1) ?></td>				
	</tr>
</table>
</div>