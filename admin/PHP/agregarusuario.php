<!DOCTYPE html>
<html>
<head>
	<title> MIk</title>


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<?php
include ('conexion.php')?>
<?php

$user=$_POST['user'];
$pass=$_POST['pass'];
$correo=$_POST['correo'];
$infor=$_POST['text1'];


$archivo=basename($_FILES['uploadedfile']["name"]);
$tipo_archivo= strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
if($tipo_archivo =="jpg"){


$query = "INSERT into usuarios (name_user,info_user,mail_user,pass_user) values ('$user','$infor','$correo','$pass')";


$mysqli->query($query);
echo $id_user=  $mysqli->insert_id;	
$fichero='../public/'.$id_user.'';
mkdir($fichero,0700);
$fichero1=$fichero.'/FP';
mkdir($fichero1,0700);
$nombrearchivo=$fichero1.basename($_FILES['uploadedfile']["name"]);
move_uploaded_file($_FILES['uploadedfile']["tmp_name"],$nombrearchivo);
rename($nombrearchivo,$fichero1.'/1.jpg');



?>






<script type="application/ecmascript" >



// Attempting to assign a value to a string's .length property has no observable effect. 



var texts ='Nuevo Usuario Registrado ';



Swal.fire({
  title: texts,
   allowOutsideClick: false,
   allowEscapeKey: false,
  width: 600,
  padding: '1em',
 type: 'success',
  background: '#fff',
  backdrop: `
    rgba(41, 204, 41 ,0.73)
  `
}).then((result) => {
  if (result.value) {
   window.location.href='../../index.php';

  }
})



</script>
<?php } else{ ?>
  <script type="application/ecmascript" >



// Attempting to assign a value to a string's .length property has no observable effect. 



var texts ='La imagen debe ser .jpg';




Swal.fire({
  title: texts,
   allowOutsideClick: false,
   allowEscapeKey: false,
  width: 600,
  padding: '1em',
 type: 'error',
  background: '#fff',
  backdrop: `
    rgba(41, 204, 41 ,0.73)
  `
}).then((result) => {
  if (result.value) {
   window.location.href='../../index.php';

  }
})


</script>
<?php }?>

</body>
</html>