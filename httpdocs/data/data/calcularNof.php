<?php
if(isset($_SESSION['id_usuario'])){
    header('Location:index.php'); 
}
class Comparaciones{
    protected $conex;
    
    public function __construct(){
        $this->conex = mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    }

    function getNof($idlibro,$idlibromenor){

        
        $sql1="select * from Activos where id_libro=".$idlibro;
        $sql2="select * from Activos where id_libro=".$idlibromenor;
        $sql3="select * from Pasivos where id_libro=".$idlibro;
        $sql4="select * from Pasivos where id_libro=".$idlibromenor;
        $sql5="select * from perdidas where id_libro=".$idlibro;
        $sql6="select * from perdidas where id_libro=".$idlibromenor;
        
      
       
        
        $result1=mysqli_query($this->conex,$sql1);
        $result2=mysqli_query($this->conex,$sql2);
        $result3=mysqli_query($this->conex,$sql3);
        $result4=mysqli_query($this->conex,$sql4);
        $result5=mysqli_query($this->conex,$sql5);
        $result6=mysqli_query($this->conex,$sql6);

        $arrayActivos = Array();
        $arrayPasivos = Array();
        $arrayPerdidas = Array();
        $arrayRatios=Array();

        $obj1=$result1->fetch_object();
        $obj2=$result2->fetch_object();
        $obj3=$result3->fetch_object();
        $obj4=$result4->fetch_object();
        $obj5=$result5->fetch_object();
        $obj6=$result6->fetch_object();


        if (($obj5) && ($obj6)){
            
            $arrayPerdidas[] = array("0"=>$obj5->importe_neto,"1"=>$obj6->importe_neto);
            $arrayPerdidas[] = array("0"=>$obj5->variacion,"1"=>$obj6->variacion);
            $arrayPerdidas[] = array("0"=>$obj5->trabajos_realizados,"1"=>$obj6->trabajos_realizados);
            $arrayPerdidas[] = array("0"=>$obj5->aprovisionamientos,"1"=>$obj6->aprovisionamientos);
            $arrayPerdidas[] = array("0"=>$obj5->otros_ingresos,"1"=>$obj6->otros_ingresos);
            $arrayPerdidas[] = array("0"=>$obj5->gastos_personal,"1"=>$obj6->gastos_personal);
            $arrayPerdidas[] = array("0"=>$obj5->otros_gastos,"1"=>$obj6->otros_gastos);
            $arrayPerdidas[] = array("0"=>$obj5->amortizacion_inmovilizado,"1"=>$obj6->amortizacion_inmovilizado);
            $arrayPerdidas[] = array("0"=>$obj5->imputacion_subvenciones,"1"=>$obj6->imputacion_subvenciones);
            $arrayPerdidas[] = array("0"=>$obj5->excesos_provisiones,"1"=>$obj6->excesos_provisiones);
            $arrayPerdidas[] = array("0"=>$obj5->deterioro,"1"=>$obj6->deterioro);
            $arrayPerdidas[] = array("0"=>$obj5->diferencia_negativa,"1"=>$obj6->diferencia_negativa);
            $arrayPerdidas[] = array("0"=>$obj5->otros_resultados,"1"=>$obj6->otros_resultados);
            $arrayPerdidas[] = array("0"=>$obj5->ingresos_financieros,"1"=>$obj6->ingresos_financieros);
            $arrayPerdidas[] = array("0"=>$obj5->gastos_financieros,"1"=>$obj6->gastos_financieros);
            $arrayPerdidas[] = array("0"=>$obj5->variacion_valor,"1"=>$obj6->variacion_valor);
            $arrayPerdidas[] = array("0"=>$obj5->diferencias_cambio,"1"=>$obj6->diferencias_cambio);
            $arrayPerdidas[] = array("0"=>$obj5->deterioro_y_resultado,"1"=>$obj6->deterioro_y_resultado);
            $arrayPerdidas[] = array("0"=>$obj5->otros_ingresos_y_gastos,"1"=>$obj6->otros_ingresos_y_gastos);
            $arrayPerdidas[] = array("0"=>$obj5->impuesto_beneficios,"1"=>$obj6->impuesto_beneficios);


        }
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
        if (($obj3) && ($obj4)){
            
            //$arrayPasivos[] = array("0"=>$obj1->fondos_propios,"1"=>$obj2->fondos_propios);
             $arrayPasivos[] = array("0"=>$obj3->capital,"1"=>$obj4->capital);
             $arrayPasivos[] = array("0"=>$obj3->prima_emision,"1"=>$obj4->prima_emision);
             $arrayPasivos[] = array("0"=>$obj3->reservas,"1"=>$obj4->reservas);
             $arrayPasivos[] = array("0"=>$obj3->acciones_propias,"1"=>$obj4->acciones_propias);
             $arrayPasivos[] = array("0"=>$obj3->resultado_ejercicio_anteriores,"1"=>$obj4->resultado_ejercicio_anteriores);
             $arrayPasivos[] = array("0"=>$obj3->otras_aportaciones,"1"=>$obj4->otras_aportaciones);
             $arrayPasivos[] = array("0"=>$obj3->resultado_del_ejercicio,"1"=>$obj4->resultado_del_ejercicio);
             $arrayPasivos[] = array("0"=>$obj3->dividendo,"1"=>$obj4->dividendo);
             $arrayPasivos[] = array("0"=>$obj3->otros_instrumentos,"1"=>$obj4->otros_instrumentos);
             $arrayPasivos[] = array("0"=>$obj3->ajustes_por_cambios,"1"=>$obj4->ajustes_por_cambios);
             $arrayPasivos[] = array("0"=>$obj3->socios_externos,"1"=>$obj4->socios_externos);
             $arrayPasivos[] = array("0"=>$obj3->provisiones_lp,"1"=>$obj4->provisiones_lp);
             //11
             //$arrayPasivos[] = array("0"=>$obj3->deudas_lp,"1"=>$obj4->deudas_lp);
             $arrayPasivos[] = array("0"=>$obj3->deudas_entidades_noco,"1"=>$obj4->deudas_entidades_noco);
             $arrayPasivos[] = array("0"=>$obj3->acreedores_arrendamiento_noco,"1"=>$obj4->acreedores_arrendamiento_noco);
             $arrayPasivos[] = array("0"=>$obj3->otras_deudas_lp,"1"=>$obj4->otras_deudas_lp);
             $arrayPasivos[] = array("0"=>$obj3->deudas_empresas_noco,"1"=>$obj4->deudas_empresas_noco);
             $arrayPasivos[] = array("0"=>$obj3->pasivos_por_impuestos,"1"=>$obj4->pasivos_por_impuestos);
             $arrayPasivos[] = array("0"=>$obj3->periodificaciones_lp,"1"=>$obj4->periodificaciones_lp);
             $arrayPasivos[] = array("0"=>$obj3->acreedores_comerciales_noco,"1"=>$obj4->acreedores_comerciales_noco);
             $arrayPasivos[] = array("0"=>$obj3->deuda_caracteristicas_noco,"1"=>$obj4->deuda_caracteristicas_noco);
             $arrayPasivos[] = array("0"=>$obj3->pasivos_vinculados,"1"=>$obj4->pasivos_vinculados);
             $arrayPasivos[] = array("0"=>$obj3->provisiones_cp,"1"=>$obj4->provisiones_cp);
             //21
             //$arrayPasivos[] = array("0"=>$obj3->deudas_cp,"1"=>$obj4->deudas_cp);
             $arrayPasivos[] = array("0"=>$obj3->deudas_entidades_co,"1"=>$obj4->deudas_entidades_co);
             $arrayPasivos[] = array("0"=>$obj3->acreedores_arrendamiento_co,"1"=>$obj4->acreedores_arrendamiento_co);
             $arrayPasivos[] = array("0"=>$obj3->otras_deudas_cp,"1"=>$obj4->otras_deudas_cp);
             $arrayPasivos[] = array("0"=>$obj3->deudas_empresas_co,"1"=>$obj4->deudas_empresas_co);
             //25
             //$arrayPasivos[] = array("0"=>$obj3->acreedores_comerciales_co,"1"=>$obj4->acreedores_comerciales_co);
             $arrayPasivos[] = array("0"=>$obj3->proveedores,"1"=>$obj4->proveedores);
             $arrayPasivos[] = array("0"=>$obj3->otros_acreedores,"1"=>$obj4->otros_acreedores);
             $arrayPasivos[] = array("0"=>$obj3->periodificaciones_cp,"1"=>$obj4->periodificaciones_cp);
             $arrayPasivos[] = array("0"=>$obj3->deuda_caracteristicas_co,"1"=>$obj4->deuda_caracteristicas_co);
 
         }
         $arrayRatios=array("0"=>$arrayActivos,"1"=>$arrayPasivos,"2"=>$arrayPerdidas);
        return $arrayRatios;
    }

