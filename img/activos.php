<?php 
/*value="<?php echo  $formulario['inmovilizado_intangible'] ?>" */
include ("header.php");
session_start();//en cada archivo escribir session start
$idlibro=0;
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
if(isset($_GET['year'])){
	$year=$_GET['year'];
	$idempresa=$_GET['elegir'];
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
 if(isset($_POST['inmovilizado_intangible'])){
	//print_r($_POST);
	$inmovilizado_intangible=$_POST['inmovilizado_intangible'];
    $inmovilizado_material=$_POST['inmovilizado_material'];
    $inversiones_inmobiliarias=$_POST['inversiones_inmobiliarias'];
    $inversiones_en_empresas_grupo=$_POST['inversiones_empresas'];
    $inversiones_financieras_largo_plazo=$_POST['inversiones_financieras'];
    $activos_diferidos=$_POST['activos_impuestodiferido'];
    $deudores_comerciales_no_corrientes=$_POST['deudores_comercialesnocorrientes'];
    $activos_no_corrientes=$_POST['activos_nocorrientes'];
    $existencias=$_POST['existencias'];
    $deudores_comerciales_otros=$_POST['deudores_comerciales'];
    $clientes_ventas_prestaciones=$_POST['clientes_porventas'];
    $accionistas_por_desembolso=$_POST['accionistas_pordesembolsos'];
    $otros_deudores=$_POST['otros_deudores'];
    $inversiones_empresas_grupo_noco=$_POST['inversiones_empresas_grupo_noco'];
    $inversiones_financieras_corto_plazo=$_POST['inversiones_financieras_cortoplazo'];

    $periodificaciones=$_POST['periodificaciones'];
    $efectivo_activos_liquidos=$_POST['efectivo_activos_liquidos'];
	$idlibro=$_POST['idlibro'];
    $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    //$query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
    //$mysqli = new mysqli("localhost:3306","loggin","Sencillo_66","loggin");

/* verificar conexión */
//if (mysqli_connect_errno()) {
 //   printf("Connect failed: %s\n", mysqli_connect_error());
    //exit();
//    }
		 
      /*echo("insert into Activos (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`, `deudores_comerciales`, `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) values (".$inmovilizado_intangible.",".$inmovilizado_material.",".$inversiones_inmobiliarias.",".$inversiones_en_empresas_grupo.",".$inversiones_financieras_largo_plazo.",".$activos_diferidos.",".$deudores_comerciales_no_corrientes.",".$activos_no_corrientes.",".$existencias.",".$deudores_comerciales_otros.",".$clientes_ventas_prestaciones.",".$accionistas_por_desembolso.",".$otros_deudores.",".$inversiones_financieras_corto_plazo.",".$periodificaciones.",".$efectivo_activos_liquidos.",".$idlibro.")"); */
		
		if (!mysqli_query($conex,"insert into Activos (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`, `deudores_comerciales`, `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`,`inversiones_empresas_grupo_noco`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) values (".$inmovilizado_intangible.",".$inmovilizado_material.",".$inversiones_inmobiliarias.",".$inversiones_en_empresas_grupo.",".$inversiones_financieras_largo_plazo.",".$activos_diferidos.",".$deudores_comerciales_no_corrientes.",".$activos_no_corrientes.",".$existencias.",".$deudores_comerciales_otros.",".$clientes_ventas_prestaciones.",".$accionistas_por_desembolso.",".$otros_deudores.",".$inversiones_empresas_grupo_noco.",".$inversiones_financieras_corto_plazo.",".$periodificaciones.",".$efectivo_activos_liquidos.",".$idlibro.")")) {
    echo(mysqli_error($conex));
}
      /*  if ($stmt = $mysqli->prepare("INSERT INTO `Activos` (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`, `deudores_comerciales`, `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
         
            $stmt->bind_param("i", $inmovilizado_intangible);
            $stmt->bind_param("i",$inmovilizado_material);
            $stmt->bind_param("i",$inversiones_inmobiliarias);
            $stmt->bind_param("i",$inversiones_en_empresas_grupo);
            $stmt->bind_param("i",$inversiones_financieras_largo_plazo);
            $stmt->bind_param("i",$activos_diferidos);
            $stmt->bind_param("i",$deudores_comerciales_no_corrientes);
            $stmt->bind_param("i",$activos_no_corrientes);
            $stmt->bind_param("i",$existencias);
            $stmt->bind_param("i",$deudores_comerciales_otros);
            $stmt->bind_param("i",$clientes_ventas_prestaciones);
            $stmt->bind_param("i",$accionistas_por_desembolso);
            $stmt->bind_param("i",$otros_deudores);
            $stmt->bind_param("i",$inversiones_financieras_corto_plazo);
            $stmt->bind_param("i",$periodificaciones);
            $stmt->bind_param("i",$efectivo_activos_liquidos);
			$stmt->bind_param("i",$idlibro);
        
       
            if($stmt->execute()){
                print("insercion correcta");
            }
            else{
                echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
            }
        
          
           
        
        
          
            $stmt->close();
        }*/
    
}
	else{
         
	}
 
?>

 

<div class="container">
     <div class="row">
          <div class="col">
          <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="activos.php">
         Activos
    </a>
  </li>
  <li class="nav-item">
	   <a class="nav-link active" aria-current="page" href="pneto.php">
         Patrimonio Neto y pasivos
    </a>
	  
  <?php //echo ('<a class="nav-link" href="patromonio.php?idempresa='.$empresa.'&year='.$year.'">Patrimonio neto y pasivo</a>'); ?>
  </li>
  <li class="nav-item">
	   <a class="nav-link active" aria-current="page" href="perdidas.php">
         Perdidas y ganancias
    </a>
  <?php //echo ('<a class="nav-link" href="perdidas.php?idempresa='.$empresa.'&year='.$year.'">Perdidas y Ganancias</a>'); ?>
  </li>
  <li class="nav-item">
	   <a class="nav-link active" aria-current="page" href="perdidas.php">
         Ratios
    </a>
  <?php //echo ('<a class="nav-link" href="ratios.php?idempresa='.$empresa.'&year='.$year.'">Ratios</a>'); ?>
  </li>
			    <li class="nav-item">
	   <a class="nav-link active" aria-current="page" href="perdidas.php">
         NOF
    </a>
  <?php //echo ('<a class="nav-link" href="ratios.php?idempresa='.$empresa.'&year='.$year.'">Ratios</a>'); ?>
  </li>
			   
</ul>
          </div>
     </div>
</div>
<div class="container">
        <div class="row justify-content-md-center">
<div class="col-6">
<form method="post" action="activos.php">
	<?php echo('<input type="hidden" name="idlibro" value='.$idlibro.'>');?>
	<table class="table table-sm">
	
		  
    <tr class="table-dark">
        <th>ACTIVO </th>
        <th>2021</th>
    </tr>

    <tr class="table-primary">
        <td class="text-start">ACTIVO NO CORRIENTE</td>
        <td style="padding-right:20px;">
			<input readonly  name="activo_no_corriente" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				   >

		</td>
</tr>

<tr>

        <td class="text-start">Inmovilizado intangible</td>
       <td style="padding-right:20px;">
 
		   <input  name="inmovilizado_intangible" type="text"  placeholder="" aria-label="default input example" class="form-control text-end "  />
		   

                
			
		</td>
</tr>

<tr>
        <td class="text-start">Inmovilizado material</td>
        <td style="padding-right:20px;">

			<input name="inmovilizado_material" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				  >

		</td>
				
</tr>

<tr>
        <td class="text-start">Inversiones inmobiliarias</td>
        <td style="padding-right:20px;">
			<input name="inversiones_inmobiliarias" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				   >

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones en empresas del grupo y asoc</td> 
       <td style="padding-right:20px;">
			<input name="inversiones_empresas" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				  >

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones financieras a largo plazo</td>
       <td style="padding-right:20px;">
			<input  name ="inversiones_financieras"class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>
		
		 <tr>
        <td class="text-start">Activos por impuesto diferido </td>
       <td style="padding-right:20px;">
			<input name="activos_impuuestodiferido" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Deudores comerciales no corrientes</td>
       <td style="padding-right:20px;">
			<input name="deudores_comercialesnocorrientes" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

	 <tr class="table-primary">
        <td class="text-start">ACTIVO CORRIENTE</td>
        <td style="padding-right:20px;">
			<input readonly name="" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Activos no corrientes mantenidos para la venta</td>
        <td style="padding-right:20px;">
			<input name="activos_nocorrientes" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Existencias</td> 
        <td style="padding-right:20px;">
			<input name="existencias" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Deudores comerciales y otras c. a cobrar</td>
        <td style="padding-right:20px;">
			<input name="deudores_comerciales" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>


		 <tr>
        <td class="text-start">Clientes por ventas y prestaciones de serviciones</td>
       <td style="padding-right:20px;">
			<input name="clientes_porprestaciones"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Accionistas por desembolsos exigidos</td>
        <td style="padding-right:20px;">
			<input name="accionistas_pordesembolso" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Otros deudores</td>
         <td style="padding-right:20px;">
			<input name="otros_deudores" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones en empresas del grupo y asoc</td>
       <td style="padding-right:20px;">
			<input name="inversiones_empresas_grupo_noco" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Inversiones financieras a corto plazo</td> 
        <td style="padding-right:20px;">
			<input name="inversiones_financieras_cortoplazo" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>

<tr>
        <td class="text-start">Periodificaciones</td>
        <td style="padding-right:20px;">
			<input  name="periodificaciones" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>


		 <tr>
        <td class="text-start">Efectivo y otros activos liquidos equiv</td>
        <td style="padding-right:20px;">
			<input name="efectivo_otros_activosliquidos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>
</tr>



     <td>
			<button type="submit" class="btn btn-primary">GUARDAR</button>


		</td>

	
			
	

	
	
		 
		
      
		
</table>
</form>
</div>
        </div>
</div>
  	<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
			<script>
jQuery(function($){
$("#double").mask('999,999,999.99');

});
</script>



