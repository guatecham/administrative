<style>
#navi {  
	list-style:none;
	margin:0;
	padding:0;
}
#navi li {
	margin:2px;
	padding:2px;
	}
	
ul li a {
	text-decoration:none;
}
ul li a:hover {
	text-decoration:underline;
}	
</style>

<form action="inicio.php" method="post" name="menu" id="menu">
	<input type="hidden" value="" name="seleccion" id="seleccion">
</form>

<script language="javascript">
function escoge(id) { 
	document.getElementById("seleccion").value = id;
	document.getElementById("menu").submit();
} // end function
</script>


<!-- Accordion -->
<div id="accordion">
	<h3><a href="#" onclick="escoge(0);">Inventario</a></h3>
	<div>
	<ul id="navi">
		<li><a href="modulos/inventario/index.php?s=1">Reporte diario</a></li>
		<li><a href="modulos/inventario/index.php?s=2">Hoja de ruta</a></li>
	</div>	
	<h3><a href="#" onclick="escoge(1);">RRHH</a></h3>
	<div>&nbsp;</div>
	<h3><a href="#" onclick="escoge(2);">Caja y bancos</a></h3>
	<div>&nbsp;</div>
	<h3><a href="#" onclick="escoge(3);">Reportes</a></h3>
	<div>&nbsp;</div>
	<h3><a href="#" onclick="escoge(4);">Sistema</a></h3>
	<div>&nbsp;</div>
	<h3><a href="#" onclick="escoge(5);">Salir</a></h3>
	<div><a href="salir.php"><button id="btn_salir">Salir</button></a></div>
</div>

