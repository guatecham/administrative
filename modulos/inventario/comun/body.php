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
switch ($submodulo) {
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
<h2><a href="../../inicio.php">Inicio</a> -> <?php echo $titulo ?></h2>
<?php include ($segmento); ?>