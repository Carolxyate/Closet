<?php 
	$conexion=new mysqli("localhost", "root", "", "registro_usuarios");
	if($conexion->connect_error)
	{
		die("Fallo en la Conexion con la BD...");
	}else
	{
		//echo "Conexion Realizada correctamente....";
	}


 ?>