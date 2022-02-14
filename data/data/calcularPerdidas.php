<?php
if(isset($_SESSION['id_usuario'])){
    header('Location:index.php'); 
}
class Comparaciones{
    protected $conex;
    
    public function __construct(){
        $this->conex = mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    }

    function getPerdidas($idlibro,$idlibromenor){
        
        $sql1="select * from perdidas where id_libro=".$idlibro;
        $sql2="select * from perdidas where id_libro=".$idlibromenor;
        $result1=mysqli_query($this->conex,$sql1);
        $result2=mysqli_query($this->conex,$sql2);
        $arrayPerdidas = Array();
        $obj1=$result1->fetch_object();
        $obj2=$result2->fetch_object();
        if (($obj1) && ($obj2)){
            
            $arrayPerdidas[] = array("0"=>$obj1->importe_neto,"1"=>$obj2->importe_neto);
            $arrayPerdidas[] = array("0"=>$obj1->variacion,"1"=>$obj2->variacion);
            $arrayPerdidas[] = array("0"=>$obj1->trabajos_realizados,"1"=>$obj2->trabajos_realizados);
            $arrayPerdidas[] = array("0"=>$obj1->aprovisionamientos,"1"=>$obj2->aprovisionamientos);
            $arrayPerdidas[] = array("0"=>$obj1->otros_ingresos,"1"=>$obj2->otros_ingresos);
            $arrayPerdidas[] = array("0"=>$obj1->gastos_personal,"1"=>$obj2->gastos_personal);
            $arrayPerdidas[] = array("0"=>$obj1->otros_gastos,"1"=>$obj2->otros_gastos);
            $arrayPerdidas[] = array("0"=>$obj1->amortizacion_inmovilizado,"1"=>$obj2->amortizacion_inmovilizado);
            $arrayPerdidas[] = array("0"=>$obj1->imputacion_subvenciones,"1"=>$obj2->imputacion_subvenciones);
            $arrayPerdidas[] = array("0"=>$obj1->excesos_provisiones,"1"=>$obj2->excesos_provisiones);
            $arrayPerdidas[] = array("0"=>$obj1->deterioro,"1"=>$obj2->deterioro);
            $arrayPerdidas[] = array("0"=>$obj1->diferencia_negativa,"1"=>$obj2->diferencia_negativa);
            $arrayPerdidas[] = array("0"=>$obj1->otros_resultados,"1"=>$obj2->otros_resultados);
            $arrayPerdidas[] = array("0"=>$obj1->ingresos_financieros,"1"=>$obj2->ingresos_financieros);
            $arrayPerdidas[] = array("0"=>$obj1->gastos_financieros,"1"=>$obj2->gastos_financieros);
            $arrayPerdidas[] = array("0"=>$obj1->variacion_valor,"1"=>$obj2->variacion_valor);
            $arrayPerdidas[] = array("0"=>$obj1->diferencias_cambio,"1"=>$obj2->diferencias_cambio);
            $arrayPerdidas[] = array("0"=>$obj1->deterioro_y_resultado,"1"=>$obj2->deterioro_y_resultado);
            $arrayPerdidas[] = array("0"=>$obj1->otros_ingresos_y_gastos,"1"=>$obj2->otros_ingresos_y_gastos);
            $arrayPerdidas[] = array("0"=>$obj1->impuesto_beneficios,"1"=>$obj2->impuesto_beneficios);


        }
        return $arrayPerdidas;
    }

