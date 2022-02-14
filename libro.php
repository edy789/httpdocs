<?php include('header.php');
session_start();
$conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
$query=mysqli_query($conex,"SELECT * FROM empresas_new where id_usuario=".$_SESSION['id_usuario']);
  

  ?>
<form action="activos.php" method="post">
            <div>
                <center>
                    <h3>Elige una empresa</h3>
                    <select name="elegir"  style="width:400px; margin:0 auto; border:1px solid #FCC; padding: 10px;">>
                    <?php 
                        while($datos = mysqli_fetch_array($query))
                        {
                    ?>
                            <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombre']?> </option>
                    <?php
                        }
                    ?> 
                    </select>
                  
                </center>
            </div>
            <div class="form-control">
                <select name="year" id="" class="form-select">
                    <?php 
                    for($i=2021;$i>=2000;$i--){
                        echo("<option value='$i'>$i</option>");
                    }
                    ?>
                </select>
            </div>
            <div class="form-control">
                <button class="btn" type="submit">Seleccionar</button>
            </div>
        </form>
</body>
</html>