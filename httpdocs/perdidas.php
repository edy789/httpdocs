<?php 
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}

include ("header.php");

$idlibro=0;
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
	
     
     
}
else if(isset($_POST['importe_neto'])){
	
	$importe_neto=str_replace(",","",$_POST['importe_neto']);
    $variacion=str_replace(",","",$_POST['variacion']);
    $trabajos_realizados=str_replace(",","",$_POST['trabajos_realizados']);
    $aprovisionamientos=str_replace(",","",$_POST['aprovisionamientos']);;
    $otros_ingresos=str_replace(",","",$_POST['otros_ingresos']);
    $gastos_personal=str_replace(",","",$_POST['gastos_personal']);
    $otros_gastos=str_replace(",","",$_POST['otros_gastos']);
    $amortizacion_inmovilizado=str_replace(",","",$_POST['amortizacion_inmovilizado']);
    $imputacion_subvenciones=str_replace(",","",$_POST['imputacion_subvenciones']);
    $excesos_provisiones=str_replace(",","",$_POST['excesos_provisiones']);
    $deterioro=str_replace(",","",$_POST['deterioro']);
    $diferencia_negativa=str_replace(",","",$_POST['diferencia_negativa']);
    $otros_resultados=str_replace(",","",$_POST['otros_resultados']);
    $ingresos_financieros=str_replace(",","",$_POST['ingresos_financieros']);
    $gastos_financieros=str_replace(",","",$_POST['gastos_financieros']);
    $variacion_valor=str_replace(",","",$_POST['variacion_valor']);
    $diferencias_cambio=str_replace(",","",$_POST['diferencias_cambio']);
	$deterioro_y_resultado=str_replace(",","",$_POST['deterioro_y_resultado']);
	$otros_ingresos_y_gastos=str_replace(",","",$_POST['otros_ingresos_y_gastos']);
	$impuesto_beneficios=str_replace(",","",$_POST['impuesto_beneficios']);
	$idlibro=$_POST['idlibro'];
       $edit=$_POST['edit'];
        //$year=$_POST['year'];
        //$idempresa=$_POST['idempresa'];
        if ($resultado = mysqli_query($conex,"select * from perdidas where id_libro=".$idlibro."")) {
		//verifica si existe
        if($obj = $resultado->fetch_object()){
                //editar
                $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
   	
                if (!mysqli_query($conex,"update  perdidas set `importe_neto` = '".$importe_neto."', `variacion` = '".$variacion."', `trabajos_realizados` = '".$trabajos_realizados."', `aprovisionamientos` = '".$aprovisionamientos."', `otros_ingresos` = '".$otros_ingresos."', `gastos_personal` = '".$gastos_personal."', `otros_gastos` = '".$otros_gastos."', `amortizacion_inmovilizado` = '".$amortizacion_inmovilizado."', `imputacion_subvenciones` = '".$imputacion_subvenciones."', `excesos_provisiones` = '".$excesos_provisiones."', `deterioro` = '".$deterioro."', `diferencia_negativa` = '".$diferencia_negativa."', `otros_resultados` = '".$otros_resultados."', `ingresos_financieros` = '".$ingresos_financieros."', `gastos_financieros` = '".$gastos_financieros."', `variacion_valor` = '".$variacion_valor."',`diferencias_cambio` = '".$diferencias_cambio."',`deterioro_y_resultado` = '".$deterioro_y_resultado."',`otros_ingresos_y_gastos` = '".$otros_ingresos_y_gastos."', `impuesto_beneficios` = '".$impuesto_beneficios."'  where id=".$obj->id)) {
              
                        header('Location:selectLibro.php'); 
                }
       
 
      
        else{
                
                echo '<h3 class="ok">Datos subidos correctamente</h3>';
                header('Location:selectLibro.php?year='.$year.'&elegir='.$idempresa);   
        }	
		}
                else{
                        //insertar
                        $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
   	
                     
		if (!mysqli_query($conex,"insert into perdidas (`importe_neto`, `variacion`, `trabajos_realizados`, `aprovisionamientos`, `otros_ingresos`, `gastos_personal`, `otros_gastos`, `amortizacion_inmovilizado`, `imputacion_subvenciones`, `excesos_provisiones`, `deterioro`, `diferencia_negativa`, `otros_resultados`, `ingresos_financieros`, `gastos_financieros`, `variacion_valor`,`diferencias_cambio`,`deterioro_y_resultado`,`otros_ingresos_y_gastos`, `impuesto_beneficios`, `id_libro`) values ('".$importe_neto."','".$variacion."','".$trabajos_realizados."','".$aprovisionamientos."','".$otros_ingresos."','".$gastos_personal."','".$otros_gastos."','".$amortizacion_inmovilizado."','".$imputacion_subvenciones."','".$excesos_provisiones."','".$deterioro."','".$diferencia_negativa."','".$otros_resultados."','".$ingresos_financieros."','".$gastos_financieros."','".$variacion_valor."','".$diferencias_cambio."','".$deterioro_y_resultado."','".$otros_ingresos_y_gastos."','".$impuesto_beneficios."','".$idlibro."')")){
                        echo '<h3 class="bad">¡Ya existen datos!</h3>';
                        header('Location:selectLibro.php'); 
                }
       
 

              
                else{
                        
                        echo '<h3 class="ok">Datos subidos correctamente</h3>';
                        header('Location:selectLibro.php?year='.$year.'&elegir='.$idempresa);   
                }
                }
	}
	else
		echo(mysqli_error($conex));

   
    
}

	else{
                   
         
	}

    if($idlibro>0){
        if ($resultado = mysqli_query($conex,"select * from perdidas where id_libro=".$idlibro."")) {
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
<form class="animate__animated animate__backInLeft" method="post" action="perdidas.php" autocomplete="off">
	<?php echo('<input type="hidden" name="idlibro" value='.$idlibro.'>');?>
        <?php echo('<input type="hidden" name="year" value='.$year.'>');?>
        <?php echo('<input type="hidden" name="idempresa" value='.$idempresa.'>');?>
        <?php echo('<input type="hidden" name="edit" value='.$edit.'>');?>
	<table class="table table-sm">
	
		  
    <tr class="table-dark">
        <th>CUENTA DE PERDIDAS Y GANANCIAS </th>
        <th><?php echo ($year);?></th>
    </tr>

    <tr>
        <td class="text-start">Importe neto de la cifra de negocios</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="importe_neto" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->importe_neto.'" data-type="currency">');
 }
 else
 echo('<input  name="importe_neto" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Variación de existencias</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="variacion" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"   value="'.$datos->variacion.'" data-type="currency">');
 }
 else
 echo('<input  name="variacion" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Trabajos realizados para el activo</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="trabajos_realizados" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->trabajos_realizados.'" data-type="currency">');
 }
 else
 echo('<input  name="trabajos_realizados" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Aprovisionamientos</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="aprovisionamientos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->aprovisionamientos.'" data-type="currency">');
 }
 else
 echo('<input  name="aprovisionamientos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros ingresos de explotación</td> 
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="otros_ingresos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->otros_ingresos.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_ingresos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>
		<tr>
        <td class="text-start">Gastos personal</td> 
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="gastos_personal" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->gastos_personal.'" data-type="currency">');
 }
 else
 echo('<input  name="gastos_personal" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>
		<tr>
        <td class="text-start">Otros_gastos_explotación</td> 
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="otros_gastos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->otros_gastos.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_gastos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Amortización del inmmovilizado</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="amortizacion_inmovilizado" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->amortizacion_inmovilizado.'" data-type="currency">');
 }
 else
 echo('<input  name="amortizacion_inmovilizado" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>
		
		 <tr>
        <td class="text-start">Imputación de subvenciones</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="imputacion_subvenciones" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->imputacion_subvenciones.'" data-type="currency">');
 }
 else
 echo('<input  name="imputacion_subvenciones" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Excesos de provisiones</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="excesos_provisiones" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->excesos_provisiones.'" data-type="currency">');
 }
 else
 echo('<input  name="excesos_provisiones" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Deterioro y resultado enajenación inmov</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="deterioro" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->deterioro.'" data-type="currency">');
 }
 else
 echo('<input  name="deterioro" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Diferencia negativa de comb. negocios</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="diferencia_negativa" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->diferencia_negativa.'" data-type="currency">');
 }
 else
 echo('<input  name="diferencia_negativa" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros resultados</td> 
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="otros_resultados" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->otros_resultados.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_resultados" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

 <tr class="table-primary">>
        <td class="text-start">RESULTADO DE EXPLOTACION</td>
        <td style="padding-right:20px;">

 
	
        <input readonly name="resultado_explotacion" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="" data-type="currency">

		</td>
</tr>


		 <tr>
        <td class="text-start">Ingresos financieros</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input  name="ingresos_financieros"   class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->ingresos_financieros.'" data-type="currency">');
 }
 else
 echo('<input  name="ingresos_financieros" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Gastos financieros</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="gastos_financieros"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->gastos_financieros.'" data-type="currency">');
 }
 else
 echo('<input  name="gastos_financieros" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Variación valor instrumentos financieros</td>
         <td style="padding-right:20px;">

         <?php 
 if($datos){
        echo('<input  name="variacion_valor"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->variacion_valor.'" data-type="currency">');
 }
 else
 echo('<input  name="variacion_valor" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Diferencias de cambio</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input  name="diferencias_cambio"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->diferencias_cambio.'" data-type="currency">');
 }
 else
 echo('<input  name="diferencias_cambio" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Deterioro y resultado de enaj. i.financieros</td> 
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="deterioro_y_resultado"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value'.$datos->deterioro_y_resultado.' data-type="currency">');
 }
 else
 echo('<input  name="deterioro_y_resultado" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros ingresos y gastos financieros</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="otros_ingresos_y_gastos"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->otros_ingresos_y_gastos.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_ingresos_y_gastos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>


		 <tr class="table-primary">
        <td class="text-start">RESULTADO FINANCIERO</td>
        <td style="padding-right:20px;">
			<input  readonly name="resultado_financiero"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="" data-type="currency">

		</td>
</tr>

<tr class="table-primary">
        <td class="text-start">RESULTADO ANTES DE IMPUESTOS</td>
        <td style="padding-right:20px;">
			<input readonly class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Impuestos sobre beneficios</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input  name="impuesto_beneficios"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="'.$datos->impuesto_beneficios.'" data-type="currency">');
 }
 else
 echo('<input  name="impuesto_beneficios" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
	
			

		</td>
</tr>

<tr class="table-primary">
        <td class="text-start">RESULTADO DEL EJERCICIOS</td>
        <td style="padding-right:20px;">
			<input readonly name="resultado_ejercicios"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example"  value="" data-type="currency">

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









	


	

		
				

		
		
		


	






