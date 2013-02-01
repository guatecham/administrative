<?php
// !Funciones
?>
<script language="javascript">
function validar_extras(a) {
	
	total = 0;
	for (i=0;i<3;i++) {
		if (isNaN(document.getElementById(a + '_qty_' + i).value) || document.getElementById(a + '_qty_' + i).value < 0) {
			alert('Los montos deben ser numeros mayores que 0');
			document.getElementById(a + '_qty_' + i).value = 0;
			document.getElementById(a + '_qty_' + i).focus();
			return 0;
		} else {
			total+=parseInt(document.getElementById(a + '_qty_' + i).value);
		}
	} // end for
	document.getElementById('total_' + a).innerText = total;
	
	
} // end function

function sumar_arqueo(a) {
	
//	alert(a);

	total = 0;
	if (isNaN(document.getElementById('txt_' +a).value) || document.getElementById('txt_' + a).value < 0) {
		alert('Los montos de las monedas deben ser numeros mayores que 0');
		document.getElementById('txt_' + a).value = 0;
		document.getElementById('txt_' + a).focus();
		return 0;
	} else {
		total=parseInt(document.getElementById('txt_doscientos').value) * 200;
		total+=parseInt(document.getElementById('txt_cien').value) * 100;
		total+=parseInt(document.getElementById('txt_cincuenta').value) * 50;
		total+=parseInt(document.getElementById('txt_veinte').value) * 20;
		total+=parseInt(document.getElementById('txt_diez').value) * 10;
		total+=parseInt(document.getElementById('txt_cinco').value) * 5;
		total+=parseInt(document.getElementById('txt_uno').value);
		total+=parseInt(document.getElementById('txt_moneda').value);																		
	
		document.getElementById('lbl_doscientos').innerText = parseInt(document.getElementById('txt_doscientos').value) * 200;
		document.getElementById('lbl_cien').innerText = parseInt(document.getElementById('txt_cien').value) * 100;
		document.getElementById('lbl_cincuenta').innerText = parseInt(document.getElementById('txt_cincuenta').value) * 50;
		document.getElementById('lbl_veinte').innerText = parseInt(document.getElementById('txt_veinte').value) * 20;
		document.getElementById('lbl_diez').innerText = parseInt(document.getElementById('txt_diez').value) * 10;
		document.getElementById('lbl_cinco').innerText = parseInt(document.getElementById('txt_cinco').value) * 5;
		document.getElementById('lbl_uno').innerText = document.getElementById('txt_uno').value;
		document.getElementById('lbl_moneda').innerText = document.getElementById('txt_moneda').value;
		
	}
	
	document.getElementById('lbl_total_arqueo').innerText = total;

	
} // end function
</script>

<form action="" method="POST" name="frm_diario" id="frm_diario">
    <div class="grid_24 ui-state-highlight ui-corner-all" style="margin-top: 10px; margin-bottom: 10px; padding: 0.9em;">
    <div class="grid_9 alpha">
 
   <table>
        <tr>
            <th width="50%">TIENDA</th>
<?php 
// !Referencia productos 
$fecha=date('Y-m-d');
for ($dias=4;$dias>=0;$dias--) {
?>
            <th width="10%"><?php echo date("d/m", strtotime("$fecha -$dias day")); ?></th>
<?php            
} // end for  
?>         
        </tr>
 <?php
 $sql="SELECT * FROM inf_sucursales ORDER BY codigo";
 $rs=  mysql_query($sql,$db);
 while ($row=mysql_fetch_object($rs)) {
 ?>
        <tr onMouseOut="this.style.background='#ECECEC'; this.style.color='black';" onMouseOver="this.style.background='#80AEA4'; this.style.color='white';">
            <td><?php echo $row->nombre ?></td>
<?php
            for ($dias=4;$dias>=0;$dias--) {
                $fecha_aux = date("Y-m-d", strtotime("$fecha -$dias day"));
                $sql="SELECT * FROM data_diario WHERE fecha = '$fecha_aux' AND sucursal = $row->id_sucursal";
                $rs_aux=mysql_query($sql,$db);
                if (mysql_num_rows($rs_aux) > 0) {
                    $aux = '<ul id="icons" class="ui-widget ui-helper-clearfix">
                  <li class="ui-state-default ui-corner-all" title=".ui-icon-check"><span class="ui-icon ui-icon-check"></span></li>
                </ul> ';
                } else {
                    $aux = '';
                }
?>              
            <td>
              <?php echo $aux ?>     
            </td>
    <?php
            } // end for
    ?>                
        </tr>
 <?php       
 }
 ?>
    </table>
