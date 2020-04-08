<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<?php include 'navbar.php'?>
<link rel="stylesheet" href="css/formulario.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="container">  

<body>
<?php 

if($_GET['g']==1){

?>
<script type="text/javascript">
  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

Toast.fire({
  type: 'success',
  title: '<h1> La imagen debe ser un "jpg"</h1>',
  width: 600,
  padding: '1em',
})
</script>



<?php
}
?>
  

  <form id="contact" enctype="multipart/form-data" action="PHP/agregargaleria.php" method="post">
    <h3>Agregar Fotografia para galeria</h3>
    
    </style>
    
   
   
    
  
    
   
    
    <fieldset>
      <input  hidden type="text" name="id_public" value=<?php echo $_GET['f'] ?>>
    </fieldset>
    <fieldset>
        Foto galeria (solo jpg)
    <input placeholder="Subir Foto" name="uploadedfile" type="file" />
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
    </fieldset>
    
  </form>
</div>

    </body>
    </html>