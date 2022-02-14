<?php
session_start();
  $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    $query=mysqli_query($conex,"SELECT * FROM empresas_new where id_usuario=".$_SESSION['id_usuario']);
    
    if(isset($_POST['elegir']))
    {
        $estado=$_POST['nombre'];
		
		$consulta = "DELETE FROM empresas_new where id = ".$_POST['elegir']." and id_usuario = ".$_SESSION['id_usuario']."";
		$resultado = mysqli_query($conex,$consulta);
		
	    if ($resultado) {
			
	    	?> 
	    	<h3 class="ok">¡Se ha eliminado correctamente!</h3>
			
           <?php
			
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
		include("baja.php");
        //echo $estado;
    }
?>