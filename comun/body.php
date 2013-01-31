<?php
switch ($active) {
    case 0: // Hoja de diario (pedidos de tienda)
        include ('modulos/inventario/main.php');
        break;
    case 5:
	include ('modulos/salida.php');
	break;
} // end switch

?>