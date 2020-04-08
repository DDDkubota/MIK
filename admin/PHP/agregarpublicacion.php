<?php include ('conexion.php');
include ('../validar.php')?>
<?php
 $calle=$_POST['calle'];
$colonia=$_POST['colonia'];
$tipo=$_POST['tipo'];
$descrip=$_POST['text1'];
$id=$_SESSION['id'];
$lat=$_POST['lat'];
$lon=$_POST['lon'];
$fichero='../public/'.$_SESSION['id'].'';
$medida=$_POST['medida'];
if(file_exists ( $fichero)){

}else{
    mkdir($fichero,0700);
    echo "fichero creado";
}
$archivo=basename($_FILES['uploadedfile']["name"]);
$tipo_archivo= strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
if($tipo_archivo =="jpg"){


$query = "INSERT INTO publicacion (id_user,direccion,colonia,lat,lon,id_tipo,descrip_public,prom_calif,medida) values 
('$id','$calle','$colonia','$lat','$lon','$tipo','$descrip','0.0','$medida')";


$mysqli->query($query);
$id_public=  $mysqli->insert_id;	
echo $id_public;
$fichero=$fichero.'/'.$id_public;
mkdir($fichero);
$fichero1=$fichero.'/FP';
$fichero2=$fichero.'/gallery';
mkdir($fichero1);
mkdir($fichero2);
$nombrearchivo=$fichero1.basename($_FILES['uploadedfile']["name"]);
move_uploaded_file($_FILES['uploadedfile']["tmp_name"],$nombrearchivo);
rename($nombrearchivo,$fichero1.'/1.jpg');

header("Location: ../index.php?f=1");
}else{
    header("Location: ../agregarpublicacion.php?f=1");
}

?>