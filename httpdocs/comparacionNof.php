<?php 



include ("header.php");
include("data/calcularNof.php");
session_start();//en cada archivo escribir session start
$comp = new Comparaciones();
$idlibro1=0;
$idlibro2=0;
$yearmenor=0;
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
$nof=null;
if(isset($_GET['year'])){
	$year=$_GET['year'];
	$idempresa=$_GET['elegir'];

	$yearmenor=$year-1;
	if ($resultado = mysqli_query($conex,"select * from Libros where id_empresa=".$idempresa." and year='".$year."'")) {
		
        //verifica si existe
        if($obj = $resultado->fetch_object()){
     $idlibro1=$obj->id;
			
		}
	}
	else
		echo(mysqli_error($conex));
    if ($resultado = mysqli_query($conex,"select * from Libros where id_empresa=".$idempresa." and year='".$yearmenor."'")) {
		
        //verifica si existe
        if($obj = $resultado->fetch_object()){
     $idlibro2=$obj->id;
			
		}
	}
	else
		echo(mysqli_error($conex));

	$nof = $comp->getNof($idlibro1,$idlibro2);
     
}
 
 
?>
<center>
<div>

<img src ="img/logo esiff.png">
</div>
</center>

<div class="container">
     <div class="row">
          <div class="col">
          <ul class="nav nav-tabs">
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="comparacionActivos.php?year='.$year.'&elegir='.$idempresa.'">Activos</a>'); ?>
    
  </li>
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="comparacionPatrimonio.php?year='.$year.'&elegir='.$idempresa.'">Patrimonio neto y pasivo</a>'); ?>
         
    
	
  </li>
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="comparacionPerdidas.php?year='.$year.'&elegir='.$idempresa.'">Perdidas y ganacias</a>'); ?>
   

  </li>
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="comparacionRatios.php?year='.$year.'&elegir='.$idempresa.'">Ratios</a>'); ?>
        
  
 
  </li>
    <li class="nav-item">
    <?php echo ('<a class="nav-link" href="comparacionNof.php?year='.$year.'&elegir='.$idempresa.'">NOF</a>'); ?>
        
    

  </li>
			   
</ul>
          </div>
     </div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <?php echo($comp->generarTablaNof($nof));?>
    </div>
 
</div>
<script src="js/formato.js"></script>