<table>
	<tr>
		<th width="30%">PRODUCTO</td>
		<th width="10%">INICIAL</td>
		<th width="10%">ENTRADA</td>				
		<th width="10%">SALIDA</td>
		<th width="10%">CAMBIO</td>	
        <th width="10%">FINAL</td>
		<th width="10%">VENDIDO</td>
		<th width="10%">VENTA</td>				
	  </tr>
         
<?php
$sumaInicial = $sumaFinal = $ventaTotal = 0;
$campos = array('inicial', 'entrada', 'salida', 'cambio', 'final');
$sql="SELECT * FROM inf_productos ORDER BY codigo";
$rs=mysql_query($sql,$db);
while ($row=mysql_fetch_object($rs)) {
	
	foreach ($campos as $c) {
		$asignacion = "\$" . $c ." = " . "\$" . "txt_". $c . "_" . $row->id_producto .";";
		eval ($asignacion);
	} // end foreach
		
	$vendido = $inicial + $entrada - $salida -$final;
	$venta = $vendido * $row->precio;
	$sumaInicial+=$inicial;
	$sumaFinal+=$final;
	$ventaTotal+=$venta;

?>	
		<tr>
		<td width="30%"><?php echo "$row->codigo - ".utf8_encode($row->descripcion) ?></td>
		<td width="10%"><input type="text" size="4" name="txt_inicial_<?php echo $row->id_producto ?>" id="txt_inicial_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>'); this.style.backgroundColor='#FCEFA1';" value="<?php echo number_format($inicial,0) ?>"></td>
		
		<td width="10%"><input type="text" size="4" name="txt_entrada_<?php echo $row->id_producto ?>" id="txt_entrada_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>'); this.style.backgroundColor='#FCEFA1';" value="<?php echo number_format($entrada,0) ?>"></td>				
		
		<td width="10%"><input type="text" size="4" name="txt_salida_<?php echo $row->id_producto ?>" id="txt_salida_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>'); this.style.backgroundColor='#FCEFA1';" value="<?php echo number_format($salida,0) ?>"></td>
		
		<td width="10%"><input type="text" size="4" name="txt_cambio_<?php echo $row->id_producto ?>" id="txt_cambio_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>'); this.style.backgroundColor='#FCEFA1';" value="<?php echo number_format($cambio,0) ?>"></td>
		
		<td width="10%"><input type="text" size="3" name="txt_final_<?php echo $row->id_producto ?>" id="txt_final_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>'); this.style.backgroundColor='#FCEFA1';" value="<?php echo number_format($final,0) ?>"></td>
        
        <td width="10%" class="columnaB"><label id="lbl_vendido_<?php echo $row->id_producto ?>"><?php echo number_format($vendido,0) ?></label></td>
		<td width="10%" class="columnaB"><label id="lbl_venta_<?php echo $row->id_producto ?>"><?php echo "Q. ".number_format($venta,2) ?></label></td>
  	</tr>
<?php
} // end while
?>	
<tr class="columnaB">
	<th>&nbsp;</td>
	<th><label id="lbl_sumaInicial"><?php echo number_format($sumaInicial,2) ?></label></td>
	<th colspan="3">&nbsp;</td>
	<th class="columnaB"><label id="lbl_sumaFinal"><?php echo number_format($sumaFinal,2) ?></label></td>
	<th>&nbsp;</td>
        <th><label id="lbl_ventaTotal"><?php echo "Q. ".number_format($ventaTotal,2) ?></label></td>
</tr>
</table>
