<?php 
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}

include ("header.php");

$idlibro=0;
$year=0;
$idempresa=0;
$edit=false;
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
if(isset($_GET['year'])){
	$year=$_GET['year'];
	$idempresa=$_GET['elegir'];
       $edit = $_GET['edit'];

	if ($resultado = mysqli_query($conex,"select * from Libros where id_empresa=".$idempresa." and year='".$year."'")) {
		//verifica si existe
        if($obj = $resultado->fetch_object()){
     $idlibro=$obj->id;
			
		}
	}
	else
		echo(mysqli_error($conex));
	
     //$year=$_POST['year'];
     //$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
     //$query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
     
}
 if(isset($_POST['capital'])){
	//print_r($_POST);
	
    $capital=str_replace(",","",$_POST['capital']);
    $prima_emision=str_replace(",","",$_POST['prima_emision']);
    $reservas=str_replace(",","",$_POST['reservas']);
    $acciones_propias=str_replace(",","",$_POST['acciones_propias']);
    $resultado_ejercicio_anteriores=str_replace(",","",$_POST['resultado_ejercicio_anteriores']);
    $otras_aportaciones=str_replace(",","",$_POST['otras_aportaciones']);
    $resultado_del_ejercicio=str_replace(",","",$_POST['resultado_del_ejercicio']);
    $dividendo=str_replace(",","",$_POST['dividendo']);
    $otros_instrumentos=str_replace(",","",$_POST['otros_instrumentos']);
    $ajustes_por_cambios=str_replace(",","",$_POST['ajustes_por_cambios']);
    $socios_externos=str_replace(",","",$_POST['socios_externos']);
    $provisiones_lp=str_replace(",","",$_POST['provisiones_lp']);
    
    $deudas_entidades_noco=str_replace(",","",$_POST['deudas_entidades_noco']);
    $acreedores_arrendamiento_noco=str_replace(",","",$_POST['acreedores_arrendamiento_noco']);


    $otras_deudas_lp=str_replace(",","",$_POST['otras_deudas_lp']);
    $deudas_empresas_noco=str_replace(",","",$_POST['deudas_empresas_noco']);
    $pasivos_por_impuestos=str_replace(",","",$_POST['pasivos_por_impuestos']);
    $periodificaciones_lp=str_replace(",","",$_POST['periodificaciones_lp']);
    $acreedores_comerciales_noco=str_replace(",","",$_POST['acreedores_comerciales_noco']);
    $deuda_caracteristicas_noco=str_replace(",","",$_POST['deuda_caracteristicas_noco']);
    $pasivos_vinculados=str_replace(",","",$_POST['pasivos_vinculados']);
    $provisiones_cp=str_replace(",","",$_POST['provisiones_cp']);
    
    $deudas_entidades_co=str_replace(",","",$_POST['deudas_entidades_co']);
    $acreedores_arrendamiento_co=str_replace(",","",$_POST['acreedores_arrendamiento_co']);
    $otras_deudas_cp=str_replace(",","",$_POST['otras_deudas_cp']);
    $deudas_empresas_co=str_replace(",","",$_POST['deudas_empresas_co']);

    $proveedores=str_replace(",","",$_POST['proveedores']);
    $otros_acreedores=str_replace(",","",$_POST['otros_acreedores']);
    $periodificaciones_cp=str_replace(",","",$_POST['periodificaciones_cp']);
    $deuda_caracteristicas_co=str_replace(",","",$_POST['deuda_caracteristicas_co']);


	$idlibro=$_POST['idlibro'];
        $year=$_POST['year'];
        $idempresa=$_POST['idempresa'];
$edit=$_POST['edit'];


        if ($resultado = mysqli_query($conex,"select * from Pasivos where id_libro=".$idlibro."")) {
		//verifica si existe
        if($obj = $resultado->fetch_object()){
                //editar
                $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
                if (!mysqli_query($conex,"update  Pasivos set `capital`= '".$capital."', `prima_emision`= '".$prima_emision."', `reservas`= '".$reservas."', `acciones_propias`= '".$acciones_propias."', `resultado_ejercicio_anteriores`= '".$resultado_ejercicio_anteriores."', `otras_aportaciones`= '".$otras_aportaciones."', `resultado_del_ejercicio`= '".$resultado_del_ejercicio."', `dividendo`= '".$dividendo."', `otros_instrumentos`= '".$otros_instrumentos."', `ajustes_por_cambios`= '".$ajustes_por_cambios."', `socios_externos`= '".$socios_externos."', `provisiones_lp`= '".$provisiones_lp."', `deudas_entidades_noco`= '".$deudas_entidades_noco."', `acreedores_arrendamiento_noco`= '".$acreedores_arrendamiento_noco."', `otras_deudas_lp`= '".$otras_deudas_lp."',`deudas_empresas_noco`= '".$deudas_empresas_noco."', `pasivos_por_impuestos`= '".$pasivos_por_impuestos."', `periodificaciones_lp`= '".$periodificaciones_lp."', `acreedores_comerciales_noco`= '".$acreedores_comerciales_noco."', `deuda_caracteristicas_noco`= '".$deuda_caracteristicas_noco."', `pasivos_vinculados`= '".$pasivos_vinculados."', `provisiones_cp`= '".$provisiones_cp."', `deudas_entidades_co`= '".$deudas_entidades_co."', `acreedores_arrendamiento_co`= '".$acreedores_arrendamiento_co."', `otras_deudas_cp`= '".$otras_deudas_cp."', `deudas_empresas_co`= '".$deudas_empresas_co."', `proveedores`= '".$proveedores."', `otros_acreedores`= '".$otros_acreedores."', `periodificaciones_cp`= '".$periodificaciones_cp."', `deuda_caracteristicas_co`= '".$deuda_caracteristicas_co."' where id=".$obj->id)) {
                       
                        header('Location:perdidas.php?year='.$year.'&elegir='.$idempresa); 

			
}
	
      
        else{
                
                echo '<h3 class="ok">Datos subidos correctamente</h3>';
                header('Location:perdidas.php?year='.$year.'&elegir='.$idempresa);   
        }	
		}
                else{
                        //insertar
                        $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
   	
                        if (!mysqli_query($conex,"insert into Pasivos (`capital`, `prima_emision`, `reservas`, `acciones_propias`, `resultado_ejercicio_anteriores`, `otras_aportaciones`, `resultado_del_ejercicio`, `dividendo`, `otros_instrumentos`, `ajustes_por_cambios`, `socios_externos`, `provisiones_lp`, `deudas_entidades_noco`, `acreedores_arrendamiento_noco`, `otras_deudas_lp`,`deudas_empresas_noco`, `pasivos_por_impuestos`, `periodificaciones_lp`, `acreedores_comerciales_noco`, `deuda_caracteristicas_noco`, `pasivos_vinculados`, `provisiones_cp`, `deudas_entidades_co`, `acreedores_arrendamiento_co`, `otras_deudas_cp`, `deudas_empresas_co`, `proveedores`, `otros_acreedores`, `periodificaciones_cp`, `deuda_caracteristicas_co`, `id_libro`) values ('".$capital."','".$prima_emision."','".$reservas."','".$acciones_propias."','".$resultado_ejercicio_anteriores."','".$otras_aportaciones."','".$resultado_del_ejercicio."','".$dividendo."','".$otros_instrumentos."','".$ajustes_por_cambios."','".$socios_externos."','".$provisiones_lp."','".$deudas_entidades_noco."','".$acreedores_arrendamiento_noco."','".$otras_deudas_lp."' ,'".$deudas_empresas_noco."' ,'".$pasivos_por_impuestos."' ,'".$periodificaciones_lp."' ,'".$acreedores_comerciales_noco."','".$deuda_caracteristicas_noco."','".$pasivos_vinculados."','".$provisiones_cp."','".$deudas_entidades_co."','".$acreedores_arrendamiento_co."','".$otras_deudas_cp."','".$deudas_empresas_co."','".$proveedores."','".$otros_acreedores."','".$periodificaciones_cp."','".$deuda_caracteristicas_co."','".$idlibro."')")) {
                      
                                header('Location:perdidas.php?year='.$year.'&elegir='.$idempresa); 
        
                }
              
                else{
                        
                        echo '<h3 class="ok">Datos subidos correctamente</h3>';
                        header('Location:perdidas.php?year='.$year.'&elegir='.$idempresa);   
                }
                }
	}
	else
	echo(mysqli_error($conex));

   
    
}

	else{
                   
         
	}

    if($idlibro>0){
        if ($resultado = mysqli_query($conex,"select * from Pasivos where id_libro=".$idlibro."")) {
		//verifica si existe
        if($obj = $resultado->fetch_object()){
		$datos=$obj;	
		}
	}
	else
		echo(mysqli_error($conex));
    }
 

      

