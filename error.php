<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=index.php">
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
<div class="prefix_4 grid_16 sufix_4" align="center">
    <div class="ui-widget">
	<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Error:</strong> Datos de acceso incorrectos, intentelo nuevamente.</p>
                <p>Presione <a href="index.php">aqui</a> o espere a ser redirigido en 5 segundos</p>
        </div>
    </div>
</div>
<div class="grid_24">&nbsp;</div>
<div class="clear"></div>
<div class="grid_24"><?php include('comun/footer.php') ?></div>
<div class="clear"></div>
</div>

</body>
</html>
