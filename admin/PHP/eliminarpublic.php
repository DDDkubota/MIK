<?php 
include("conexion.php");
$id_public=$_GET['id'];
$query="DELETE from publicacion where id_public='$id_public'";
$mysqli->query($query);
header("Location: ../miperfil.php?f=1");




?>