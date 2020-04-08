<?php include ('conexion.php');
include ('../validar.php');?>
<?php 
$id_public=$_GET['id'];
$calif=$_POST['stars'];
$coment=$_POST['text1'];
$user_name=$_SESSION['id'];
$query="insert into comentario (id_public,id_user,comentario,calif) values ('$id_public','$user_name','$coment','$calif')";
$mysqli->query($query);
$query2="SELECT SUM(calif) as suma, COUNT(calif) as cuantos FROM comentario WHERE id_public=$id_public";
$resultado = mysqli_query($mysqli, $query2);
while($consulta= mysqli_fetch_array($resultado)){
$suma=$consulta['suma'];
$cuantos=$consulta['cuantos'];
}
$prom=$suma/$cuantos;
$query3="UPDATE publicacion set prom_calif='$prom' where id_public='$id_public'";
$mysqli->query($query3);
header("Location: ../publicacion.php?f=1&id=$id_public");
?>
<Script>
    alert("Comentario añadido con exito");
</Script>