    function generarTablaNof($array){
        $activos = $array[0];
        $pasivos = $array[1];
        $perdidas = $array[2];

        //Ratios de actividad
        $tv= (($perdidas[0][0]==0 && $perdidas[0][1]==0) || $perdidas[0][1]==0) ? 0 : ((($perdidas[0][0]-$perdidas[0][1])/$perdidas[0][1])*100);
        $pmc1=  $perdidas[0][0]==0 ? 0 :(($activos[9][0])/($perdidas[0][0]*1.21))*365;
        $pmc2=  $perdidas[0][1]==0 ? 0 :(($activos[9][1])/($perdidas[0][1]*1.21))*365;

        $pmp1 =  $perdidas[3][0]==0 ? 0 :(($pasivos[26][0])/($perdidas[3][0]*1.21))*365*-1;
        $pmp2 =  $perdidas[3][1]==0 ? 0 :(($pasivos[26][1])/($perdidas[3][1]*1.21))*365*-1;

        $gp1=  $perdidas[0][0]==0 ? 0 :(($perdidas[5][0])/$perdidas[0][0])*100*-1;
        $gp2=  $perdidas[0][1]==0 ? 0 :(($perdidas[5][1])/$perdidas[0][1])*100*-1;
        $porcentajegp= (($gp1==0 && $gp2==0) || $gp2==0) ? 0 : ((($gp1-$gp2)/$gp2)*100);


        //Ratios de rentabilidad
        $mb1= $perdidas[0][0]==0 ? 0 :(($perdidas[0][0]+$perdidas[1][0]+$perdidas[2][0]+$perdidas[3][0]+$perdidas[4][0]+$perdidas[5][0]+$perdidas[6][0])*100)/$perdidas[0][0];
        $mb2= $perdidas[0][1]==0 ? 0 :(($perdidas[0][1]+$perdidas[1][1]+$perdidas[2][1]+$perdidas[3][1]+$perdidas[4][1]+$perdidas[5][1]+$perdidas[6][1])*100)/$perdidas[0][1];
        $porcentajemb= (($mb1==0 && $mb2==0) || $mb2==0) ? 0 : ((($mb1-$mb2)/$mb2)*100);

        $mo1= $perdidas[0][0]==0 ? 0 :(($perdidas[0][0]+$perdidas[1][0]+$perdidas[2][0]+$perdidas[3][0]+$perdidas[4][0]+$perdidas[5][0]+$perdidas[6][0]+$perdidas[7][0]+$perdidas[8][0]+$perdidas[9][0])*100)/$perdidas[0][0];
        $mo2= $perdidas[0][1]==0 ? 0 :(($perdidas[0][1]+$perdidas[1][1]+$perdidas[2][1]+$perdidas[3][1]+$perdidas[4][1]+$perdidas[5][1]+$perdidas[6][1]+$perdidas[7][1]+$perdidas[8][1]+$perdidas[9][1])*100)/$perdidas[0][1];
        $porcentajemo= (($mo1==0 && $mo2==0) || $mo2==0) ? 0 : ((($mo1-$mo2)/$mo2)*100);
        
        //calculo de b22 de activos
        $activoCorriente1 =0;
        $activoCorriente2=0;
        $activoNoCorriente1 =0;
        $activoNoCorriente2=0;
        for($i=0;$i<count($activos); $i++){
            if($i<=6){
                $activoNoCorriente1 +=$activos[$i][0];
                $activoNoCorriente2 +=$activos[$i][1];
            }
            else{
                $activoCorriente1 +=$activos[$i][0];
                $activoCorriente2 +=$activos[$i][1];
            }

        }
        $deudores1=$activos[9][0]+$activos[10][0]+$activos[11][0];
        $deudores2=$activos[9][1]+$activos[10][1]+$activos[11][1];
        $totalactivos1=$activoNoCorriente1+$activoCorriente1;
        $totalactivos2=$activoNoCorriente2+$activoCorriente2;

        $roa1= $totalactivos1==0 ? 0 :(($perdidas[0][0]+$perdidas[1][0]+$perdidas[2][0]+$perdidas[3][0]+$perdidas[4][0]+$perdidas[5][0]+$perdidas[6][0]+$perdidas[7][0]+$perdidas[8][0]+$perdidas[9][0])*100)/$totalactivos1;
        $roa2= $totalactivos2==0 ? 0 :(($perdidas[0][1]+$perdidas[1][1]+$perdidas[2][1]+$perdidas[3][1]+$perdidas[4][1]+$perdidas[5][1]+$perdidas[6][1]+$perdidas[7][1]+$perdidas[8][1]+$perdidas[9][1])*100)/$totalactivos2;
        $porcentajeroa= (($roa1==0 && $roa2==0) || $roa2==0) ? 0 : ((($roa1-$roa2)/$roa2)*100);

        //calculo resultado ejercicio pyg b26
        $resultadoExplotacion1 =0;
        $resultadoExplotacion2 =0;
        $resultadoFinanciero1=0;
        $resultadoFinanciero2=0;
        $resultadoAntesDeImpuestos1 =0;
        $resultadoAntesDeImpuestos2 =0;
        $resultadoEjercicio1=0;
        $resultadoEjercicio1=0;
        for($i=0;$i<count($perdidas); $i++){
            if($i<=12){
                $resultadoExplotacion1 +=$perdidas[$i][0];
                $resultadoExplotacion2 +=$perdidas[$i][1];
            } 
            else if($i>=13 && $i<=18){
                $resultadoFinanciero1 +=$perdidas[$i][0];
                $resultadoFinanciero2 +=$perdidas[$i][1];
            
            }

        }
        $totalAntesImpuestos1=$resultadoExplotacion1+$resultadoFinanciero1;
        $totalAntesImpuestos2=$resultadoExplotacion2+$resultadoFinanciero2;
        $resultadoEjercicio1= $totalAntesImpuestos1 +$perdidas[19][0];
        $resultadoEjercicio2= $totalAntesImpuestos2 +$perdidas[19][1];

        //calculo fondos propios b4 pasivo y neto
        $acreedores1=0;
        $acreedores2=0;
        $deudasLargoPlazo1=0;
        $deudasLargoPlazo2=0;
        $deudasCortoPlazo1=0;
        $deudasCortoPlazo2=0;
        $fondosPropios1=0;
        $fondosPropios2=0;
       
        $pasivoNoCorriente1=0;
        $pasivoNoCorriente2=0;
        $pasivoCorriente1=0;
        $pasivoCorriente2=0;



       
        for($i=0;$i<count($pasivos); $i++){
            if($i<=8){
                $fondosPropios1 +=$pasivos[$i][0];
                $fondosPropios2 +=$pasivos[$i][1];
            }
            if($i>=12 && $i<15){
                $deudasLargoPlazo1 +=$pasivos[$i][0];
                $deudasLargoPlazo2 +=$pasivos[$i][1];

            }
            if($i>=22 && $i<25){
                $deudasCortoPlazo1 +=$pasivos[$i][0];
                $deudasCortoPlazo2 +=$pasivos[$i][1];
            }
            if($i>=26 && $i<=27){
                $acreedores1 +=$pasivos[$i][0];
                $acreedores2 +=$pasivos[$i][1];
            }

        }

        $pasivoCorriente1=$pasivos[20][0]  + $pasivos[21][0] +$deudasCortoPlazo1 +$pasivos[25][0] +$acreedores1 +  $pasivos[28][0] +$pasivos[29][0];
        $pasivoCorriente2=$pasivos[20][1]  + $pasivos[21][1] +$deudasCortoPlazo2 +$pasivos[25][1] +$acreedores2 +  $pasivos[28][1] +$pasivos[29][1] ;

        $aco1=$activos[7][0] + $activos[8][0]+ $deudores1+ $activos[14][0]+ $activos[15][0];
        $aco2=$activos[7][1] + $activos[8][1]+ $deudores2+ $activos[14][1]+ $activos[15][1];

        $pco1=$pasivos[20][0] + $pasivos[21][0]+$pasivos[25][0]+$acreedores1 + $pasivos[28][0];
        $pco2=$pasivos[20][1] + $pasivos[21][1]+$pasivos[25][1]+$acreedores2 + $pasivos[28][1];


        $nof1=$aco1 -$pco1;
        $nof2=$aco2 -$pco2;

        $fm1=$activoCorriente1 -$pasivoCorriente1;
        $fm2=$activoCorriente2 - $pasivoCorriente2;

        $pl1=$fm1-$nof1;
        $pl2=$fm2-$nof2;

        $porcentajeDeudores= $deudores2==0 ? 0 : (($deudores2/$deudores2)*100);
        $porcentajeAcreedores=(($acreedores1==0 && $acreedores==0) || $acreedores2==0) ? 0 :((($acreedores1-$acreedores2)/$acreedores2)*100);
        $porcentajeDeudores=(($deudores1==0 && $deudores2==0) || $deudores2==0) ? 0 :((($deudores1-$deudores2)/$deudores2)*100);
        $porcentajeAco=(($aco1==0 && $aco2==0) || $aco2==0) ? 0 :((($aco1-$aco2)/$aco2)*100);
        $porcentajePco=(($pco1==0 && $pco2==0) || $pco2==0) ? 0 :((($pco1-$pco2)/$pco2)*100);
        $porcentajeNof=(($nof1==0 && $nof2==0) || $nof2==0) ? 0 :((($nof1-$nof2)/$nof2)*100);
        $porcentajePl=(($pl1==0 && $pl2==0) || $pl2==0) ? 0 :((($pl1-$pl2)/$pl2)*100);
        $porcentajeFm=(($fm1==0 && $fm2==0) || $fm2==0) ? 0 :((($fm1-$fm2)/$fm2)*100);

        $porcentaje1= (($activos[7][0]==0 && $activos[7][1]==0) || $activos[7][1]==0) ? 0 : ((($activos[7][0]-$activos[7][1])/$activos[7][1])*100);
        $porcentaje2= (($activos[8][0]==0 && $activos[8][1]==0) || $activos[8][1]==0) ? 0 : ((($activos[8][0]-$activos[8][1])/$activos[8][1])*100);
        $porcentaje3= (($activos[14][0]==0 && $activos[14][1]==0) || $activos[14][1]==0) ? 0 : ((($activos[14][0]-$activos[14][1])/$activos[14][1])*100);
        $porcentaje4=(($activos[15][0]==0 && $activos[15][1]==0) || $activos[15][1]==0) ? 0 : ((($activos[15][0]-$activos[15][1])/$activos[15][1])*100);
        $porcentaje5= (($pasivos[20][0]==0 && $pasivos[20][1]==0) || $pasivos[20][1]==0) ? 0 :((($pasivos[20][0]-$pasivos[20][1])/$pasivos[20][1])*100);
        $porcentaje6= (($pasivos[21][0]==0 && $pasivos[21][1]==0) || $pasivos[21][1]==0) ? 0 :((($pasivos[21][0]-$pasivos[21][1])/$pasivos[21][1])*100);
        $porcentaje7= (($pasivos[25][0]==0 && $pasivos[25][1]==0) || $pasivos[25][1]==0) ? 0 :((($pasivos[25][0]-$pasivos[25][1])/$pasivos[25][1])*100);
        $porcentaje8=(($pasivos[28][0]==0 && $pasivos[28][1]==0) || $pasivos[28][1]==0) ? 0 :((($pasivos[28][0]-$pasivos[28][1])/$pasivos[28][1])*100);
       

       
        $table="<table class='table table-sm'>
                
                 <thead>   
            <tr class='table-dark'>
                <th>NOF </th>
                <th>Año actual</th>
                <th> %</th>
                <th>Año -1</th>

            </tr>
            </thead>
            <tbody>
          

          

            <tr class='table-primary'>
            <td class='text-start'>Activo corriente operativo (ACO)</td>
            <td class='text-end'>".number_format($aco1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajeAco)." </td>
            
            <td class='text-end'>".number_format($aco2, 2, '.', ',')." </td>
            
          

            </tr>

            <tr>

            <td class='text-start'>Activos corrientes mantenidos para la venta</td>
            <td class='text-end'>".number_format($activos[7][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje1)." </td>
            <td class='text-end'>".number_format($activos[7][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Existencias</td>
            <td class='text-end'>".number_format($activos[8][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje2)." </td>
            <td class='text-end'>".number_format($activos[8][1], 2, '.', ',')." </td>


            </tr>

           
            <tr>

            <td class='text-start'>Deudores comerciales y otras cuentas a cobrar</td>
            <td class='text-end'>".number_format($deudores1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajeDeudores)." </td>
            <td class='text-end'>".number_format($deudores2, 2, '.', ',')." </td>

            </tr>

           <tr>

            <td class='text-start'>Periodificaciones</td>
            <td class='text-end'>".number_format($activos[14][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje3 )." </td>
            <td class='text-end'>".number_format($activos[14][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Efectivo y otros activos líquidos </td>
            <td class='text-end'>".number_format($activos[15][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje4)." </td>
            <td class='text-end'>".number_format($activos[15][1], 2, '.', ',')." </td>
            </tr>

           
            <tr class='table-primary'>

            <td class='text-start'>Pasivo corriente operativo (PCO)</td>
            <td class='text-end'>".number_format($pco1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajePco)." </td>
            <td class='text-end'>".number_format($pco2, 2, '.', ',')." </td>
            </tr>
      

            <td class='text-start'>Pasivos vinculados con ANCMV</td>
            <td class='text-end'>".number_format($pasivos[20][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje5)." </td>
            <td class='text-end'>".number_format($pasivos[20][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Provisiones a corto plazo</td>
            <td class='text-end'>".number_format($pasivos[21][0], 2, '.', ',')." </td>
            <td  class='text-end'>".sprintf('%.2f',$porcentaje6 )." </td>
            <td  class='text-end'>".number_format($pasivos[21][1], 2, '.', ',')." </td>
            </tr>

            <tr >
          
            <td class='text-start'>Deudas con empresas del grupo y asociadas</td>
            <td class='text-end'>".number_format($pasivos[25][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje7)." </td>
            <td class='text-end'>".number_format($pasivos[25][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Acreedores comerciales y otras cuentas a pagar</td>
            <td class='text-end'>".number_format($acreedores1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajeAcreedores)." </td>
            <td class='text-end'>".number_format($acreedores2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Periodificaciones a corto plazo</td>
            <td class='text-end'>".number_format($pasivos[28][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentaje8 )." </td>
            <td class='text-end'>".number_format($pasivos[28][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>

            <td class='text-start'>Necesidades Operativas de Fondos (NOF)</td>
            <td class='text-end'>".number_format($nof1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajeNof)." </td>
            <td class='text-end'>".number_format($nof2, 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Fondo de Maniobra </td>
            <td class='text-end'>".number_format($fm1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajeFm)." </td>
            <td class='text-end'>".number_format($fm2, 2, '.', ',')." </td>
            </tr>

            
            </tr>

            <tr class='table-primary'>
            <td class='text-start'>Posición de liquidez (Nec.Financiación) FM-NOF </td>
            <td class='text-end'>".number_format($pl1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f',$porcentajePl)." </td>
            <td class='text-end'>".number_format($pl2, 2, '.', ',')." </td>
            </tr>

          
            </tbody>
            </table>";
            return $table;

    }
}
?>