<?php
// !Informacion general

if ($VendedorTitular != '') {
	$sql="SELECT * FROM inf_personal WHERE id_empleado = $VendedorTitular";	
	$rs=mysql_query($sql,$db);
	$row=mysql_fetch_object($rs);
	$show_vendedorTitular = $row->nombre;
} else {
	$show_vendedorTitular = "";
}

if ($VendedorRotativa != '') {
	$sql="SELECT * FROM inf_personal WHERE id_empleado = $VendedorRotativa";
	$rs=mysql_query($sql,$db);
	$row=mysql_fetch_object($rs);
	$show_vendedorRotativa = $row->nombre;
} else {
	$show_vendedorRotativa = "";
}
?>
        <table>          
            <tr>
                <td><label for="vendedora">Vendedora</label></td>
                <td><input type="text" id="txt_vendedora" name="txt_vendedora" size="15" value="<?php echo $show_vendedorTitular ?>" onChange="this.style.backgroundColor='#FCEFA1';"></td>
            </tr> 
            <tr>
                <td><label for="rotativa">Rotativa</label></td>
                <td><input type="text" id="txt_rotativa" name="txt_rotativa" size="15" value="<?php echo $show_vendedorTitular ?>" onChange=" this.style.backgroundColor='#FCEFA1';"></td>
            </tr>        
            
        </table>
 <?php
// !Arqueo de efectivo
$subTotal = 0; 
?>
       
        <table>
            <tr>
                <th colspan="3">MONEDA</th>
            </tr>
            <tr>
                <td><label for="doscientos">Q.200</label></td>
                <td><input type="text" size="3" name="txt_doscientos" id="txt_doscientos" value="<?php echo number_format($BilleteDoscientos,0) ?>" onChange="sumar_arqueo('doscientos'); this.style.backgroundColor='#FCEFA1';" ></td>
                <td><label id="lbl_doscientos"><?php $sub = 200 * $BilleteDoscientos; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
            <tr>
                <td><label for="cien">Q.100</label></td>
                <td><input type="text" size="3" name="txt_cien" id="txt_cien" value="<?php echo number_format($BilleteCien,0) ?>" onChange="sumar_arqueo('cien'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_cien"><?php $sub = 100 * $BilleteCien; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
            <tr>
                <td><label for="cincuenta">Q.50</label></td>
                <td><input type="text" size="3" name="txt_cincuenta" id="txt_cincuenta" value="<?php echo number_format($BilleteCincuenta,0) ?>" onChange="sumar_arqueo('cincuenta'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_cincuenta"><?php $sub = 50 * $BilleteCincuenta; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
                       <tr>
                <td><label for="veinte">Q.20</label></td>
                <td><input type="text" size="3" name="txt_veinte" id="txt_veinte" value="<?php echo number_format($BilleteVeinte,0) ?>" onChange="sumar_arqueo('veinte'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_veinte"><?php $sub = 20 * $BilleteVeinte; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
                       <tr>
                <td><label for="diez">Q.10</label></td>
                <td><input type="text" size="3" name="txt_diez" id="txt_diez" value="<?php echo number_format($BilleteDiez,0) ?>" onChange="sumar_arqueo('diez'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_diez"><?php $sub = 10 * $BilleteDiez; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
                       <tr>
                <td><label for="cinco">Q.5</label></td>
                <td><input type="text" size="3" name="txt_cinco" id="txt_cinco" value="<?php echo number_format($BilleteCinco,0) ?>" onChange="sumar_arqueo('cinco'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_cinco"><?php $sub = 5 * $BilleteCinco; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
                       <tr>
                <td><label for="uno">Q.1</label></td>
                <td><input type="text" size="3" name="txt_uno" id="txt_uno" value="<?php echo number_format($BilleteUno,0) ?>" onChange="sumar_arqueo('uno'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_uno"><?php $sub = 1 * $BilleteUno; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
                       <tr>
                <td><label for="moneda">Moneda</label></td>
                <td><input type="text" size="3" name="txt_moneda" id="txt_moneda" value="<?php echo number_format($Moneda,0) ?>" onChange="sumar_arqueo('moneda'); this.style.backgroundColor='#FCEFA1';"></td>
                <td><label id="lbl_moneda"><?php $sub = $Moneda; echo "Q.".number_format($sub,2); $subTotal+=$sub; ?></label></td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <th colspan="2"><label id="lbl_total_arqueo"><?php echo "Q.".number_format($subTotal,2); ?></label></th>                
            </tr>
        </table>