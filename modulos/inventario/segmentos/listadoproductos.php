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
$sql="SELECT * FROM inf_productos ORDER BY codigo";
$rs=mysql_query($sql,$db);
while ($row=mysql_fetch_object($rs)) {
?>	
		<tr>
		<td width="30%" class="columnaB"><?php echo "$row->codigo - ".utf8_encode($row->descripcion) ?></td>
		<td width="10%"><input type="text" size="4" name="txt_inicial_<?php echo $row->id_producto ?>" id="txt_inicial_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>');" value="0"></td>
		<td width="10%"><input type="text" size="4" name="txt_entrada_<?php echo $row->id_producto ?>" id="txt_entrada_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>');" value="0"></td>				
		<td width="10%"><input type="text" size="4" name="txt_salida_<?php echo $row->id_producto ?>" id="txt_salida_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>');" value="0"></td>
		<td width="10%"><input type="text" size="4" name="txt_cambio_<?php echo $row->id_producto ?>" id="txt_cambio_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>');" value="0"></td>
		<td width="10%"><input type="text" size="3" name="txt_final_<?php echo $row->id_producto ?>" id="txt_final_<?php echo $row->id_producto ?>" onChange="validarProducto(this,'<?php echo $row->id_producto ?>', '<?php echo $row->precio ?>');" value="0"></td>
                <td width="10%" class="columnaB"><label id="lbl_vendido_<?php echo $row->id_producto ?>">&nbsp;</label></td>
		<td width="10%" class="columnaB"><label id="lbl_venta_<?php echo $row->id_producto ?>">&nbsp;</label></td>
  	</tr>
<?php
} // end while
?>	
</table>
