<?php
include('utilidades/conex.php');
include('seguridad_sistema/seguridad.php');
if (isset($_REQUEST["seleccion"])) {
	$active = $_REQUEST["seleccion"];	
} else {
	$active = 0;
} 
?>
<!doctype html>
<html lang="us">
<head>
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
	
	<script>
	$(function() {
		
		$( "#accordion" ).accordion({ active: <?php echo $active ?> });
		
	$( "#desde" ).datepicker({
			dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
			monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
			monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
			dateFormat: "dd/mm/yy", 
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onClose: function( selectedDate ) {
				$( "#hasta" ).datepicker( "option", "minDate", selectedDate );
			}
        });
        $( "#hasta" ).datepicker({
	        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
	        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
			monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
	        dateFormat: "dd/mm/yy",
	        defaultDate: "+1w",
	        changeMonth: true,
	        numberOfMonths: 3,
	        onClose: function( selectedDate ) {
		    	$( "#desde" ).datepicker( "option", "maxDate", selectedDate );
		    }
		});
		
		$("#searchProducto").autocomplete("modulos/inventario/scripts/get_productos_list.php", {
			width: 200,
			matchContains: true,
			selectFirst: false
		 });
	
		
	});
	</script>

	
	<style>
	body{
		font: 70.5% "Trebuchet MS", sans-serif;
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
/* General para las tablas del modulo */
            
table {
   width: 100%;
   border: 1px solid #80AEA4;
   background-color: #ECECEC;
}
th {
	font-weight: bold;
	background-color: #80AEA4;
	color: white;	
	font-size: 12px;	
}

th, td {
   vertical-align: top;
   border-collapse: collapse;
   padding: 0.5em;
}
</style>
</head>
<body>
<div class="container_24">
<div class="grid_24"><?php include('comun/header.php') ?></div>
<div class="clear"></div>
<div class="grid_24">&nbsp;</div>
<div class="clear"></div>
<div class="grid_5"><?php include('comun/sidebar.php') ?></div>
<div class="grid_19"><?php include('comun/body.php') ?></div>
<div class="clear"></div>
<div class="grid_24">&nbsp;</div>
<div class="clear"></div>
<div class="grid_24"><?php include('comun/footer.php') ?></div>
<div class="clear"></div>
</div>

</body>
</html>
