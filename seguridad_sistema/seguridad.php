<?php
//Inicio la sesion 
session_start(); 

if (!isset($_SESSION["autentificado"])) {
	header("Location: error.php");
	exit();
} else {
	if ($_SESSION["autentificado"] != "SI") { 
   		header("Location: error.php"); 
   		exit(); 
   	}
}

?>