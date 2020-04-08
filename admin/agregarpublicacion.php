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
  title: '<h1> La imagen debe ser un "jpg"</h1>',
  width: 600,
  padding: '1em',
})
</script>



<?php
}
?>
  

  <form id="contact" enctype="multipart/form-data" action="PHP/agregarpublicacion.php" method="post">
    <h3>Nueva Publicacion</h3>
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
    <fieldset>
      <input placeholder="Direccion" type="text" name="calle" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Colonia" type="text" name="colonia" required>
      Selecciona la ubicacion
    </fieldset>
   
    
    <div id="map"></div>
    
    <fieldset>
    <input type="hidden" id="coordslan" name="lat"/>
    <input type="hidden" id="coordslon" name="lon" />
    </fieldset>
    <fieldset>
      
    <select name="tipo" id=""> Tipo de Bien
          <option value="1">Casa</option>
          <option value="2">Local</option>
          <option value="3">Departamento</option>
    </select>
    </fieldset>
    <fieldset>
      <textarea placeholder="Descripcion Breve" name="text1" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <input placeholder="Medida (Metros Cuadrados)" type="text" name="medida" required>
    </fieldset>
    <fieldset>
        Foto Principal (solo jpg)
    <input placeholder="Subir Foto" name="uploadedfile" type="file" />
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Enviar</button>
    </fieldset>
    
  </form>
</div>

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
        zoom: 13,
        center:new google.maps.LatLng(coords.lat,coords.lng),

      });

      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),

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
    </body>
    </html>