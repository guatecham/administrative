<?php
include('../../utilidades/conex.php');
?>
<!doctype html>
 
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Autocomplete - Default functionality</title>
  
  	<! 960gs>
	<link rel="stylesheet" href="../../css/reset.css" />
	<link rel="stylesheet" href="../../css/text.css" />
	<link rel="stylesheet" href="../../css/960_24_col.css" />
	<! /960gs>
	
    <link rel="stylesheet" href="../../css/aux.css" />
        
	<link href="../../jquery/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
	
	<script src="../../jquery/js/jquery-1.9.0.js"></script>
	<script src="../../jquery/js/jquery-ui-1.10.0.custom.js"></script>


	<! autocomplete>
	<link rel="stylesheet" href="autocomplete.css" />
	<script src="autocomplete.js"></script>
	<! autocomplete>
	
  </head>
<body>
 
<div class="ui-widget">
  <label>Seleccione producto: </label>
  <select id="combobox">
    <option value="">Select one...</option>
  
 <?php
 $sql="SELECT * FROM inf_productos ORDER BY descripcion";
 $rs=mysql_query($sql,$db);
 while ($row=mysql_fetch_object($rs)) {
 ?>   
	 <option value="<?php echo $row->id_producto ?>"><?php echo $row->descripcion?></option>
 <?php
 }  // end while
 ?>
  </select>
</div>
 
</body>
</html>