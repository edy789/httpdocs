

<!DOCTYPE html>

<head>

    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
<body>

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-6 col-sm-10 bg-dark">
      <form action="validar.php" method="post" class="bg-dark" >



<div class="img-login text-center">
   <img  src="img/logo esiff.png" width="200px" height="100px" >

</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label text-light">Usuario</label>
  <input type="text" class="form-control " id="exampleFormControlInput1" name="nombre" placeholder="Ingrese su nombre">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput2" class="form-label text-light">Contraseña</label>
  <input type="password" class="form-control" id="exampleFormControlInput2" name="password" placeholder="Ingrese su contraseña">
</div>

<!--<p>Usuario <input class="w3-input w3-border w3-round-large"  type="text" placeholder="" name="nombre"></p>-->



<!--<p>Contraseña <input class="w3-input w3-border w3-round-large"  type="password" placeholder="ingrese su contraseña" name="password"></p>-->

<div class="mb-3">

<input class="btn btn-lg btn-primary form-control" type="submit" value="Ingresar">
</div>


</form> 
      </div>
   
   </div>
</div>
   
	
</body>

</html>
