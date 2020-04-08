<?php include ('conexion.php');
include ('../validar.php')?>
<?php 
$id_public=$_POST['id_public'];
$ruta='../public/'.$_SESSION['id'].'/'.$id_public.'/gallery/';

$archivo=basename($_FILES['uploadedfile']["name"]);
$tipo_archivo= strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
if($tipo_archivo =="jpg"){
    
    for ($i=1; $i <=10 ; $i++) { 
     if (!file_exists($ruta.$i.'.jpg')) {
        $nombrearchivo=$ruta.basename($_FILES['uploadedfile']["name"]);
        move_uploaded_file($_FILES['uploadedfile']["tmp_name"],$nombrearchivo);
        rename($nombrearchivo,$ruta.$i.'.jpg');
     break;
     }    

    }

    header("Location: ../publicacion.php?g=1&id=$id_public");

}else{

    header("Location: ../agregargaleria.php?g=1&f=$id_public");

}











?>
