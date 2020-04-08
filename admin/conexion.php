<?php

$server= 'localhost';
$user= 'root';
$password = '';
$bd = 'mik';

$conexion = mysqli_connect($server, $user, $password, $bd);
$conexion-> set_charset("utf8");
if (!$conexion){
	die("Error de conexion : ".mysqli_connect_errno());

}

?>