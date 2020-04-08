
<?php include ('conexion.php') ?>
<?php
//se inicia las consultas de informacion de la publicacion
$id_public=$_GET['id'];

$query="SELECT p.id_public, p.direccion, p.colonia, p.prom_calif, p.id_user, p.descrip_public, p.lat, p.lon, p.medida, u.name_user,u.mail_user, t.tipo from publicacion p INNER JOIN usuarios u ON u.id_user=p.id_user inner join tip_vivienda t on t.id_tip=p.id_tipo WHERE p.id_public='$id_public'";
$resultado = mysqli_query($conexion, $query);
while($consulta= mysqli_fetch_array($resultado)){
    $calle=$consulta['direccion'];
    $id_user=$consulta['id_user'];
    $calif=$consulta['prom_calif'];
    $ruta="public/".$id_user."/".$id_public."/FP/1.jpg";
    $nombreuser=$consulta['name_user'];
    $tipo_vivienda=$consulta['tipo'];
    $medidas=$consulta['medida'];
    $descrip=$consulta['descrip_public'];
    $lon=$consulta['lon'];
    $lat=$consulta['lat'];
    $correo=$consulta['mail_user'];
}
?>
<style>
       html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        width: 100%;
        height: 40%;
      }
      #coords{width: 500px;}
    </style>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="fluid-gallery.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
   
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    
    
    <link href="css/starrr.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>
<link rel="stylesheet" href="css/formulario.css">
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php include ('navbar.php')?>
<link href="css/starrr.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>

   
    <body>
    <div class="col-md-3" >
                <img class="thumbnail" width= "400px" height= "400px" src=<?php echo $ruta ?> />
            </div>
    <div class="container-fluid">
        <br/>
    <div class="col-md-2"></div>
            
            
        <div class="col-md-6" style="margin-left: 17px;">
             <h2><?php echo $calle ?></h2>
             <h2>Calificacion <?php echo $calif ?></h2>
            <span class="original" ><strong href="index.php">Usuario</strong> <?php echo $nombreuser ?></span>
            <br/>
            
       <?php echo $tipo_vivienda ?>: de <?php echo $medidas ?> m² <br/>
       <?php if($_SESSION['id']==$id_user){?>
        <a href="agregargaleria.php?g=0&f=<?php echo $id_public ?>" class="btn btn-primary">Subir Galeria</a>
       <?php }else{ 
           ?>
          <a href="contacto.php?f=<?php echo $correo ?>" class="btn btn-primary">Contactar</a>
        
            </p>
            <hr/>
            Calificar: <span id="Estrellas"></span>
            <hr/>
            <p>
                <form action="PHP/comentariocalf.php?id=<?php echo $id_public?>" method="post">
                  Añadir Comentario
                  <p>
                    <input hidden type="text" id="stars" name="stars"/>
                    <textarea placeholder="Comentario" name="text1" tabindex="5" required></textarea>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
                </form>
                <?php }  
        ?>
           <h4>Descripcion</h4>
           <?php
           echo $descrip
           ?>
            <h4>Mapa</h4>
            <div id="map"> </div>
<br/><br/>

    
    <div class="col-md-2"></div>
    
    </div>
    <div class="col-md-3" >
    <div class="container gallery-container">

<h1>Galeria</h1>



<div class="tz-gallery">

    <div class="row">
        <?php $fichero="public/$id_user/$id_public/gallery" ; 
      
        if(!file_exists( $fichero.'/1.jpg')){ ?>
        
       <h3 class="wrapper">Imagenes no cargadas :c</h3>
        <?php }else{
            
         
            for ($i=1; $i<=10 ; $i++) { 
              $imageng=$fichero.'/'.$i.'.jpg'; 
                if (file_exists($imageng)) {
                  
                       ?>
 <div class="col-sm-12 col-md-4">
            <a class="lightbox" href=<?php echo $imageng?>>
                <img src=<?php echo $imageng?> alt="Bridge">
            </a>
        </div>

<?php
                }

            }
            ?>
            
           
        <?php }?>
       
       

    </div>

</div>

</div>
            </p>
        </div>
    </div>
    <?php   
    $query5="SELECT c.calif, c.comentario, u.name_user from comentario c inner join usuarios u on u.id_user=c.id_user where c.id_public='$id_public'";
    $resultado3 = mysqli_query($conexion, $query5);

    $cont=1;
    ?>
    
    <h1>Comentarios</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Calificacion</th>
      <th scope="col">Comentario</th>
    </tr>
  </thead>
  <tbody>
    <?php while($consulta3= mysqli_fetch_array($resultado3)) {?>
    <tr>
      <th scope="row"><?php echo $cont?></th>
      <td><?php echo $consulta3['name_user'];?></td>
      <td><?php echo $consulta3['calif'];?></td>
      <td><?php echo $consulta3['comentario'];?></td>
    </tr>
    <?php $cont++; }?>
    
  </tbody>
</table>
</div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
	<script>
   $('#Estrellas').starrr({
       rating:3,
       change:function(e,valor){
        document.getElementById("stars").value= valor;
           
       }
       
   });
    
    </script>

<script>


var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización
alert(coords);
//Funcion principal
initMap = function () 
{

    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            
           
          },function(error){console.log(error);});
    
}



function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 18,
        center:new google.maps.LatLng(<?php echo $lat ?>,<?php echo $lon ?>),

      });

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(<?php echo $lat ?>,<?php echo $lon ?>),

      });
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
      marker.addListener('click', toggleBounce);
      
      marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coordslan").value = this.getPosition().lat();
        document.getElementById("coordslon").value= this.getPosition().lng();
      });
}

//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

// Carga de la libreria de google maps 

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>



    