</div>
    <div class="grid_9">      
<?php
// !Cortes
?>
        <table>
            <tr>
                <th colspan="2">CORTES</th>
            </tr>
            <tr>
                <td width="70%"><strong>RECIBE</strong></td>
                <td width="30%"><strong>MONTO</strong></td>
            </tr>
<?php
for ($i=0;$i<3;$i++) {
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="cortes_txt_<?php echo $i ?>" id="cortes_txt_<?php echo $i ?>"></td>
                <td width="30%"><input type="text" size="6" name="cortes_qty_<?php echo $i ?>" id="cortes_qty_<?php echo $i ?>" value="0" onChange="validar_extras('cortes')"></td>
            </tr>
<?php
} // end for
?>            
            <tr>
                <td>TOTAL</td>
                <th><label id="total_cortes">&nbsp;</label></th>
            </tr>
        </table>
<?php
// !Reventas
?>
        <table>
            <tr>
                <th colspan="2">REVENTAS</th>
            </tr>
            <tr>
                <td width="70%"><strong>RECIBE</strong></td>
                <td width="30%"><strong>MONTO</strong></td>
            </tr>
<?php
for ($i=0;$i<3;$i++) {
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="reventas_txt_<?php echo $i ?>" id="reventas_txt_<?php echo $i ?>"></td>
                <td width="30%"><input type="text" size="6" name="reventas_qty_<?php echo $i ?>" id="reventas_qty_<?php echo $i ?>" value="0" onChange="validar_extras('reventas')"></td>
            </tr>
<?php
} // end for
?>         
            <tr>
                <td>TOTAL</td>
                <th><label id="total_reventas">&nbsp;</label></th>
            </tr>
        </table>
<?php
// !Otros
?>        
        <table>
            <tr>
                <th colspan="2">OTROS</th>
            </tr>
            <tr>
                <td width="70%"><strong>RECIBE</strong></td>
                <td width="30%"><strong>MONTO</strong></td>
            </tr>
 <?php
for ($i=0;$i<3;$i++) {
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="otros_txt_<?php echo $i ?>" id="otros_txt_<?php echo $i ?>"></td>
                <td width="30%"><input type="text" size="6" name="otros_qty_<?php echo $i ?>" id="otros_qty_<?php echo $i ?>" value="0" onChange="validar_extras('otros')"></td>
            </tr>
<?php
} // end for
?>                  <tr>
                <td>TOTAL</td>
                <th><label id="total_otros">&nbsp;</label></th>
            </tr>
        </table>
<?php
// !Informacion general
?>
        
    </div>
    <div class="grid_6 omega">
        <table>
            <tr>
                <td><label for="fecha">Fecha</label></td>
                <td><input type="text" id="fecha" name="fecha" size="15"></td>
            </tr>
            <tr>
                <td><label for="tienda">Tienda</label></td>
                <td><input type="text" id="txt_tienda" name="txt_tienda" size="15"></td>
            </tr> 
            <tr>
                <td><label for="vendedora">Vendedora</label></td>
                <td><input type="text" id="txt_vendedora" name="txt_vendedora" size="15"></td>
            </tr>        
            
        </table>
 <?php
