 <?php
/*if(isset($_SESSION['id_usuario'])){
  header('Location:index.php'); 
}*/
include('index.php');
$usuario=$_POST['nombre'];
$contrasena=$_POST['password'];
if(!empty($_POST['nombre'])&&!empty($_POST['password']))
{
session_start();
$_SESSION['id_usuario']=$usuario;


$conexion=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");

if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

$consulta="SELECT DISTINCT*FROM usuarios_new where nombre='$usuario' and password='$contrasena'";


if ($resultado=mysqli_query($conexion,$consulta)) {
$filas=mysqli_num_rows($resultado);
	if($filas>0){
		//print_r($resultado->fetch_assoc());
  $_SESSION['id_usuario']=$resultado->fetch_assoc()['id'];
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
}

//mysqli_free_result($resultado);
}
else{
	?>
    <?php
    include("index.php");

  ?>
  <h1 class="bad">RELLENA LOS CAMPOS</h1>
  <?php
}
