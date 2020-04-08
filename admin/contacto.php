<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<?php include ('navbar.php'); ?>

<link rel="stylesheet" href="css/formulario.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="container">  
<?php
if($_GET['f']==1){
    $correo="MIK@gmail.com";
    $encabezado="Contacta directamente al equipo de MIK";
}else{
    $correo=$_GET['f'];
    $encabezado="Contactar con usuario";
}



?>
<body>


  <form id="contact" enctype="multipart/form-data" action="PHP/correoenviado.php" method="post">
    <h3><?php echo $encabezado ?></h3>
    
    <fieldset>
      <input placeholder="correo" type="text" readonly=»readonly name="corr" value=<?php echo $correo ?> required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Asunto" type="text" name="asun" required>
      
    </fieldset>
    <fieldset>
    <textarea placeholder="Descripcion Breve" name="text1" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
    </fieldset>
    
  </form>
</div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
    </body>
    </html>