    function generarTablaPerdidas($array){
        
        $resultadoExplotacion1 =0;
        $resultadoExplotacion2 =0;
        $resultadoFinanciero1=0;
        $resultadoFinanciero2=0;
        $resultadoAntesDeImpuestos1 =0;
        $resultadoAntesDeImpuestos2 =0;
        $resultadoEjercicio1=0;
        $resultadoEjercicio1=0;
        for($i=0;$i<count($array); $i++){
            if($i<=12){
                $resultadoExplotacion1 +=$array[$i][0];
                $resultadoExplotacion2 +=$array[$i][1];
            } 
            else if($i>=13 && $i<=18){
                $resultadoFinanciero1 +=$array[$i][0];
                $resultadoFinanciero2 +=$array[$i][1];
            
            }

        }
        $totalAntesImpuestos1=$resultadoExplotacion1+$resultadoFinanciero1;
        $totalAntesImpuestos2=$resultadoExplotacion2+$resultadoFinanciero2;
        $resultadoEjercicio1= $totalAntesImpuestos1 +$array[19][0];
        $resultadoEjercicio2= $totalAntesImpuestos2 +$array[19][1];


        $porcentaje1= (($array[0][0]==0 && $array[0][1]==0) || $array[0][1]==0) ? 0 : ((($array[0][0]-$array[0][1])/$array[0][1])*100);
        $porcentaje2= (($array[1][0]==0 && $array[1][1]==0) || $array[1][1]==0) ? 0 : ((($array[1][0]-$array[1][1])/$array[1][1])*100);
        $porcentaje3= (($array[2][0]==0 && $array[2][1]==0) || $array[2][1]==0) ? 0 : ((($array[2][0]-$array[2][1])/$array[2][1])*100);
        $porcentaje4=(($array[3][0]==0 && $array[3][1]==0) || $array[3][1]==0) ? 0 : ((($array[3][0]-$array[3][1])/$array[3][1])*100);
        $porcentaje5= (($array[4][0]==0 && $array[4][1]==0) || $array[4][1]==0) ? 0 : ((($array[4][0]-$array[4][1])/$array[4][1])*100);
        $porcentaje6= (($array[5][0]==0 && $array[5][1]==0) || $array[5][1]==0) ? 0 : ((($array[5][0]-$array[5][1])/$array[5][1])*100);
        $porcentaje7= (($array[6][0]==0 && $array[6][1]==0) || $array[6][1]==0) ? 0 : ((($array[6][0]-$array[6][1])/$array[6][1])*100);
        $porcentaje8=(($array[7][0]==0 && $array[7][1]==0) || $array[7][1]==0) ? 0 : ((($array[7][0]-$array[7][1])/$array[7][1])*100);
        $porcentaje9= (($array[8][0]==0 && $array[8][1]==0) || $array[8][1]==0) ? 0 : ((($array[8][0]-$array[8][1])/$array[8][1])*100);
        $porcentaje10= (($array[9][0]==0 && $array[9][1]==0) || $array[9][1]==0) ? 0 : ((($array[9][0]-$array[9][1])/$array[9][1])*100);
        $porcentaje11= (($array[10][0]==0 && $array[10][1]==0) || $array[10][1]==0) ? 0 : ((($array[10][0]-$array[10][1])/$array[10][1])*100);
        $porcentaje12= (($array[11][0]==0 && $array[11][1]==0) || $array[11][1]==0) ? 0 : ((($array[11][0]-$array[11][1])/$array[11][1])*100);
        $porcentaje13= (($array[12][0]==0 && $array[12][1]==0) || $array[12][1]==0) ? 0 : ((($array[12][0]-$array[12][1])/$array[12][1])*100);
        $porcentaje14= (($array[13][0]==0 && $array[13][1]==0) || $array[13][1]==0) ? 0 : ((($array[13][0]-$array[13][1])/$array[13][1])*100);
        $porcentaje15= (($array[14][0]==0 && $array[14][1]==0) || $array[14][1]==0) ? 0 : ((($array[14][0]-$array[14][1])/$array[14][1])*100);
        $porcentaje16= (($array[15][0]==0 && $array[15][1]==0) || $array[15][1]==0) ? 0 : ((($array[15][0]-$array[15][1])/$array[15][1])*100); 
        $porcentaje17= (($array[16][0]==0 && $array[16][1]==0) || $array[16][1]==0) ? 0 : ((($array[16][0]-$array[16][1])/$array[16][1])*100);
        $porcentaje18= (($array[17][0]==0 && $array[17][1]==0) || $array[17][1]==0) ? 0 : ((($array[17][0]-$array[17][1])/$array[17][1])*100);
        $porcentaje19= (($array[18][0]==0 && $array[18][1]==0) || $array[18][1]==0) ? 0 : ((($array[18][0]-$array[18][1])/$array[18][1])*100);
        $porcentaje20=(($array[19][0]==0 && $array[19][1]==0) || $array[19][1]==0) ? 0 : ((($array[19][0]-$array[19][1])/$array[19][1])*100);

        $porcentajeResultadoExplotacion=(($resultadoExplotacion1==0 && $resultadoExplotacion2==0) || $resultadoExplotacion2==0) ? 0 :((($resultadoExplotacion1-$resultadoExplotacion2)/$resultadoExplotacion2)*100);
        $porcentajeResultadoFinanciero=(($resultadoFinanciero1==0 && $resultadoFinanciero2==0) || $resultadoFinanciero2==0) ? 0 :((($resultadoFinanciero1-$resultadoFinanciero2)/$resultadoFinanciero2)*100);
        $porcentajeResultadoImpuesto=(($totalAntesImpuestos1==0 && $totalAntesImpuestos2==0) || $totalAntesImpuestos2==0) ? 0 :((($totalAntesImpuestos1-$totalAntesImpuestos2)/$totalAntesImpuestos2)*100);
        $porcentajeResultadoEjercicio= (($resultadoEjercicio1==0 && $resultadoEjercicio2==0) || $resultadoEjercicio2==0) ? 0 :((($resultadoEjercicio1-$resultadoEjercicio2)/$resultadoEjercicio2)*100);
           
        $table="<table class='table table-sm'>
                
                 <thead>   
            <tr class='table-dark'>
                <th>CUENTA PÉRDIDAS Y GANANCIAS </th>
                <th>Año actual</th>
                <th> %</th>
                <th>Año -1</th>

            </tr>
            </thead>
            <tbody>
            <tr>

            <td class='text-start'>Importe neto de la cifra de negocios</td>
            <td class='text-end'>".number_format($array[0][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje1)." </td>
            <td class='text-end'>".number_format($array[0][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Variación de existencias</td>
            <td class='text-end'>".number_format($array[1][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje2)." </td>
            <td class='text-end'>".number_format($array[1][1], 2, '.', ',')." </td>

            </tr>

            <td class='text-start'>Trabajos realizados para el activo</td>
            <td class='text-end'>".number_format($array[2][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje3)."</td>
            <td class='text-end'>".number_format($array[2][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Aprovisionamientos</td>
            <td class='text-end'>".number_format($array[3][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje4)."  </td>
            <td class='text-end'>".number_format($array[3][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Otros ingresos de explotación</td>
            <td class='text-end'>".number_format($array[4][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje5)." </td>
            <td class='text-end'>".number_format($array[4][1], 2, '.', ',')." </td>


            </tr>

           

            <tr>

            <td class='text-start'>Gastos personal</td>
            <td class='text-end'>".number_format($array[5][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje6)."  </td>
            <td class='text-end'>".number_format($array[5][1], 2, '.', ',')." </td>

            </tr>

            
            <tr>

            <td class='text-start'>Otros gastos explotación</td>
            <td class='text-end'>".number_format($array[6][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje7)." </td>
            <td class='text-end'>".number_format($array[6][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Amortización del inmovilizado</td>
            <td class='text-end'>".number_format($array[7][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje8)."  </td>
            <td class='text-end'>".number_format($array[7][1], 2, '.', ',')." </td>

            </tr>

           <tr>

            <td class='text-start'>Imputación de subvenciones</td>
            <td class='text-end'>".number_format($array[8][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje9)."  </td>
            <td class='text-end'>".number_format($array[8][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Excesos de provisiones</td>
            <td class='text-end'>".number_format($array[9][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje10)."  </td>
            <td class='text-end'>".number_format($array[9][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Deterioro y resultado enajenación inmov</td>
            <td class='text-end'>".number_format($array[10][1], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje11)." </td>
            <td class='text-end'>".number_format($array[10][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Diferencia negativa de comb. negocios</td>
            <td class='text-end'>".number_format($array[11][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje12)." </td>
            <td class='text-end'>".number_format($array[11][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Otros resultados</td>
            <td class='text-end'>".number_format($array[12][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje13)."  </td>
            <td class='text-end'>".number_format($array[12][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>
          
            <td class='text-start'>RESULTADO DE EXPLOTACIÓN</td>
            <td class='text-end'>".number_format($resultadoExplotacion1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeResultadoExplotacion)."  </td>
            <td class='text-end'>".number_format($resultadoExplotacion2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Ingresos financieros</td>
            <td class='text-end'>".number_format($array[13][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje14)."  </td>
            <td class='text-end'>".number_format($array[13][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Gastos financieros</td>
            <td class='text-end'>".number_format($array[14][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje15)."  </td>
            <td class='text-end'>".number_format($array[14][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Variación valor instrumentos financieros</td>
            <td class='text-end'>".number_format($array[15][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje16)."  </td>
            <td class='text-end'>".number_format($array[15][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Diferencias de cambio </td>
            <td class='text-end'>".number_format($array[16][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje17)."  </td>
            <td class='text-end'>".number_format($array[16][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deterioro y resultado de enaj.i.financieros </td>
            <td class='text-end'>".number_format($array[17][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje18)."  </td>
            <td class='text-end'>".number_format($array[17][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Otros ingresos y gastos financieros </td>
            <td class='text-end'>".number_format($array[18][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje19)."  </td>
            <td class='text-end'>".number_format($array[18][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>

            <td class='text-start'>RESULTADO FINANCIERO</td>
            <td class='text-end'>".number_format($resultadoFinanciero1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeResultadoFinanciero)."  </td>
            <td class='text-end'>".number_format($resultadoFinanciero2, 2, '.', ',')." </td>
            </tr>

            <tr class='table-primary'>
            <td class='text-start'>RESULTADO ANTES DE IMPUESTO</td>
            <td class='text-end'>".number_format($totalAntesImpuestos1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeResultadoImpuesto)."  </td>
            <td class='text-end'>".number_format($totalAntesImpuestos2, 2, '.', ',')." </td>
            </tr>

             <tr>
            <td class='text-start'>Impuesto sobre beneficios </td>
            <td class='text-end'>".number_format($array[19][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje20)."  </td>
            <td class='text-end'>".number_format($array[19][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>
            <td class='text-start'>RESULTADO DEL EJERCICIO </td>
            <td class='text-end'>".number_format($resultadoEjercicio1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeResultadoEjercicio)."  </td>
            <td class='text-end'>".number_format($resultadoEjercicio2, 2, '.', ',')." </td>

        
            </tr>

        
            </tbody>
            </table>";
            return $table;

    }
}
?>