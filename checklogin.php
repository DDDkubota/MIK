<?php
session_start();
?>

<?php

include 'conexionlogin.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion fallo: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['pass'];

$sql = "SELECT * FROM $tbl_name WHERE name_user = '$username'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }
	
 
  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
if ($password==$row ['pass_user']) { 

 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['id']=$row['id_user'];
    $_SESSION['start'] = time();
    $_SESSION['pass'] = $password;
       $_SESSION['expire'] = $_SESSION['start'] + (90 * 90);


    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=admin/index.php>Panel de Control</a>"; 
    header('Location: admin/index.php?f=0');
    //redirecciona a la pagina del usuario
    //redirecciona a la pagina del usuario

 } else { 
  ?> <Script>
      alert("Contraseña o Usuario invalidos")
      window.location.href='index.php?f=0';
      </script>
<?php
   
 }
 mysqli_close($conexion); 
 ?>