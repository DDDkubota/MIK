<?php  $mysqli = new mysqli("localhost","root","","mik"); ?>
<?php

$server= 'localhost';
$user= 'root';
$password = '';
$bd = 'mik';

$mysqli = mysqli_connect($server, $user, $password, $bd);
$mysqli-> set_charset("utf8");
if (!$mysqli){
	die("Error de conexion : ".mysqli_connect_errno());

}

?>