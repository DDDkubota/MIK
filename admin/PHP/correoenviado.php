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


$correo=$_POST['corr'];








?>





<script type="application/ecmascript" >



// Attempting to assign a value to a string's .length property has no observable effect. 



var texts ='Correo enviado a <?php echo $correo ?>';




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
   window.location.href='../index.php?f=0';

  }
})


</script>

</body>
</html>