// !Arqueo de efectivo
?>
       
        <table>
            <tr>
                <th colspan="3">MONEDA</th>
            </tr>
            <tr>
                <td><label for="doscientos">Q.200</label></td>
                <td><input type="text" size="3" name="txt_doscientos" id="txt_doscientos" value="0" onChange="sumar_arqueo('doscientos')"></td>
                <td><label id="lbl_doscientos">&nbsp;</label></td>
            </tr>
            <tr>
                <td><label for="cien">Q.100</label></td>
                <td><input type="text" size="3" name="txt_cien" id="txt_cien" value="0" onChange="sumar_arqueo('cien')"></td>
                <td><label id="lbl_cien">&nbsp;</label></td>
            </tr>
            <tr>
                <td><label for="cincuenta">Q.50</label></td>
                <td><input type="text" size="3" name="txt_cincuenta" id="txt_cincuenta" value="0" onChange="sumar_arqueo('cincuenta')"></td>
                <td><label id="lbl_cincuenta">&nbsp;</label></td>
            </tr>
                       <tr>
                <td><label for="veinte">Q.20</label></td>
                <td><input type="text" size="3" name="txt_veinte" id="txt_veinte" value="0" onChange="sumar_arqueo('veinte')"></td>
                <td><label id="lbl_veinte">&nbsp;</label></td>
            </tr>
                       <tr>
                <td><label for="diez">Q.10</label></td>
                <td><input type="text" size="3" name="txt_veinte" id="txt_diez" value="0" onChange="sumar_arqueo('diez')"></td>
                <td><label id="lbl_veinte">&nbsp;</label></td>
            </tr>
                       <tr>
                <td><label for="cinco">Q.5</label></td>
                <td><input type="text" size="3" name="txt_cinco" id="txt_cinco" value="0" onChange="sumar_arqueo('cinco')"></td>
                <td><label id="lbl_cinco">&nbsp;</label></td>
            </tr>
                       <tr>
                <td><label for="uno">Q.1</label></td>
                <td><input type="text" size="3" name="txt_uno" id="txt_uno" value="0" onChange="sumar_arqueo('uno')"></td>
                <td><label id="lbl_uno">&nbsp;</label></td>
            </tr>
                       <tr>
                <td><label for="moneda">Moneda</label></td>
                <td><input type="text" size="3" name="txt_moneda" id="txt_moneda" value="0" onChange="sumar_arqueo('moneda')"></td>
                <td><label id="lbl_moneda">&nbsp;</label></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <th colspan="2"><label id="lbl_total_arqueo">&nbsp;</label></th>                
            </tr>
        </table>
 <?php
// !Boton de ingreso
?>

        <div align="center"><input type="button" id="btn_ingresar" name="btn_ingresar" value="Ingresar informacion"></div>
    </div>       
</div>
<div class="clearfix"></div>

<?php
// !Captura de datos principal
?>

<div class="grid_24" align="left">
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
		<td width="10%"><input type="text" size="4" name="txt_inicial_<?php echo $row->id_producto ?>" id="txt_inicial_<?php echo $row->id_producto ?>"></td>
		<td width="10%"><input type="text" size="4" name="txt_entrada_<?php echo $row->id_producto ?>" id="txt_entrada_<?php echo $row->id_producto ?>"></td>				
		<td width="10%"><input type="text" size="4" name="txt_salida_<?php echo $row->id_producto ?>" id="txt_salida_<?php echo $row->id_producto ?>"></td>
		<td width="10%"><input type="text" size="4" name="txt_cambio_<?php echo $row->id_producto ?>" id="txt_cambio_<?php echo $row->id_producto ?>"></td>
		<td width="10%"><input type="text" size="3" name="txt_final_<?php echo $row->id_producto ?>" id="txt_final_<?php echo $row->id_producto ?>"></td>
        <td width="10%" class="columnaB"><label for="lbl_vendido_<?php echo $row->id_producto ?>">&nbsp;</label></td>
		<td width="10%" class="columnaB"><label for="lbl_venta_<?php echo $row->id_producto ?>">&nbsp;</label></td>
  	</tr>
<?php
} // end while
?>	
</table>
</div>
</form>
	