<!DOCTYPE html>

<?php include 'validar.php'?>
<?php include 'conexion.php'?>

    <link rel="stylesheet" href="css/css.css">
    <link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="adminLTE/skins/skin-blue.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="css/estilos.css">
  <!-- Buttons DataTables -->
  <link rel="stylesheet" href="css/buttons.bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIK</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
 
</head>

    <header class="header" >
       <div class="wrapper">
      <div class="logo">
    
 MIK Inmuebles</div>
         
     
      <nav>
          <a href="miperfil.php?f=0">Mi Perfil ( <?php echo $_SESSION['username']?>)</a>
         
          
          <a href="index.php?f=0">Buscar</a>
          <a href="contacto.php?f=1">Contactanos</a>
          <a href="salir.php">Cerrar Sesion</a>

      </nav>
      </div>
      
     
    </header>
    

