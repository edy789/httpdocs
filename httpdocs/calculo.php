<?php 
include ("header.php");
session_start();//en cada archivo escribir session start

if(isset($_POST)){
     $empresa=$_POST['elegir'];
     $year=$_POST['year'];
     $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
     $query=mysqli_query($conex,"SELECT * FROM Libros where id_empresa=".$empresa." and year=".$year);
     
}
else{
     header("location:index.php");
}

?>
<div class="container">
     <div class="row">
          <div class="col">
          <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">
         Activos
    </a>
  </li>
  <li class="nav-item">
    <?php echo ('<a class="nav-link" href="patromonio.php?idempresa='.$empresa.'&year='.$year.'">Patrimonio neto y pasivo</a>'); ?>
  </li>
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="perdidas.php?idempresa='.$empresa.'&year='.$year.'">Perdidas y Ganancias</a>'); ?>
  </li>
  <li class="nav-item">
  <?php echo ('<a class="nav-link" href="ratios.php?idempresa='.$empresa.'&year='.$year.'">Ratios</a>'); ?>
  </li>
</ul>
          </div>
     </div>
</div>

<form>
     <div class="row">
     <div class ="col">
     <div class="row mb-2">
          <label for="inputEmail3" class="col-sm-6 col-form-label">ACTIVO NO CORRIENTE</label>
          <div class="col-sm-4">
               <input readonly  type="number" class="form-control-plaintext" value="0.0" id="inputEmail3">
          </div>

      </div>
          <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Inmovilizado intagible</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Inmovilizado material</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
          <label for="inputEmail3" class="col-sm-6 col-form-label">Inversiones Inmobiliarias</label>
          <div class="col-sm-5">
               <input   type="text" class="form-control"  id="inputEmail3">
          </div>

      </div>
          <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Inversiones financieras a largo plazo</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Activos por impuesto diferido</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
          <label for="inputEmail3" class="col-sm-6 col-form-label">Deudores comerciales no corrientes</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="inputEmail3">
          </div>

      </div>
          <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">ACTIVO CORRIENTE</label>
    <div class="col-sm-5">
    <input readonly  type="text" class="form-control-plaintext" value="0.0" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Activos no corrientes mantenidos para la venta</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>


    <div class="row mb-2">
          <label for="inputEmail3" class="col-sm-6 col-form-label">Existencias</label>
          <div class="col-sm-5">
               <input   type="text" class="form-control"  id="inputEmail3">
          </div>

      </div>
          <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Deudores comerciales y otras</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Clientes por ventas y prestaciones de servicios</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>


    <div class="row mb-2">
          <label for="inputEmail3" class="col-sm-6 col-form-label">Accionistas por desembolsos exigidos</label>
          <div class="col-sm-5">
               <input  type="text" class="form-control"  id="inputEmail3">
          </div>

      </div>
          <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Otros deudores</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">Inversiones en empresas del grupo y asoc</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

</div>

   
<div class ="col-1">
    <div class="row mb-2">
    <label for="inputEmail3" class="col-sm-6 col-form-label">%</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3">
    </div>
    </div>

</div>

</div>
</form>

</body>
</html>



	


	

		
				

		
		
		


	






