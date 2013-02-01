<style>
a {
	text-decoration: none;
}
a:hover {
	text-decoration:underline;
}	
</style>

<?php
$titulo = "";
switch ($s) {
	case 1: // 
		$segmento = "reportediario.php";
		$titulo = "Reporte diario";
		break;
	case 2: // 
		$segmento = "hojaderuta.php";
		$titulo = "Hoja de ruta";
		break;			
} // end switch
?>
<p><a href="../../inicio.php">Inicio</a> -> <?php echo $titulo ?></p>
<?php include ($segmento); ?>