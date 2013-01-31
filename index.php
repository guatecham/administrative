<!doctype html>
<html lang="us">
<head>
<?php
/*
Esta es una linea para probar con github
*/
?>
	<meta charset="utf-8">
	<title>Cremeria La Oriental</title>
	
	<! 960gs>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/text.css" />
	<link rel="stylesheet" href="css/960_24_col.css" />
	<! /960gs>
	
	<link href="jquery/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	
	<script src="jquery/js/jquery-1.9.0.js"></script>
	<script src="jquery/js/jquery-ui-1.10.0.custom.js"></script>
	
	<style>
	body{
		font: 90% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	</style>
</head>
<body>

<div class="container_24">
<div class="grid_24"><?php include('comun/header.php') ?></div>
<div class="clear"></div>
<div class="grid_24">&nbsp;</div>
<div class="clear"></div>
<! Encabezado !>
<div class="prefix_8 grid_8 sufix_8" align="center"><h1>Ingreso al sistema</h1></div>
<form action="utilidades/control.php" method="POST" id="frm_login" name="frm_login">

<div class="prefix_8 grid_3" align="right"><p>Usuario:</p></div>
<div class="grid_4"><input type="text" id="usuario" name="usuario" value=""></div>
<div class="clear"></div>

<div class="prefix_8 grid_3" align="right"><p>Clave:</p></div>
<div class="grid_4"><input type="password" id="clave" name="clave" value=""></div>
<div class="clear"></div>

<div class="prefix_8 grid_8" align="center"><input type="submit" id="btn_ingresar" name="btn_ingresar" value="Ingresar"></div>
<div class="clear"></div>
</form>
<div class="grid_24"><?php include('comun/footer.php') ?></div>
<div class="clear"></div>
</div>

</body>
</html>
