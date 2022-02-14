<?php
if(isset($_SESSION['id_usuario'])){
    header('Location:index.php'); 
}
class Comparaciones{
    protected $conex;
  
    
    public function __construct(){
       
        
        $this->conex = mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    }

    function getActivos($idlibro,$idlibromenor){
        
        $sql1="select * from Activos where id_libro=".$idlibro;
        $sql2="select * from Activos where id_libro=".$idlibromenor;
        $result1=mysqli_query($this->conex,$sql1);
        $result2=mysqli_query($this->conex,$sql2);
        $arrayActivos = Array();  
        $arrayPorcentaje = Array();
      
       
        $obj1=$result1->fetch_object();
        $obj2=$result2->fetch_object();
        if (($obj1) && ($obj2)){
            
            $arrayActivos[] = array("0"=>$obj1->inmovilizado_intangible,"1"=>$obj2->inmovilizado_intangible);
            $arrayActivos[] = array("0"=>$obj1->inmovilizado_material,"1"=>$obj2->inmovilizado_material);
            $arrayActivos[] = array("0"=>$obj1->inversiones_inmobiliarias,"1"=>$obj2->inversiones_inmobiliarias);
            $arrayActivos[] = array("0"=>$obj1->inversiones_empresas,"1"=>$obj2->inversiones_empresas);
            $arrayActivos[] = array("0"=>$obj1->inversiones_financieras,"1"=>$obj2->inversiones_financieras);
            $arrayActivos[] = array("0"=>$obj1->activos_impuestodiferido,"1"=>$obj2->activos_impuestodiferido);
            $arrayActivos[] = array("0"=>$obj1->deudores_comercialesnocorrientes,"1"=>$obj2->deudores_comercialesnocorrientes);
            $arrayActivos[] = array("0"=>$obj1->activos_nocorrientes,"1"=>$obj2->activos_nocorrientes);
            $arrayActivos[] = array("0"=>$obj1->existencias,"1"=>$obj2->existencias);
            $arrayActivos[] = array("0"=>$obj1->clientes_porventas,"1"=>$obj2->clientes_porventas);
            $arrayActivos[] = array("0"=>$obj1->accionistas_pordesembolsos,"1"=>$obj2->accionistas_pordesembolsos);
            $arrayActivos[] = array("0"=>$obj1->otros_deudores,"1"=>$obj2->otros_deudores);
            $arrayActivos[] = array("0"=>$obj1->inversiones_empresas_grupo_noco,"1"=>$obj2->inversiones_empresas_grupo_noco);
            $arrayActivos[] = array("0"=>$obj1->inversiones_financieras_cortoplazo,"1"=>$obj2->inversiones_financieras_cortoplazo);
            $arrayActivos[] = array("0"=>$obj1->periodificaciones,"1"=>$obj2->periodificaciones);
            $arrayActivos[] = array("0"=>$obj1->efectivo_otros_activosliquidos,"1"=>$obj2->efectivo_otros_activosliquidos);

          


          

        }
        return $arrayActivos;
    }
    
   





