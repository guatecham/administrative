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
$subtotal = 0;
for ($i=0;$i<3;$i++) {
	$asignacion = "\$aux=". "\$". "cortes_txt_" . $i . ";";
	$aux0 = eval ($asignacion);
		
	$asignacion = "\$aux=". "\$". "cortes_qty_" . $i . ";";
	$aux1 = eval ($asignacion);
	$subtotal+=$aux1;
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="cortes_txt_<?php echo $i ?>" id="cortes_txt_<?php echo $i ?>" value="<?php echo $aux0 ?>"></td>
                <td width="30%"><input type="text" size="6" name="cortes_qty_<?php echo $i ?>" id="cortes_qty_<?php echo $i ?>" value="<?php echo number_format($aux1,0) ?>" onChange="validar_extras('cortes')"></td>
            </tr>
<?php
} // end for
?>            
            <tr>
                <td>TOTAL</td>
                <th><label id="total_cortes"><?php echo "Q.".number_format($subtotal,2) ?></label></th>
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
$subtotal=0;
for ($i=0;$i<3;$i++) {
	$asignacion = "\$aux=". "\$". "reventas_txt_" . $i . ";";
	$aux0 = eval ($asignacion);
		
	$asignacion = "\$aux=". "\$". "reventas_qty_" . $i . ";";
	$aux1 = eval ($asignacion);
	$subtotal+=$aux1;
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="reventas_txt_<?php echo $i ?>" id="reventas_txt_<?php echo $i ?>" value="<?php echo $aux0 ?>"></td>
                <td width="30%"><input type="text" size="6" name="reventas_qty_<?php echo $i ?>" id="reventas_qty_<?php echo $i ?>" value="<?php echo number_format($aux1,0) ?>" onChange="validar_extras('reventas')"></td>
            </tr>
<?php
} // end for
?>         
            <tr>
                <td>TOTAL</td>
                <th><label id="total_reventas"><?php echo "Q.".number_format($subtotal,2) ?></label></th>
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
$subtotal=0;
for ($i=0;$i<3;$i++) {
	$asignacion = "\$aux=". "\$". "otros_txt_" . $i . ";";
	$aux0 = eval ($asignacion);
		
	$asignacion = "\$aux=". "\$". "otros_qty_" . $i . ";";
	$aux1 = eval ($asignacion);
	$subtotal+=$aux1;
?>            
            <tr>
                <td width="70%"><input type="text" size="30" name="otros_txt_<?php echo $i ?>" id="otros_txt_<?php echo $i ?>" value="<?php echo $aux0 ?>"></td>
                <td width="30%"><input type="text" size="6" name="otros_qty_<?php echo $i ?>" id="otros_qty_<?php echo $i ?>" value="<?php echo number_format($aux1,0) ?>" onChange="validar_extras('otros')"></td>
            </tr>
<?php
} // end for
?>                  <tr>
                <td>TOTAL</td>
                <th><label id="total_otros"><?php echo "Q.".number_format($subtotal,2) ?></label></th>
            </tr>
        </table>