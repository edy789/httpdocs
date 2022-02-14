<?php
if(isset($_SESSION['id_usuario'])){
    header('Location:index.php'); 
}
class Comparaciones{
    protected $conex;
    
    public function __construct(){
        $this->conex = mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    }

    function getRatios($idlibro,$idlibromenor){

        
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

    function generarTablaRatios($array){
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
        $pasivoNoCorriente1=$pasivos[11][0] +$deudasLargoPlazo1 + $pasivos[15][0] + $pasivos[16][0] +$pasivos[17][0]+$pasivos[18][0]+$pasivos[19][0] ;
        $pasivoNoCorriente2=$pasivos[11][1] +$deudasLargoPlazo2 + $pasivos[15][1] + $pasivos[16][1] +$pasivos[17][1]+$pasivos[18][1]+$pasivos[19][0] ;

        $pasivoCorriente1=$pasivos[20][0]  + $pasivos[21][0] +$deudasCortoPlazo1 +$pasivos[25][0] +$acreedores1 +  $pasivos[28][0] +$pasivos[29][0];
        $pasivoCorriente2=$pasivos[20][1]  + $pasivos[21][1] +$deudasCortoPlazo2 +$pasivos[25][1] +$acreedores2 +  $pasivos[28][1] +$pasivos[29][1] ;

        $patrimonioNeto1 =$fondosPropios1 + $pasivos[9][0]+ $pasivos[10][0];
        $patrimonioNeto2 =$fondosPropios2 + $pasivos[9][1]+ $pasivos[10][1];
        
        $total1=$patrimonioNeto1+$pasivoNoCorriente1+$pasivoCorriente1;
        $total2=$patrimonioNeto2+$pasivoNoCorriente2+$pasivoCorriente2;

        $roe1= $fondosPropios1==0 ? 0 :($resultadoEjercicio1/$fondosPropios1)*100;
        $roe2= $fondosPropios2==0 ? 0 :($resultadoEjercicio2/$fondosPropios2)*100;
        $porcentajeroe= (($roe1==0 && $roe2==0) || $roe2==0) ? 0 : ((($roe1-$roe2)/$roe2)*100);


        //Ratios de liquidez
        $li1=$totalactivos1==0 ? 0 :((($activos[13][0]+$activos[15][0])/$totalactivos1)*100);
        $li2=$totalactivos2==0 ? 0 :((($activos[13][1]+$activos[15][1])/$totalactivos2)*100);
        $porcentajeli= (($li1==0 && $li2==0) || $li2==0) ? 0 : ((($li1-$li2)/$li2)*100);

        $lg1=$pasivoCorriente1==0 ? 0 :($activoCorriente1/$pasivoCorriente1);
        $lg2=$pasivoCorriente2==0 ? 0 :($activoCorriente2/$pasivoCorriente2);
        $porcentajelg= (($lg1==0 && $lg2==0) || $lg2==0) ? 0 : ((($lg1-$lg2)/$lg2)*100);

        $ta1=$pasivoCorriente1==0 ? 0 :(($activos[9][0]+$activos[10][0]+$activos[11][0])+$activos[12][0]+$activos[13][0]+$activos[15][0])/$pasivoCorriente1;
        $ta2=$pasivoCorriente2==0 ? 0 :(($activos[9][1]+$activos[10][1]+$activos[11][1])+$activos[12][1]+$activos[13][1]+$activos[15][1])/$pasivoCorriente2;
        $porcentajeta= (($ta1==0 && $ta2==0) || $ta2==0) ? 0 : ((($ta1-$ta2)/$ta2)*100);
        

        $fm1= ($activoCorriente1 - $pasivoCorriente1);
        $fm2 = ($activoCorriente2 - $pasivoCorriente2);
        $porcentajefm= (($fm1==0 && $fm2==0) || $fm2==0) ? 0 : ((($fm1-$fm2)/$fm2)*100);

    $cc1=$perdidas[0][0]==0 ? 0 :($activos[6][0] + $activos[8][0] + $activos[9][0]-($pasivos[18][0]+$pasivos[26][0]))/$perdidas[0][0]*100;
    $cc2=$perdidas[0][1]==0 ? 0 :(($activos[6][1] + $activos[8][1] + $activos[9][1]-($pasivos[18][0] + $pasivos[26][1]))/$perdidas[0][1])*100;
    $porcentajecc= (($cc1==0 && $cc2==0) || $cc2==0) ? 0 : ((($cc1-$cc2)/$cc2)*100);

    $dc1=$perdidas[0][0]==0 ? 0 :(($activos[6][0] + $activos[9][0])/$perdidas[0][0])*100;
    $dc2=$perdidas[0][1]==0 ? 0 :(($activos[6][1] + $activos[9][1])/$perdidas[0][1])*100;
    $porcentajedc= (($dc1==0 && $dc2==0) || $dc2==0) ? 0 : ((($dc1-$dc2)/$dc2)*100);


    $ex1=$perdidas[0][0]==0 ? 0 :(($activos[8][0]/$perdidas[0][0])*100);
    $ex2=$perdidas[0][1]==0 ? 0 :(($activos[8][1]/$perdidas[0][1])*100);
    $porcentajeex= (($ex1==0 && $ex2==0) || $ex2==0) ? 0 : ((($ex1-$ex2)/$ex2)*100);


    //Ratios de endeudamiento

    $eb1=$total1==0 ? 0 :(($pasivos[12][0] + $pasivos[13][0]+ $pasivos[22][0]+$pasivos[23][0])/$total1)*100;
    $eb2=$total2==0 ? 0 :(($pasivos[12][1] + $pasivos[13][1]+ $pasivos[22][1]+$pasivos[23][1])/$total2)*100;
    $porcentajeeb= (($eb1==0 && $eb2==0) || $eb2==0) ? 0 : ((($eb1-$eb2)/$eb2)*100);


    $ebl1=$total1==0 ? 0 :((($pasivos[12][0] + $pasivos[13][0])/$total1)*100);
    $ebl2=$total2==0 ? 0 :((($pasivos[12][1] + $pasivos[13][1])/$total2)*100);
    $porcentajeebl= (($ebl1==0 && $ebl2==0) || $ebl2==0) ? 0 : ((($ebl1-$ebl2)/$ebl2)*100);


    $ebc1=$total1==0 ? 0 :((($pasivos[22][0] + $pasivos[23][0])/$total1)*100);
    $ebc2=$total2==0 ? 0 :((($pasivos[22][1] + $pasivos[23][1])/$total2)*100);
    $porcentajeebc= (($ebc1==0 && $ebc2==0) || $ebc2==0) ? 0 : ((($ebc1-$ebc2)/$ebc2)*100);


    $e1=$total1==0 ? 0 :((($pasivoCorriente1 + $pasivoNoCorriente1)/$total1)*100);
    $e2=$total2==0 ? 0 :((($pasivoCorriente2 + $pasivoNoCorriente2)/$total2)*100);
    $porcentajee= (($e1==0 && $e2==0) || $e2==0) ? 0 : ((($e1-$e2)/$e2)*100);


    $el1=$total1==0 ? 0 :(($pasivoNoCorriente1/$total1)*100);
    $el2=$total2==0 ? 0 :(($pasivoNoCorriente2 / $total2)*100);
    $porcentajeel= (($el1==0 && $el2==0) || $el2==0) ? 0 : ((($el1-$el2)/$el2)*100);

    $ec1=$total1==0 ? 0 :(($pasivoCorriente1/$total1)*100);
    $ec2=$total2==0 ? 0 :(($pasivoCorriente2 / $total2)*100);
    $porcentajeec= (($ec1==0 && $ec2==0) || $ec2==0) ? 0 : ((($ec1-$ec2)/$ec2)*100);


    $ac1=$perdidas[0][0]==0 ? 0 :(($pasivos[26][0]/$perdidas[0][0])*100);
    $ac2=$perdidas[0][1]==0 ? 0 :(($pasivos[26][1] / $perdidas[0][1])*100);
    $porcentajeac= (($ac1==0 && $ac2==0) || $ac2==0) ? 0 : ((($ac1-$ac2)/$ac2)*100);


    $a1=$resultadoExplotacion1==0 || $fondosPropios1==0 ? 0 :($totalAntesImpuestos1/$resultadoExplotacion1)*($totalactivos1/$fondosPropios1);
    $a2=$resultadoExplotacion2==0 || $fondosPropios2==0 ? 0 :($totalAntesImpuestos2/$resultadoExplotacion2)*($totalactivos2/$fondosPropios2);
    $porcentajea= (($a1==0 && $a2==0) || $a2==0) ? 0 : ((($a1-$a2)/$a2)*100);

    //Ratios de solvencia

    $s1=$total1==0 ? 0 :(($fondosPropios1/$total1)*100);
    $s2=$total2==0 ? 0 :(($fondosPropios2/$total2)*100);
    $porcentajes= (($s1==0 && $s2==0) || $s2==0) ? 0 : ((($s1-$s2)/$s2)*100);

    $g1=($pasivoCorriente1 + $pasivoNoCorriente1)==0 ? 0 :($totalactivos1/($pasivoCorriente1 + $pasivoNoCorriente1));
    $g2=($pasivoCorriente2 + $pasivoNoCorriente2)==0 ? 0 :($totalactivos2/($pasivoCorriente2 + $pasivoNoCorriente2));
    $porcentajeg= (($g1==0 && $g2==0) || $g2==0) ? 0 : ((($g1-$g2)/$g2)*100);


    $cri1=($perdidas[0][0] + $perdidas[1][0]+ $perdidas[2][0] +$perdidas[3][0] +$perdidas[4][0]+ $perdidas[5][0] +$perdidas[6][0])==0 ? 0 :(($perdidas[14][0])*-1 /($perdidas[0][0] + $perdidas[1][0]+ $perdidas[2][0] +$perdidas[3][0] +$perdidas[4][0]+ $perdidas[5][0] +$perdidas[6][0])*100);
    $cri2=($perdidas[0][1] + $perdidas[1][1]+ $perdidas[2][1] +$perdidas[3][1] +$perdidas[4][1]+ $perdidas[5][1] +$perdidas[6][1] )==0 ? 0 :(($perdidas[14][1])*-1 /($perdidas[0][1] + $perdidas[1][1]+ $perdidas[2][1] +$perdidas[3][1] +$perdidas[4][1]+ $perdidas[5][1] +$perdidas[6][1])*100);
    $porcentajecri= (($cri1==0 && $cri2==0) || $cri2==0) ? 0 : ((($cri1-$cri2)/$cri2)*100);

    $ci1=$perdidas[14][0]==0 ? 0 :(($perdidas[0][0] + $perdidas[1][0]+ $perdidas[2][0]+ $perdidas[3][0] +$perdidas[4][0]+ $perdidas[5][0] +$perdidas[6][0] +$perdidas[8][0]+$perdidas[9][0]+$perdidas[11][0]+$perdidas[12][0])/$perdidas[14][0]*-1);
    $ci2=$perdidas[14][1]==0 ? 0 :(($perdidas[0][1] + $perdidas[1][1]+ $perdidas[2][1]+ $perdidas[3][1] +$perdidas[4][1]+ $perdidas[5][1] +$perdidas[6][1] +$perdidas[8][1]+$perdidas[9][1]+$perdidas[11][1]+$perdidas[12][1])/$perdidas[14][1]*-1);
    $porcentajci= (($ci1==0 && $ci2==0) || $ci2==0) ? 0 : ((($ci1-$ci2)/$ci2)*100);

    $ebi1=$resultadoExplotacion1 - $perdidas[7][0] ;
    $ebi2=$resultadoExplotacion2 - $perdidas[7][1] ;

    
    $oib1= (($resultadoExplotacion1-($perdidas[12][0]-$perdidas[11][0])-($perdidas[7][0] + $perdidas[10][0]))) ;
    $oib2= $perdidas[12][1]-$perdidas[11][1] - $perdidas[10][1] - $perdidas[7][1] ;

        $table="<table class='table table-sm'>
                
                 <thead>   
            <tr class='table-dark'>
                <th>CÁLCULO DE RATIOS </th>
                <th>Año actual</th>
                <th> %</th>
                <th>Año -1</th>

            </tr>
            </thead>
            <tbody>
            <tr class='table-primary'>

            <td class='text-start'>Ratios de actividad</td>
            <td> </td>
            <td> </td>
            <td></td>
    
            </tr>

            <tr>

            <td class='text-start'>Tasa de variación de la cifra neta de negocio(T1)</td>
            <td class='text-end'>".number_format($tv, 2, '.', ',')." </td>
            <td></td>
            <td></td>
            
           

            </tr>

            <td class='text-start'>Período de cobro</td>
            <td class='text-end'>".number_format($pmc1, 2, '.', ',')." </td>
            <td></td>
            
            <td class='text-end'>".number_format($pmc2, 2, '.', ',')." </td>
            
          

            </tr>

            <tr>

            <td class='text-start'>Período de pago</td>
            <td class='text-end'>".number_format($pmp1, 2, '.', ',')." </td>
            <td></td>
            <td class='text-end'>".number_format($pmp2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Gastos de personal</td>
            <td class='text-end'>".number_format($gp1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajegp)." </td>
            <td class='text-end'>".number_format($gp2, 2, '.', ',')." </td>


            </tr>

           

            <tr class='table-primary'>

            <td class='text-start'>Ratios de rentabilidad</td>
            <td></td>
            <td></td>
            <td></td>


            </tr>

            
            <tr>

            <td class='text-start'>Margen bruto (R03)</td>
            <td class='text-end'>".number_format($mb1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajemb)." </td>
            <td class='text-end'>".number_format($mb2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Margen operativo (R05)</td>
            <td class='text-end'>".number_format($mo1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajemo)." </td>
            <td class='text-end'>".number_format($mo2, 2, '.', ',')." </td>

            </tr>

           <tr>

            <td class='text-start'>ROA, rendimiento del activo (R10)</td>
            <td class='text-end'>".number_format($roa1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeroa)." </td>
            <td class='text-end'>".number_format($roa2, 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>ROE, rendimiento de los fondos propios (R12)</td>
            <td class='text-end'>".number_format($roe1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeroe)." </td>
            <td class='text-end'>".number_format($roe2, 2, '.', ',')." </td>
            </tr>

            <tr class='table-primary'>

            <td class='text-start'>Ratios de liquidez</td>
            <td></td>
            <td></td>
            <td></td>

            </tr>

            <tr>

            <td class='text-start'>Liquidez (R21)</td>
            <td class='text-end'>".number_format($li1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeli)." </td>
            <td class='text-end'>".number_format($li2, 2, '.', ',')." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Liquidez general</td>
            <td class='text-end'>".number_format($lg1, 2, '.', ',')." </td>
            <td  class='text-end'>".sprintf('%.2f', $porcentajelg)." </td>
            <td  class='text-end'>".number_format($lg2, 2, '.', ',')." </td>
            </tr>

            <tr >
          
            <td class='text-start'>Test ácido</td>
            <td class='text-end'>".number_format($ta1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeta)." </td>
            <td class='text-end'>".number_format($ta2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Fondo de maniobr</td>
            <td class='text-end'>".number_format($fm1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajefm)." </td>
            <td class='text-end'>".number_format($fm2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Capital circulante (R20</td>
            <td class='text-end'>".number_format($cc1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajecc)." </td>
            <td class='text-end'>".number_format($cc2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudores comerciales sobre ventas</td>
            <td class='text-end'>".number_format($dc1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajedc)." </td>
            <td class='text-end'>".number_format($dc2, 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Existencias sobre ventas (R17)  </td>
            <td class='text-end'>".number_format($ex1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeex)." </td>
            <td class='text-end'>".number_format($ex2, 2, '.', ',')." </td>
            </tr>

            <tr class='table-primary'>
            <td class='text-start'>Ratios de endeudamiento </td>
            <td></td>
            <td></td>
            <td></td>


            </tr>

            <tr>
            <td class='text-start'>Endeudamiento bancario(R24) </td>
            <td class='text-end'>".number_format($eb1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeeb)." </td>
            <td class='text-end'>".number_format($eb2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Endeudamiento bancario a largo plazo(R25)</td>
            <td class='text-end'>".number_format($ebl1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeebl)." </td>
            <td class='text-end'>".number_format($ebl2, 2, '.', ',')." </td>
            </tr>

            <tr >
            <td class='text-start'>Endeudamiento bancario a corto plazo</td>
            <td class='text-end'>".number_format($ebc1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeebc)." </td>
            <td class='text-end'>".number_format($ebc2, 2, '.', ',')." </td>
            </tr>

             <tr>
            <td class='text-start'>Endeudamiento (R27 + R28) </td>
            <td class='text-end'>".number_format($e1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajee)." </td>
            <td class='text-end'>".number_format($e2, 2, '.', ',')." </td>

            </tr>

            <tr >
            <td class='text-start'> Endeudamiento a largo plazo (R27)</td>
            <td class='text-end'>".number_format($el1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeel)." </td>
            <td class='text-end'>".number_format($el2, 2, '.', ',')." </td>

            <tr >
            <td class='text-start'> Endeudamiento a corto plazo (R28)</td>
            <td class='text-end'>".number_format($ec1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeec)." </td>
            <td class='text-end'>".number_format($ec2, 2, '.', ',')." </td>

            <tr >
            <td class='text-start'>Acreedores comerciales sobre ventas (R19)</td>
            <td class='text-end'>".number_format($ac1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeac)." </td>
            <td class='text-end'>".number_format($ac2, 2, '.', ',')." </td>

            
            <tr>
            <td class='text-start'> Apalancamiento financiero</td>
            <td class='text-end'>".number_format($a1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajea)." </td>
            <td class='text-end'>".number_format($a2, 2, '.', ',')." </td>

            <tr class='table-primary'>
            <td class='text-start'> Ratios de solvencia</td>
            <td></td>
            <td></td>
            <td></td>

            <tr>
            <td class='text-start'> Solvencia (R22)</td>
            <td class='text-end'>".number_format($s1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajes)." </td>
            <td class='text-end'>".number_format($s2, 2, '.', ',')." </td>

            <tr>
            <td class='text-start'> Garantía o distancia a la quiebra</td>
            <td class='text-end'>".number_format($g1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeg)." </td>
            <td class='text-end'>".number_format($g2, 2, '.', ',')." </td>


            <tr>
            <td class='text-start'> Capacidad de reembolso de intereses (R22)</td>
            <td class='text-end'>".number_format($cri1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajecri)." </td>
            <td class='text-end'>".number_format($cri2, 2, '.', ',')." </td>

            <tr>
            <td class='text-start'> Cobertura de intereses</td>
            <td class='text-end'>".number_format($ci1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeci)." </td>
            <td class='text-end'>".number_format($ci2, 2, '.', ',')." </td>


            
            <tr class='table-primary'>
            <td class='text-start'>EBITDA </td>
            <td class='text-end'>".number_format($ebi1, 2, '.', ',')." </td>
            <td class='text-end'>  </td>
            <td class='text-end'>".number_format($ebi2, 2, '.', ',')." </td>

          

            <tr class='table-primary'>
            <td class='text-start'>OIBDA </td> 
            <td class='text-end'>".number_format($oib1, 2, '.', ',')." </td>
            <td class='text-end'> </td>
            <td class='text-end'>".number_format($oib2, 2, '.', ',')." </td>

        
          

        
            </tr>
            </tbody>
            </table>";
            return $table;

    }
}
?>