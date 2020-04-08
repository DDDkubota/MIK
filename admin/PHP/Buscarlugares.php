<?php  

include("conexion.php");

$query= "SELECT p.id_public,u.name_user, p.direccion, p.colonia, p.medida, t.tipo, p.prom_calif 
 from publicacion p inner join tip_vivienda t on t.id_tip=p.id_tipo inner join usuarios u on u.id_user=p.id_user";

$resultado = mysqli_query($mysqli, $query);

if ( !$resultado ){
	die("Error");

}else{
	while( $data= mysqli_fetch_assoc($resultado)){
		$arreglo["data"][] = $data;
	}
	echo json_encode($arreglo);
}

mysqli_free_result($resultado);
mysqli_close($mysqli);


?>