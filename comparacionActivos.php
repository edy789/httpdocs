<?php 

include ("header.php");
include("data/calcularActivos.php");
session_start();//en cada archivo escribir session start
$comp = new Comparaciones();
$idlibro1=0;
$idlibro2=0;
$yearmenor=0;
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
$activos=null;
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

	$activos = $comp->getActivos($idlibro1,$idlibro2);
    //print_r($activos);
     //$year=$_POST['year'];
     //$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
     //$query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
     
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
  <li class="btn btn-primary nav-item ">
    <?php echo ('<a class="nav-link text-white" href="activos.php?year='.$year.'&elegir='.$idempresa.'&edit=true">Editar año actual</a>'); ?>
        
    

  </li>
  <li class="btn btn-primary nav-item ">
    <?php echo ('<a class="nav-link text-white" href="activos.php?year='.$yearmenor.'&elegir='.$idempresa.'&edit=true-1">Editar año anterior</a>'); ?>
        
    

  </li>

  </li>
  <li class="btn btn-primary nav-item ">
    <?php echo ('<a class="nav-link text-white" href="exportar.php">Exportar a CSV</a>'); ?>
        
    

  </li>
			   
</ul>
          </div>
     </div>
</div>



<div class="container">
    <div class="row justify-content-md-center">
        <?php echo($comp->generarTabla($activos));?>
    </div>
 
</div>
<script src="js/formato.js"></script>



