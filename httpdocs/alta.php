<?php
include ("header.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/form.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	
    <form method="post" class="form" action="alta.php">
        <div>
    	<h1>Alta de empresas</h1>
</div>
<div>

    	<input type="text" name="nombre" placeholder="Nombre de empresa">
</div>
<div>
    	<input type="submit" name="register">
</div>
    </form>
        <?php 
       // include("formulario.php");
        ?>
</body>
</html>