    function generarTabla($array){
        
        $activoCorriente1 =0;
        $activoCorriente2=0;
        $activoNoCorriente1 =0;
        $activoNoCorriente2=0;
        for($i=0;$i<count($array); $i++){
            if($i<=6){
                $activoNoCorriente1 +=$array[$i][0];
                $activoNoCorriente2 +=$array[$i][1];
            }
            else{
                $activoCorriente1 +=$array[$i][0];
                $activoCorriente2 +=$array[$i][1];
            }

        }
       
        $deudores1=$array[9][0]+$array[10][0]+$array[11][0];
        $deudores2=$array[9][1]+$array[10][1]+$array[11][1];

        $total1=$activoNoCorriente1+$activoCorriente1;
        $total2=$activoNoCorriente2+$activoCorriente2;

        $porcentajeNoCorriente=(($activoNoCorriente1==0 && $activoNoCorriente2==0) || $activoNoCorriente2==0) ? 0 : ((($activoNoCorriente1-$activoNoCorriente2)/$activoNoCorriente2)*100);
        $porcentajeCorriente= (($activoCorriente1==0 && $activoCorriente2==0) || $activoCorriente2==0) ? 0 :((($activoCorriente1-$activoCorriente2)/$activoCorriente2)*100);
        $porcentajeDeudodores=(($deudores1==0 && $deudores2==0) || $deudores2==0) ? 0 :((($deudores1-$deudores2)/$deudores2)*100);

        $porcentaje1= (($array[0][0]==0 && $array[0][1]==0) || $array[0][1]==0) ? 0 : ((($array[0][0]-$array[0][1])/$array[0][1])*100);
        $porcentaje2= (($array[1][0]==0 && $array[1][1]==0) || $array[1][1]==0) ? 0 : ((($array[1][0]-$array[1][1])/$array[1][1])*100);
        $porcentaje3= (($array[2][0]==0 && $array[2][1]==0) || $array[2][1]==0) ? 0 : ((($array[2][0]-$array[2][1])/$array[2][1])*100);
        $porcentaje4= (($array[3][0]==0 && $array[3][1]==0) || $array[3][1]==0) ? 0 : ((($array[3][0]-$array[3][1])/$array[3][1])*100);
        $porcentaje5= (($array[4][0]==0 && $array[4][1]==0) || $array[4][1]==0) ? 0 : ((($array[4][0]-$array[4][1])/$array[4][1])*100);
        $porcentaje6= (($array[5][0]==0 && $array[5][1]==0) || $array[5][1]==0) ? 0 : ((($array[5][0]-$array[5][1])/$array[5][1])*100);
        $porcentaje7= (($array[6][0]==0 && $array[6][1]==0) || $array[6][1]==0) ? 0 : ((($array[6][0]-$array[6][1])/$array[6][1])*100);
        $porcentaje8= (($array[7][0]==0 && $array[7][1]==0) || $array[7][1]==0) ? 0 : ((($array[7][0]-$array[7][1])/$array[7][1])*100);
        $porcentaje9= (($array[8][0]==0 && $array[8][1]==0) || $array[8][1]==0) ? 0 : ((($array[8][0]-$array[8][1])/$array[8][1])*100);
        $porcentaje10= (($array[9][0]==0 && $array[9][1]==0) || $array[9][1]==0) ? 0 : ((($array[9][0]-$array[9][1])/$array[9][1])*100);
        $porcentaje11= (($array[10][0]==0 && $array[10][1]==0) || $array[10][1]==0) ? 0 : ((($array[10][0]-$array[10][1])/$array[10][1])*100);
        $porcentaje12= (($array[11][0]==0 && $array[11][1]==0) || $array[11][1]==0) ? 0 : ((($array[11][0]-$array[11][1])/$array[11][1])*100);
        $porcentaje13= (($array[12][0]==0 && $array[12][1]==0) || $array[12][1]==0) ? 0 : ((($array[12][0]-$array[12][1])/$array[12][1])*100);
        $porcentaje14= (($array[13][0]==0 && $array[13][1]==0) || $array[13][1]==0) ? 0 : ((($array[13][0]-$array[13][1])/$array[13][1])*100);
        $porcentaje15= (($array[14][0]==0 && $array[14][1]==0) || $array[14][1]==0) ? 0 : ((($array[14][0]-$array[14][1])/$array[14][1])*100);
        $porcentaje16= (($array[15][0]==0 && $array[15][1]==0) || $array[15][1]==0) ? 0 : ((($array[15][0]-$array[15][1])/$array[15][1])*100);
        $porcentaje17= (($total1==0 && $total2==0) || $total2==0) ? 0 : ((($total1-$total2)/$total2)*100);

       

            $table="<table class='table table-sm'>
                
                 <thead>   
            <tr class='table-dark'>
                <th>ACTIVO </th>
                <th>Año actual</th>
                <th>%</th>
                <th>Año -1</th>

            </tr>
            </thead>
            <tbody>
            <tr class='table-primary'>

            <td class='text-start'>ACTIVO NO CORRIENTE</td>
            <td    class='text-end'>".number_format($activoNoCorriente1, 2, '.', ',')." </td>
            <td    class='text-end'>".sprintf('%.2f', $porcentajeNoCorriente)."  </td>
            <td    class='text-end'>".number_format($activoNoCorriente2, 2, '.', ',')." </td>
            </tr>

            <tr>
        
            <td class='text-start'>Inmovilizado intangible</td>
            <td   class='text-end'>".number_format($array[0][0], 2, '.', ',')." </td>
            <td   class='text-end'>".sprintf('%.2f', $porcentaje1)."  </td>
            
            <td  class='text-end'>".number_format($array[0][1], 2, '.', ',')." </td>

            </tr>

            <td class='text-start'>Inmovilizado material</td>
            <td class='text-end'>".number_format($array[1][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje2)." </td>
            <td class='text-end'>".number_format($array[1][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Inversiones inmobiliarias</td>
            <td class='text-end'>".number_format($array[2][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje3)."  </td>

            <td class='text-end'>".number_format($array[2][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Inmovilizado Inversiones en empresas del grupo y asoc</td>
            <td class='text-end'>".number_format($array[3][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje4)."  </td>
            <td class='text-end'>".number_format($array[3][1], 2, '.', ',')." </td>


            </tr>

           

            <tr>

            <td class='text-start'>Inversiones financieras a largo plazo</td>
            <td class='text-end'>".number_format($array[4][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje5)."  </td>
            <td class='text-end'>".number_format($array[4][1], 2, '.', ',')." </td>

            </tr>

            
            <tr>

            <td class='text-start'>Activos por impuesto diferido</td>
            <td class='text-end'>".number_format($array[5][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje6)." </td>
            <td class='text-end'>".number_format($array[5][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudores commerciales no corrientes</td>
            <td class='text-end'>".number_format($array[6][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje7)."  </td>
            <td class='text-end'>".number_format($array[6][1], 2, '.', ',')." </td>

            </tr>

           <tr class='table-primary'>

            <td class='text-start'>ACTIVO CORRIENTE</td>
            <td class='text-end'>".number_format($activoCorriente1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeCorriente)."  </td>
            <td class='text-end'>".number_format($activoCorriente2, 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Activos no corrientes mantenidos para la venta</td>
            <td class='text-end'>".number_format($array[7][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje8)."  </td>
            <td class='text-end'>".number_format($array[7][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Existencias</td>
            <td class='text-end'>".number_format($array[8][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje9)." </td>
            <td class='text-end'>".number_format($array[8][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudores comerciales y otras c. a cobrar</td>
            <td class='text-end'>".number_format($deudores1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeDeudodores)." </td>
            <td class='text-end'>".number_format($deudores2, 2, '.', ',')." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Clientes por ventas y prestaciones de servicios</td>
            <td class='text-end'>".number_format($array[9][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje10)."  </td>
            <td class='text-end'>".number_format($array[9][1], 2, '.', ',')." </td>

            </tr>

            <tr>
          
            <td class='text-start'>Accionistas por desembolsos exigidos</td>
            <td class='text-end'>".number_format($array[10][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje11)."  </td>
            <td class='text-end'>".number_format($array[10][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Otros deudores</td>
            <td class='text-end'>".number_format($array[11][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje12)."  </td>
            <td class='text-end'>".number_format($array[11][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Inversiones en empresas del grupo y asoc</td>
            <td class='text-end'>".number_format($array[12][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje13)."  </td>
            <td class='text-end'>".number_format($array[12][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Inversiones financieras a corto plazo</td>
            <td class='text-end'>".number_format($array[13][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje14)."  </td>
            <td class='text-end'>".number_format($array[13][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Periodificaciones</td>
            <td class='text-end'>".number_format($array[14][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje15)."  </td>
            <td class='text-end'>".number_format($array[14][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Efectivo y otros activos liquidos equiv </td>
            <td class='text-end'>".number_format($array[15][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaj16)."  </td>
            <td class='text-end'>".number_format($array[15][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary text-start'>
            <td >Total</td>
            <td class='text-end'>".number_format($total1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje17)." </td>
            <td class='text-end'>".number_format($total2, 2, '.', ',')." </td>

            </tr>
            </tbody>
            
            </table>";
            return $table;

    }
}
?>
