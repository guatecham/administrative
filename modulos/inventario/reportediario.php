<div class="grid_16" align="left">
<form>
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
		<td width="10%" class="columnaB"><?php echo "$row->codigo - ".utf8_encode($row->descripcion) ?></td>
		<td width="10%"><input type="text" size="4"></td>
		<td width="10%"><input type="text" size="4"></td>				
		<td width="10%"><input type="text" size="4"></td>
		<td width="10%"><input type="text" size="4"></td>
		<td width="10%" class="columnaB"><input type="text" size="4"></td>
		<td width="10%" class="columnaB"><input type="text" size="4"></td>
		<td width="10%" class="columnaB"><input type="text" size="4"></td>				
	</tr>
<?php
} // end while
?>	
</table>
</form>
</div>	