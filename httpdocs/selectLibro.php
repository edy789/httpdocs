<?php
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}
 include('header.php');

$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
$query=mysqli_query($conex,"SELECT * FROM empresas_new where id_usuario=".$_SESSION['id_usuario']);
  

  
  ?>
  <head>
  <link rel="stylesheet" href="css/formulario.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
</head>
<form class="form" action="libros.php" method="post">
    <center>
    <div class ="divImg">

<img src ="img/logo esiff.png">
</div>
            <div class="div1">
            
                    <h3>Elige una empresa</h3>
                    <select name="elegir"  style="width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">
                    <?php 
                        while($datos = mysqli_fetch_array($query))
                        {
                    ?>
                            <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
                    </select>
                  
            
            </div>
           <div>
                <select name="year" id="" style="width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">

                    <?php 
                    $Year = date("Y");
                    for($i=2021;$i>=2000;$i--){
                        echo("<option value='$i'>$i</option>");
                    }
                    ?>
                </select>
            
                </div>
                <button class="button" type="submit">Seleccionar</button>
                </center>
        </form>
