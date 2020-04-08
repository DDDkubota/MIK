
<?php include ('conexion.php') ?>

<?php include ('navbar.php') ?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php 

if($_GET['f']==1){

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
  title: '<h1> Publicacion Eliminada con exito</h1>',
  width: 600,
  padding: '1em',
})
</script>



<?php
}
?>

<?php
$id_user=$_SESSION['id'];
 $query="SELECT u.name_user, u.mail_user from usuarios u where u.id_user='$id_user'";
$resultado = mysqli_query($conexion, $query);
while($consulta= mysqli_fetch_array($resultado)){
    $name=$consulta['name_user'];
    $correo=$consulta['mail_user'];
}
?>

  <body>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content wrapper">
    <!-- Content Header (Page header) -->
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $name ?></td>
      <td><?php echo $correo ?></td>
      
    </tr>
    </tbody>
       </table> 
    <section class="content-header">
      <h1>
        <section class="content-header">

  </section>
<div class="contenedor">
 <center>
      <h1>
        Tus Sitios
      </h1>
  </center><br> 
 
<h4>
  <div class="row">
    <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
      <div class="col-sm-offset-2 col-sm-8">
        <h3 class="text-center"> <small class="mensaje"></small></h3>
      </div>
      <div class="table-responsive col-sm-12">    
        <table id="dt_pyt" class="table table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>   
              <th>Usuario </th>
            <th>Direccion </th>
            <th>Colonia</th>
            <th>Tipo de Bien</th>
            <th>Metros Cuadrados</th>
            <th>Calificacion</th>
              <th ><a href="agregarpublicacion.php?f=0" class="btn btn-primary">Agregar publicacion</a> </th>                    
            </tr>
          </thead>          
        </table>
      </div>      
    </div>    
  </div>
  



      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>
 <?php include ('scripts.php') ?>

  <script>    
    $(document).on("ready", function(){
    listar();
    });

    var listar = function(){

      var table = $("#dt_pyt").DataTable({
          "ajax":{
             "method":"POST",
             "url":"PHP/tussitios.php"

          },
          "columns":[
                  
                 {"data":"name_user"},
                  {"data":"direccion"},
                  {"data":"colonia"},
                  {"data":"tipo"},
                  {"data":"medida"},
                  {"data":"prom_calif"},
                  {render: function (data, type, row){return `<a class="btn btn-primary" href="publicacion.php?id=${row.id_public}" 
                  role="button">Ver Publicacion</a> <a class="btn btn-danger" onclick="comprobarcontra(${row.id_public});"" 
                  role="button">Eliminar Publicacion</a>  `}}
                   

          ],
          "language": idioma_espanol
      });

     
    }

    var idioma_espanol = {
      "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
    }
    

  </script>
  <script type="text/javascript">
var contr="<?php echo $_SESSION['pass']?>";
</script>
<script type="application/ecmascript">

      function comprobarcontra ($x){
            var x = $x;
          (async function getPassword ($x) {
const {value: password} = await Swal.fire({
  title: 'Ingrese su Contraseña',
  input: 'password',
  inputPlaceholder: 'Ingrese contraseña',
  inputAttributes: {
    maxlength: 12,
    autocapitalize: 'off',
    autocorrect: 'off'
  }
})
if (password==contr) {
location.href='PHP/eliminarpublic.php?id='+x;
}
})()
      }
  </script>


