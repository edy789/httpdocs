<?php 
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}

/*value="<?php echo  $formulario['inmovilizado_intangible'] ?>" */
include ("header.php");
$edit=false;
$idlibro=0;
$year=0;
$idempresa=0;
$datos;
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
 if(isset($_POST['inmovilizado_intangible'])){
	//print_r($_POST);
	$inmovilizado_intangible=str_replace(",","",$_POST['inmovilizado_intangible']);
       $inmovilizado_material=str_replace(",","", $_POST['inmovilizado_material']);
       $inversiones_inmobiliarias=str_replace(",","",$_POST['inversiones_inmobiliarias']);
       $inversiones_en_empresas_grupo=str_replace(",","",$_POST['inversiones_empresas']);
       $inversiones_financieras_largo_plazo=str_replace(",","",$_POST['inversiones_financieras']);
       $deudores_comerciales_no_corrientes=str_replace(",","",$_POST['deudores_comercialesnocorrientes']);
       $activos_no_corrientes=str_replace(",","",$_POST['activos_nocorrientes']);
       $existencias=str_replace(",","",$_POST['existencias']);
       $activos_diferidos=str_replace(",","",$_POST['activos_impuestodiferido']);
       $clientes_ventas_prestaciones=str_replace(",","",$_POST['clientes_porventas']);
       $accionistas_por_desembolsos=str_replace(",","",$_POST['accionistas_pordesembolsos']);
       $otros_deudores=str_replace(",","",$_POST['otros_deudores']);
       $inversiones_empresas_grupo_noco=str_replace(",","",$_POST['inversiones_empresas_grupo_noco']);
       $inversiones_financieras_corto_plazo=str_replace(",","",$_POST['inversiones_financieras_cortoplazo']);
       $periodificaciones=str_replace(",","",$_POST['periodificaciones']);
       $efectivo_activos_liquidos=str_replace(",","",$_POST['efectivo_otros_activosliquidos']);
       $idlibro=$_POST['idlibro'];
       $year=$_POST['year'];
       $idempresa=$_POST['idempresa'];
       $edit=$_POST['edit'];

        if ($resultado = mysqli_query($conex,"select * from Activos where id_libro=".$idlibro."")) {
		//verifica si existe
        if($obj = $resultado->fetch_object()){
                //editar
                $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
   	
                if (!mysqli_query($conex,"update Activos set `inmovilizado_intangible` = '".$inmovilizado_intangible."', `inmovilizado_material` = '".$inmovilizado_material."', `inversiones_inmobiliarias` = '".$inversiones_inmobiliarias."', `inversiones_empresas` = '".$inversiones_en_empresas_grupo."', `inversiones_financieras` = '".$inversiones_financieras_largo_plazo."', `activos_impuestodiferido` = '".$activos_diferidos."', `deudores_comercialesnocorrientes` = '".$deudores_comerciales_no_corrientes."', `activos_nocorrientes` = '".$activos_no_corrientes."', `existencias` = '".$existencias."',  `clientes_porventas` = '".$clientes_ventas_prestaciones."', `accionistas_pordesembolsos` = '".$accionistas_por_desembolsos."', `otros_deudores` = '".$otros_deudores."',`inversiones_empresas_grupo_noco` = '".$inversiones_empresas_grupo_noco."', `inversiones_financieras_cortoplazo` = '".$inversiones_financieras_corto_plazo."', `periodificaciones` = '".$periodificaciones."', `efectivo_otros_activosliquidos` = '".$efectivo_activos_liquidos."'  where id=".$obj->id)) {
  
                  
                        header('Location:pneto.php?year='.$year.'&elegir='.$idempresa); 
                          
}
      
        else{
                
                echo '<h3 class="ok">Datos subidos correctamente</h3>';
                header('Location:pneto.php?year='.$year.'&elegir='.$idempresa);   
        }	
		}
                else{
                        //insertar
                        $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
   	
                        if (!mysqli_query($conex,"insert into Activos (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`,  `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`,`inversiones_empresas_grupo_noco`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) values ('".$inmovilizado_intangible."','".$inmovilizado_material."','".$inversiones_inmobiliarias."','".$inversiones_en_empresas_grupo."','".$inversiones_financieras_largo_plazo."','".$activos_diferidos."','".$deudores_comerciales_no_corrientes."','".$activos_no_corrientes."','".$existencias."','".$clientes_ventas_prestaciones."','".$accionistas_por_desembolsos."','".$otros_deudores."','".$inversiones_empresas_grupo_noco."','".$inversiones_financieras_corto_plazo."','".$periodificaciones."','".$efectivo_activos_liquidos."','".$idlibro."')")) {
          
                          
                                header('Location:pneto.php?year='.$year.'&elegir='.$idempresa); 
                                  
        }
              
                else{
                        
                        echo '<h3 class="ok">Datos subidos correctamente</h3>';
                        header('Location:pneto.php?year='.$year.'&elegir='.$idempresa);   
                }
                }
	}
	else
		echo(mysqli_error($conex));

   
    
}

	else{
                   
         
	}

    if($idlibro>0){
        if ($resultado = mysqli_query($conex,"select * from Activos where id_libro=".$idlibro."")) {
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
               
                <?php //echo ('<a class="nav-link" href="ratios.php?idempresa='.$empresa.'&year='.$year.'">Ratios</a>'); ?>
                </li>
			   
</ul>
          </div>
     </div>
</div>
<div class="container">
        <div class="row justify-content-md-center">
<div class="col-md-6 col-sm-12">
<form  class="animate__animated animate__backInLeft" method="post" action="activos.php" autocomplete="off">
	<?php echo('<input type="hidden" name="idlibro" value='.$idlibro.'>');?>
        <?php echo('<input type="hidden" name="year" value='.$year.'>');?>
        <?php echo('<input type="hidden" name="idempresa" value='.$idempresa.'>');?>
        <?php echo('<input type="hidden" name="edit" value='.$edit.'>');?>
	<table class="table table-sm">
	
		  
    <tr class="table-dark">
        <th>ACTIVO </th>
        <th><?php echo ($year);?></th>
    </tr>

    <tr class="table-primary">
        <td class="text-start">ACTIVO NO CORRIENTE</td>
        <td style="padding-right:20px;">
			<input readonly  name="activo_no_corriente" class="form-control text-end" type="text"   aria-label="default input example"
				   >

		</td>
</tr>

<tr>

        <td class="text-start">Inmovilizado intangible</td>
       <td style="padding-right:20px;">
 <?php 
 if($datos){
        echo('<input  name="inmovilizado_intangible" type="text"  aria-label="default input example" class="form-control text-end "   value="'.$datos->inmovilizado_intangible.'" data-type="currency" />');
 }
 else
 echo('<input  name="inmovilizado_intangible" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
		   
		   

                
			
		</td>
</tr>

<tr>
        <td class="text-start">Inmovilizado material</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="inmovilizado_material" class="form-control text-end" type="text"   aria-label="default input example "  value="'.$datos->inmovilizado_material.'" data-type="currency"
        >
');
 }
 else
 echo('<input  name="inmovilizado_material" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			
		</td>
				
</tr>

<tr>
        <td class="text-start">Inversiones inmobiliarias</td>
        <td style="padding-right:20px;">
        <?php 
 if($datos){
        echo('<input name="inversiones_inmobiliarias" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->inversiones_inmobiliarias.'" data-type="currency"
        >
');
 }
 else
 echo('<input  name="inversiones_inmobiliarias" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones en empresas del grupo y asoc</td> 
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input name="inversiones_empresas" class="form-control text-end" type="text"   aria-label="default input example"  value="'.$datos->inversiones_empresas.'" data-type="currency"
        >
');
 }
 else
 echo('<input  name="inversiones_empresas" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones financieras a largo plazo</td>
       <td style="padding-right:20px;">
       <?php 
 if($datos){
        echo('<input  name ="inversiones_financieras"class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->inversiones_financieras.'" data-type="currency">');
 }
 else
 echo('<input  name="inversiones_financieras" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>

			

		</td>
</tr>
		
		 <tr>
        <td class="text-start">Activos por impuesto diferido </td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="activos_impuestodiferido" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->activos_impuestodiferido.'" data-type="currency">');
 }
 else
 echo('<input  name="activos_impuestodiferido" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Deudores comerciales no corrientes</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="deudores_comercialesnocorrientes" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->deudores_comercialesnocorrientes.'" data-type="currency">');
 }
 else
 echo('<input  name="deudores_comercialesnocorrientes" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

	 <tr class="table-primary">
        <td class="text-start">ACTIVO CORRIENTE</td>
        <td style="padding-right:20px;">

        
			<input readonly name="" class="form-control text-end" type="text"   aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>

<tr>
        <td class="text-start">Activos no corrientes mantenidos para la venta</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="activos_nocorrientes" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->activos_nocorrientes.'" data-type="currency">');
 }
 else
 echo('<input  name="activos_nocorrientes" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Existencias</td> 
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="existencias" class="form-control text-end" type="text"  aria-label="default input example"   value="'.$datos->existencias.'" data-type="currency">');
 }
 else
 echo('<input  name="existencias" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Deudores comerciales y otras c. a cobrar</td>
        <td style="padding-right:20px;">

       
			<input readonly name= "deudores_comerciales" class="form-control text-end" type="text"   aria-label="default input example"   value="" data-type="currency">

		</td>
</tr>


		 <tr>
        <td class="text-start">Clientes por ventas y prestaciones de serviciones</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="clientes_porventas"  class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->clientes_porventas.'" data-type="currency">');
 }
 else
 echo('<input  name="clientes_porventas" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Accionistas por desembolsos exigidos</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="accionistas_pordesembolsos" class="form-control text-end" type="text"  aria-label="default input example"   value="'.$datos->accionistas_pordesembolsos.'" data-type="currency">');
 }
 else
 echo('<input  name="accionistas_pordesembolsos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Otros deudores</td>
         <td style="padding-right:20px;">

         <?php 
 if($datos){
        echo('<input name="otros_deudores" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->otros_deudores.'" data-type="currency">');
 }
 else
 echo('<input  name="otros_deudores" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones en empresas del grupo y asoc</td>
       <td style="padding-right:20px;">

       <?php 
 if($datos){
        echo('<input name="inversiones_empresas_grupo_noco" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->inversiones_empresas_grupo_noco.'" data-type="currency">');
 }
 else
 echo('<input  name="inversiones_empresas_grupo_noco" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones financieras a corto plazo</td> 
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="inversiones_financieras_cortoplazo" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->inversiones_financieras_cortoplazo.'" data-type="currency">');
 }
 else
 echo('<input  name="inversiones_financieras_cortoplazo" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>

<tr>
        <td class="text-start">Periodificaciones</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input  name="periodificaciones" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->periodificaciones.'" data-type="currency">');
 }
 else
 echo('<input  name="periodificaciones" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			

		</td>
</tr>


		 <tr>
        <td class="text-start">Efectivo y otros activos liquidos equiv</td>
        <td style="padding-right:20px;">

        <?php 
 if($datos){
        echo('<input name="efectivo_otros_activosliquidos" class="form-control text-end" type="text"   aria-label="default input example"   value="'.$datos->efectivo_otros_activosliquidos.'" data-type="currency">
        ');
 }
 else
 echo('<input  name="efectivo_otros_activosliquidos" type="text"  aria-label="default input example" class="form-control text-end "   value="" data-type="currency" />');

 ?>
			
		</td>
</tr>



     <td>
			<button   type="submit" class="btn btn-primary">GUARDAR</button>
                     <a onclick="myFunction()"  type="submit" class="btn btn-primary">CANCELAR</a>


		</td>

	
			
	

	
	
		 
		
      
		
</table>
</form>
</div>
        </div>
</div>

<script src="js/alerta.js"></script>

<script src="js/formato.js"></script>



