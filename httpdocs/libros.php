<?php
session_start();//en cada archivo escribir session start
if(sizeof($_SESSION)==0){
  header('Location:index.php'); 
}
if(isset($_POST)){
    session_start();//en cada archivo escribir session start
	
    $idempresa = $_POST['elegir'];
    $year = $_POST['year'];
	
	
    $conex=mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
	
	$yearmenor= $year-1;
	//echo("select * from Libros where id_empresa=".$idempresa." and year='".$year."'");
	//Comprobamos si el año actual existe
    if ($result=mysqli_query($conex,"select * from Libros where id_empresa=".$idempresa." and year='".$year."'")) {//comprobacion existencia del libro de la empresa en ese año
        
        if($obj = $result->fetch_object()){//si existe el libro
            
            if ($result=mysqli_query($conex,"select * from Activos where id_libro=".$obj->id)) {//buscamos contenido de ese libro en la tabla activos
        
                if($obj2 = $result->fetch_object()){//si existe
                    if ($result=mysqli_query($conex,"select * from Pasivos where id_libro=".$obj->id)) {//buscamos contenido de ese libro en la tabla pasivos
        
                        if($obj3 = $result->fetch_object()){//si existe
                            if ($result=mysqli_query($conex,"select * from perdidas where id_libro=".$obj->id)) {//buscamos contenido de ese libro en la tabla perdidas
        
                                if($obj4 = $result->fetch_object()){// si existe
                                    //comprobamos datos del año anterior
                                    if ($result=mysqli_query($conex,"select * from Libros where id_empresa=".$idempresa." and year='".$yearmenor."'")) {//comprobacion existencia del libro de la empresa en ese año
        
                                        if($objMenor = $result->fetch_object()){//si existe el libro
                                            
                                            if ($result=mysqli_query($conex,"select * from Activos where id_libro=".$objMenor->id)) {//buscamos contenido de ese libro en la tabla activos
                                        
                                                if($obj5 = $result->fetch_object()){//si existe
                                                    if ($result=mysqli_query($conex,"select * from Pasivos where id_libro=".$objMenor->id)) {//buscamos contenido de ese libro en la tabla pasivos
                                        
                                                        if($obj6 = $result->fetch_object()){//si existe
                                                            if ($result=mysqli_query($conex,"select * from perdidas where id_libro=".$objMenor->id)) {//buscamos contenido de ese libro en la tabla perdidas
                                        
                                                                if($ob3j = $result->fetch_object()){// si existe
                                                                    //redirige a comparacion
                                                                    header('Location:comparacionActivos.php?year='.$year.'&elegir='.$idempresa);
                                                                    
                                                                }
                                                                else{
                                                                    //redirige a perdidas
                                                                    header('Location:perdidas.php?year='.$yearmenor.'&elegir='.$idempresa);
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            //redirige a pasivos
                                                            header('Location:pneto.php?year='.$yearmenor.'&elegir='.$idempresa);
                                                        }
                                                    }
                                                }
                                                else{
                                                    //redirige activos
                                                    header('Location:activos.php?year='.$yearmenor.'&elegir='.$idempresa);
                                                }
                                            }
                                        }
                                        else{
                                            //si no existe libro de año anterior lo crea y redirige a activos
                                            if( $resultado = mysqli_query($conex,"Insert into Libros(year,id_empresa) values('".$yearmenor."',".$idempresa.")")){
                                                header('Location:activos.php?year='.$yearmenor.'&elegir='.$idempresa);
                                            }
                                            else{
                                                echo(mysqli_error($conex));
                                            }
                                        }
                                    }
                                

                                    /*if ($result=mysqli_query($conex,"select * from Activos where id_libro=".$ob->id)) {
        
                                        if($obj = $result->fetch_object()){

                                        }
                                        else{
                                            //redirge
                                        }
                                    }*/
                                }
                                else{
                                    //redirige perdidas
                                    header('Location:perdidas.php?year='.$year.'&elegir='.$idempresa);
                                }
                            }
                            else{
                                echo(mysqli_error($conex));
                            }
                        }
                        else{
                            //redirige pasivos
                            header('Location:pneto.php?year='.$year.'&elegir='.$idempresa);
                        }
                    }
                    else{
                        echo(mysqli_error($conex));
                    }
                }
                else{
                    //redirige activos
                    header('Location:activos.php?year='.$year.'&elegir='.$idempresa);
                }
            }
            else{
                echo(mysqli_error($conex));
            }
        }
        else {
            if( $resultado = mysqli_query($conex,"Insert into Libros(year,id_empresa) values('".$year."',".$idempresa.")")){
                header('Location:activos.php?year='.$year.'&elegir='.$idempresa);
            }
            else{
                echo(mysqli_error($conex));
            }
        }
	
    }
	  
    else{
		echo(mysqli_error($conex));
		header('Location:comparacionActivos.php?year='.$year.'&elegir='.$idempresa);
		
	}
}
else{
    //salir del archivo
    header('Location:selectLibro.php');
}