?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>


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
        <?php echo ('<a class="nav-link" href="activos.php?year='.$year.'&elegir='.$idempresa.'&edit='.$edit.'">Activos</a>'); ?>
        </a>
        </li>
        <li class="nav-item">
        <?php echo ('<a class="nav-link" href="pneto.php?year='.$year.'&elegir='.$idempresa.'&edit='.$edit.'">Patrimonio Neto</a>'); ?>
        </a>
	  
  <?php //echo ('<a class="nav-link" href="patromonio.php?idempresa='.$empresa.'&year='.$year.'">Patrimonio neto y pasivo</a>'); ?>
                </li>
                <li class="nav-item">
                <?php echo ('<a class="nav-link" href="perdidas.php?year='.$year.'&elegir='.$idempresa.'&edit='.$edit.'">Perdidas y ganancias</a>'); ?>
                </a>
                <?php //echo ('<a class="nav-link" href="perdidas.php?idempresa='.$empresa.'&year='.$year.'">Perdidas y Ganancias</a>'); ?>
                </li>
              
			   
</ul>
          </div>
     </div>
</div>
<div class="container">
        <div class="row justify-content-md-center">
        <div class="col-md-6 col-sm-12">
<form  class="animate__animated animate__backInLeft"method="post" action="pneto.php" autocomplete="off">
<?php echo('<input type="hidden" name="idlibro" value='.$idlibro.'>');?>
<?php echo('<input type="hidden" name="year" value='.$year.'>');?>
        <?php echo('<input type="hidden" name="idempresa" value='.$idempresa.'>');?>
        <?php echo('<input type="hidden" name="edit" value='.$edit.'>');?>

	<table class="table table-sm">
		  
    <tr class="table-dark">
        <th>PATRIMONIO NETO Y PASIVO </th>
        <th><?php echo ($year);?></th>
    </tr>
