<?php 
include ("header.php");
session_start();//en cada archivo escribir session start
$idlibro=2;
if(isset($_POST['year'])){
     //$idlibro=$_POST['idlibro'];
     //$year=$_POST['year'];
     //$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
     //$query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
     
}
else if(isset($_POST['inmovilizado_intangible'])){
	
	$inmovilizado_intangible=$_POST['inmovilizado_intangible'];
    $inmovilizado_material=$_POST['inmovilizado_material'];
    $inversiones_inmobiliarias=$_POST['inversiones_inmobiliarias'];
    $inversiones_en_empresas_grupo=$_POST['inversiones_en_empresas_grupo'];
    $inversiones_financieras_largo_plazo=$_POST['inversiones_financieras_largo_plazo'];
    $activos_diferidos=$_POST['activos_diferidos'];
    $deudores_comerciales_no_corrientes=$_POST['deudores_comerciales_no_corrientes'];
    $activos_no_corrientes=$_POST['activos_no_corrientes_venta'];
    $existencias=$_POST['existencias'];
    $deudores_comerciales_otros=$_POST['deudores_comerciales_otros'];
    $clientes_ventas_prestaciones=$_POST['clientes_ventas_prestaciones'];
    $accionistas_por_desembolso=$_POST['accionistas_por_desembolso'];
    $otros_deudores=$_POST['otros_deudores'];
    $inversiones_financieras_corto_plazo=$_POST['inversiones_financieras_corto_plazo'];
    $periodificaciones=$_POST['periodificaciones'];
    $efectivo_activos_liquidos=$_POST['efectivo_activos_liquidos'];

    $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    //$query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
    //$mysqli = new mysqli("localhost:3306","loggin","Sencillo_66","loggin");

/* verificar conexión */
//if (mysqli_connect_errno()) {
 //   printf("Connect failed: %s\n", mysqli_connect_error());
    //exit();
//    }
    if($idlibro>0){
		 
     /* echo("insert into Activos (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`, `deudores_comerciales`, `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) values (".$inmovilizado_intangible.",".$inmovilizado_material.",".$inversiones_inmobiliarias.",".$inversiones_en_empresas_grupo.",".$inversiones_financieras_largo_plazo.",".$activos_diferidos.",".$deudores_comerciales_no_corrientes.",".$activos_no_corrientes.",".$existencias.",".$deudores_comerciales_otros.",".$clientes_ventas_prestaciones.",".$accionistas_por_desembolso.",".$otros_deudores.",".$inversiones_financieras_corto_plazo.",".$periodificaciones.",".$efectivo_activos_liquidos.",".$idlibro.")"); */
		
		if (!mysqli_query($conex,"insert into Activos (`inmovilizado_intangible`, `inmovilizado_material`, `inversiones_inmobiliarias`, `inversiones_empresas`, `inversiones_financieras`, `activos_impuestodiferido`, `deudores_comercialesnocorrientes`, `activos_nocorrientes`, `existencias`, `deudores_comerciales`, `clientes_porventas`, `accionistas_pordesembolsos`, `otros_deudores`, `inversiones_financieras_cortoplazo`, `periodificaciones`, `efectivo_otros_activosliquidos`, `id_libro`) values (".$inmovilizado_intangible.",".$inmovilizado_material.",".$inversiones_inmobiliarias.",".$inversiones_en_empresas_grupo.",".$inversiones_financieras_largo_plazo.",".$activos_diferidos.",".$deudores_comerciales_no_corrientes.",".$activos_no_corrientes.",".$existencias.",".$deudores_comerciales_otros.",".$clientes_ventas_prestaciones.",".$accionistas_por_desembolso.",".$otros_deudores.",".$inversiones_financieras_corto_plazo.",".$periodificaciones.",".$efectivo_activos_liquidos.",".$idlibro.")")) {
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
}
	else{
	}
    


?>

<?php 
		$sql="SELECT * from Activos";
		$result=mysqli_query($conex,$sql);
				while($mostrar=mysqli_fetch_array($result)){
		 ?>
			<?php 
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
	<table class="table table-sm">
	
		
  
  
<td style="padding-right:20px;">
<input readonly  name="activo_no_corriente" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				   >

<td style="padding-right:20px;">
<input id="" name="inmovilizado_intangible" type="text"  placeholder="" aria-label="default input example" class="form-control text-end"
 value="<?php echo $mostrar['inmovilizado_intangible'];?>" />

    <td style="padding-right:20px;">
<input name="inmovilizado_material" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				  >

 <td style="padding-right:20px;">
			<input name="inversiones_inmobiliarias" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				   >


  <td style="padding-right:20px;">
			<input name="inversiones_en_empresas_grupo" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
				  >

   <td style="padding-right:20px;">
			<input  name ="inversiones_financieras_largo_plazo"class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
>


  <td style="padding-right:20px;">
			<input name="activos_diferidos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">


  <td style="padding-right:20px;">
			<input name="deudores_comerciales_no_corrientes" class="form-control text-end" type="text"  placeholder="" aria-label="default input example"
>


 <td style="padding-right:20px;">
			<input readonly name="" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">



 <td style="padding-right:20px;">
			<input name="activos_no_corrientes_venta" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		
	

       <td style="padding-right:20px;">
			<input name="existencias" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		


<td style="padding-right:20px;">
			<input name="deudores_comerciales_otros" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		


 <td style="padding-right:20px;">
			<input name="clientes_ventas_prestaciones"  class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		


 <td style="padding-right:20px;">
			<input name="accionistas_por_desembolso" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		



  <td style="padding-right:20px;">
			<input name="otros_deudores" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">




  <td style="padding-right:20px;">
			<input name="inversiones_empresas_grupo" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

		</td>


  <td style="padding-right:20px;">
			<input name="inversiones_financieras_corto_plazo" class="form-control text-end" type="text"  placeholder="" aria-label="default input example" value="<?php echo $mostrar[''] ?>">



  <td style="padding-right:20px;">
			<input  name="periodificaciones" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">




 <td style="padding-right:20px;">
			<input name="efectivo_activos_liquidos" class="form-control text-end" type="text"  placeholder="" aria-label="default input example">

	

		
		
		
	
			
	

	
	


</table>


  	<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
			<script>
jQuery(function($){
$("#double").mask('999,999,999.99');

});
</script>



