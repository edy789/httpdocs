<?php
session_start();//en cada archivo escribir session start

if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}
?>

<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
<body>

<div class="container">
   <div class="row justify-content-center">
   
    
<div class="img-login text-center">
   <img  class="img" src="img/logo esiff.png" width="250px" height="150px" >

</div>
<center>


<div class="mb-3">

<input class="boton"  type="button" onclick="location.href='formulario.php'" value="Analisis económico" >

<input class="boton"  type="button" value="Prueba">

<input class="boton"  type="button" value="Prueba">
</div>
</center>


      </div>
   
   </div>

   
	
</body>

</html>