<tr class="table-primary">
        <td class="text-start">PATRIMONIO NETO</td>
        <td style="padding-right:20px;">
			<input readonly  name="patrimonio_neto"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>
		
    <tr>
        <td class="text-start">Fondos propios</td>
        <td style="padding-right:20px;">
      
 
		   
			<input  readonly  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Capital</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="capital" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->capital.'" data-type="currency">');
 }
 else
 echo('<input  name="capital" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Prima de emisión</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="prima_emision" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->prima_emision.'" data-type="currency">');
 }
 else
 echo('<input  name="prima_emision" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Reservas</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="reservas" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->reservas.'" data-type="currency">');
 }
 else
 echo('<input  name="reservas" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Acciones propias</td> 
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="acciones_propias" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->acciones_propias.'" data-type="currency">');
 }
 else
 echo('<input  name="acciones_propias" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Resultado de ejercicios anteriores</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="resultado_ejercicio_anteriores" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->resultado_ejercicio_anteriores.'" data-type="currency">');
 }
 else
 echo('<input  name="resultado_ejercicio_anteriores" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>
		
		 <tr>
        <td class="text-start">Otras aportaciones de socios</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="otras_aportaciones" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->otras_aportaciones.'" data-type="currency">');
 }
 else
 echo('<input  name="otras_aportaciones" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Resultado del ejercicos</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="resultado_del_ejercicio" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->resultado_del_ejercicio.'" data-type="currency">');
 }
 else
 echo('<input  name="resultado_del_ejercicio" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Dividendo a cuenta</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="dividendo" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->dividendo.'" data-type="currency">');
 }
 else
 echo('<input  name="dividendo" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros instrumentos de patrimonio neto</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="otros_instrumentos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->otros_instrumentos.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_instrumentos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Ajustes por cambios de valor</td> 
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('	<input name="ajustes_por_cambios" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->ajustes_por_cambios.'" data-type="currency">');
 }
 else
 echo('<input  name="ajustes_por_cambios" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
		

		</td>
</tr>

 <tr>
        <td class="text-start">Socios externos</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="socios_externos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->socios_externos.'" data-type="currency">');
 }
 else
 echo('<input  name="socios_externos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>


		 <tr class="table-primary">
        <td class="text-start">PASIVO NO CORRIENTE</td>
       <td style="padding-right:20px;">
			<input  name="pasivo_no_corriente"  readonly class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Provisiones a largo plazo</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input  name="provisiones_lp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->provisiones_lp.'" data-type="currency">');
 }
 else
 echo('<input  name="provisiones_lp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Deudas a largo plazo</td>
         <td style="padding-right:20px;">
      

		   
			<input readonly   class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Deudas con entidades de credito</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input  name="deudas_entidades_noco"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deudas_entidades_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="deudas_entidades_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Acreedores por arrendamiento financiero</td> 
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="acreedores_arrendamiento_noco"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->acreedores_arrendamiento_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="acreedores_arrendamiento_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Otras deudas a largo plazo</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="otras_deudas_lp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->otras_deudas_lp.'" data-type="currency">');
 }
 else
 echo('<input  name="otras_deudas_lp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>


		 <tr>
        <td class="text-start">Deudas con empresas del grupo y asoc</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deudas_empresas_noco"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deudas_empresas_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="deudas_empresas_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Pasivos por impuesto diferido</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="pasivos_por_impuestos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->pasivos_por_impuestos.'" data-type="currency">');
 }
 else
 echo('<input  name="pasivos_por_impuestos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Periodificaciones a largo plazo</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="periodificaciones_lp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->periodificaciones_lp.'" data-type="currency">');
 }
 else
 echo('<input  name="periodificaciones_lp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Acreedores comerciales no corrientes</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="acreedores_comerciales_noco"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->acreedores_comerciales_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="acreedores_comerciales_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Deuda con características especiales</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deuda_caracteristicas_noco"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deuda_caracteristicas_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="deuda_caracteristicas_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr class="table-primary">
        <td class="text-start">PASIVO CORRIENTE</td>
        <td style="padding-right:20px;">
			<input readonly  name="pasivo_corriente"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>


<tr>
        <td class="text-start">Pasivos vinculados con ANCMV</td>
        <td style="padding-right:20px;"
        >
        <?php 
 if($datos){
        echo('	<input  name="pasivos_vinculados"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->pasivos_vinculados.'" data-type="currency">');
 }
 else
 echo('<input  name="pasivos_vinculados" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
		

		</td>
</tr>


<tr>
        <td class="text-start">Provisiones a corto plazo</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input  name="provisiones_cp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->provisiones_cp.'" data-type="currency">');
 }
 else
 echo('<input  name="provisiones_cp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>


<tr>
        <td class="text-start">Deudas a corto plazo</td>
        <td style="padding-right:20px;">
			<input readonly   class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Deudas con entidades de crédito </td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deudas_entidades_co"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deudas_entidades_co.'" data-type="currency">');
 }
 else
 echo('<input  name="deudas_entidades_co" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Acreedores por arrendamiento financiero</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('	<input  name="acreedores_arrendamiento_co"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->acreedores_arrendamiento_co.'" data-type="currency">');
 }
 else
 echo('<input  name="acreedores_arrendamiento_co" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
		

		</td>
</tr>

<tr>
        <td class="text-start">Otras deudas a corto plazo</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="otras_deudas_cp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->otras_deudas_cp.'" data-type="currency">');
 }
 else
 echo('<input  name="otras_deudas_cp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Deudas con empresas del grupo y asco</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deudas_empresas_co"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deudas_empresas_co.'" data-type="currency">');
 }
 else
 echo('<input  name="deudas_empresas_co" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Acreedores comerciales y otras cuentas a pagar</td>
        <td style="padding-right:20px;">


			<input readonly  name="acreedores_comerciales_otras_cuentas"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Proveedores</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="proveedores"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->proveedores.'" data-type="currency">');
 }
 else
 echo('<input  name="proveedores" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros acreedores</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="otros_acreedores"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->otros_acreedores.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_acreedores" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>


</tr>


<tr>
        <td class="text-start">Periodificaciones a corto plazo</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="periodificaciones_cp"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->periodificaciones_cp.'" data-type="currency">');
 }
 else
 echo('<input  name="periodificaciones_cp" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>

<tr>
        <td class="text-start">Deuda con características especiales</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deuda_caracteristicas_co"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->deuda_caracteristicas_co.'" data-type="currency">');
 }
 else
 echo('<input  name="deuda_caracteristicas_co" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
			

		</td>
</tr>
		   <td>
			<button type="submit" class="btn btn-primary">GUARDAR</button>
                     <a onclick="myFunction()"  type="submit" class="btn btn-primary">CANCELAR</a>

		</td>

		
</table>
</form>
</div>
        </div>
</div>
<script src="js/alerta.js"></script>
<script src="js/formato.js"></script>










	


	

		
				

		
		
		


	






