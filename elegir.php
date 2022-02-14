<?php
include ("header.php");
session_start();
  $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    $query=mysqli_query($conex,"SELECT nombre FROM empresas_new where id_usuario=".$_SESSION['id_usuario']);
    
    if(isset($_POST['elegir']))
    {
        $estado=$_POST['nombre'];
        echo $estado;
    }
?>
<html>
    <head>
		
    

	

       
    </head>
    <body>
   <form action="elegir.php" class="form-alta" method="post">
            <div>
                <center>
                    <h3>Elige una empresa</h3>
                    <select name="elegir"  style="width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">>
                    <?php 
                        while($datos = mysqli_fetch_array($query))
                        {
                    ?>
                            <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
                    </select>
                  
                </center>
            </div>
        </form>
    </body>
</html>