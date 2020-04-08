<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<link rel="stylesheet" href="admin/css/formulario.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="container">  

<body>


  <form id="contact" enctype="multipart/form-data" action="admin/PHP/agregarusuario.php" method="post">
    <h3>Nuevo Usuario</h3>
    
    <fieldset>
      <input placeholder="nombre de usuario" type="text" name="user" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Correo Electronico" type="text" name="correo" required>
      
    </fieldset>
    <fieldset>
      <input placeholder="Contraseña" type="text" name="pass" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
    </fieldset>
    
  </form>
</div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
    </body>
    </html>