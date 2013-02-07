   <table>
        <tr>
            <th width="50%">TIENDAS</th>
<?php 
// !Referencia productos
$aux=explode("/",$fecha); 
$f=$aux[2]."-".$aux[1]."-".$aux[0];
for ($dias=4;$dias>=0;$dias--) {
?>
            <th width="10%"><?php echo date("d/m", strtotime("$f -$dias day")); ?></th>
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
            <td width="50%" onClick="selTienda('<?php echo $row->nombre ?>','<?php echo $row->id_sucursal ?>','<?php echo date('d/m/Y') ?>')"><?php echo $row->nombre ?></td>
<?php
            for ($dias=4;$dias>=0;$dias--) {
                $fecha_aux = date("Y-m-d", strtotime("$f -$dias day"));
                $f_show = explode("-",$fecha_aux);
                $fecha_show = $f_show[2]."/".$f_show[1]."/".$f_show[0];
                $sql="SELECT * FROM data_diario WHERE fecha = '$fecha_aux' AND sucursal = $row->id_sucursal";
                $rs_aux=mysql_query($sql,$db);
                if (mysql_num_rows($rs_aux) > 0) {
                   $aux = '<ul id="icons" class="ui-widget ui-helper-clearfix">';
                   $aux.='<li class="ui-state-default ui-corner-all" title=".ui-icon-check">';
                   $aux.='<span class="ui-icon ui-icon-check"></span></li></ul> ';
                } else {
                    $aux = '&nbsp;';
                }
?>              
            <td width="10%" onClick="selTienda('<?php echo $row->nombre ?>','<?php echo $row->id_sucursal ?>','<?php echo $fecha_show ?>')">
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
