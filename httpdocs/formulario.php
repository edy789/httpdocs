<?php 
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}

include ("header.php");

?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/formulario.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<body>
	
      <form class="form"  action="formulario.php"  method="post">
          <div>
                <center>
                    <div class ="divImg">

                        <img src ="img/logo esiff.png">
</div>
					<div>
                    <h3>Alta de empresas</h3>
</div>
<div class=div1>
<input  type="text" name="nombre" style=" height:40px; width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
</div>

                    <div>	
                    <input class="button" type="submit" name="register" value="Registrar"  style=" height:40px; width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
</div>			
                </center>
         </div>
        </form>
</body>
</html>


<?php 


//include("db.php");
//include ("home.php");
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1) {
	    $name = trim($_POST['nombre']);
	    
	    $consulta = "INSERT INTO empresas_new(nombre,id_usuario) VALUES ('$name',".$_SESSION['id_usuario'].")";
		
	    $resultado = mysqli_query($conex,$consulta);
		
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}
