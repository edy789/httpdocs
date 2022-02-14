<?php

class Comparaciones{
    protected $conex;
    
    public function __construct(){
        $this->conex = mysqli_connect("localhost:3306","loggin","Sencillo_66","loggin");
    }

    function getPatrimonio($idlibro,$idlibromenor){
        
        $sql1="select * from Pasivos where id_libro=".$idlibro;
        $sql2="select * from Pasivos where id_libro=".$idlibromenor;
        $result1=mysqli_query($this->conex,$sql1);
        $result2=mysqli_query($this->conex,$sql2);
        $arrayPasivos = Array();
        $obj1=$result1->fetch_object();
        $obj2=$result2->fetch_object();
        if (($obj1) && ($obj2)){
            
           //$arrayPasivos[] = array("0"=>$obj1->fondos_propios,"1"=>$obj2->fondos_propios);
            $arrayPasivos[] = array("0"=>$obj1->capital,"1"=>$obj2->capital);
            $arrayPasivos[] = array("0"=>$obj1->prima_emision,"1"=>$obj2->prima_emision);
            $arrayPasivos[] = array("0"=>$obj1->reservas,"1"=>$obj2->reservas);
            $arrayPasivos[] = array("0"=>$obj1->acciones_propias,"1"=>$obj2->acciones_propias);
            $arrayPasivos[] = array("0"=>$obj1->resultado_ejercicio_anteriores,"1"=>$obj2->resultado_ejercicio_anteriores);
            $arrayPasivos[] = array("0"=>$obj1->otras_aportaciones,"1"=>$obj2->otras_aportaciones);
            $arrayPasivos[] = array("0"=>$obj1->resultado_del_ejercicio,"1"=>$obj2->resultado_del_ejercicio);
            $arrayPasivos[] = array("0"=>$obj1->dividendo,"1"=>$obj2->dividendo);
            $arrayPasivos[] = array("0"=>$obj1->otros_instrumentos,"1"=>$obj2->otros_instrumentos);
            $arrayPasivos[] = array("0"=>$obj1->ajustes_por_cambios,"1"=>$obj2->ajustes_por_cambios);
            $arrayPasivos[] = array("0"=>$obj1->socios_externos,"1"=>$obj2->socios_externos);
            $arrayPasivos[] = array("0"=>$obj1->provisiones_lp,"1"=>$obj2->provisiones_lp);
            //$arrayPasivos[] = array("0"=>$obj1->deudas_lp,"1"=>$obj2->deudas_lp);
            $arrayPasivos[] = array("0"=>$obj1->deudas_entidades_noco,"1"=>$obj2->deudas_entidades_noco);
            $arrayPasivos[] = array("0"=>$obj1->acreedores_arrendamiento_noco,"1"=>$obj2->acreedores_arrendamiento_noco);
            $arrayPasivos[] = array("0"=>$obj1->otras_deudas_lp,"1"=>$obj2->otras_deudas_lp);
            $arrayPasivos[] = array("0"=>$obj1->deudas_empresas_noco,"1"=>$obj2->deudas_empresas_noco);
            $arrayPasivos[] = array("0"=>$obj1->pasivos_por_impuestos,"1"=>$obj2->pasivos_por_impuestos);
            $arrayPasivos[] = array("0"=>$obj1->periodificaciones_lp,"1"=>$obj2->periodificaciones_lp);
            $arrayPasivos[] = array("0"=>$obj1->acreedores_comerciales_noco,"1"=>$obj2->acreedores_comerciales_noco);
            $arrayPasivos[] = array("0"=>$obj1->deuda_caracteristicas_noco,"1"=>$obj2->deuda_caracteristicas_noco);
            $arrayPasivos[] = array("0"=>$obj1->pasivos_vinculados,"1"=>$obj2->pasivos_vinculados);
            $arrayPasivos[] = array("0"=>$obj1->provisiones_cp,"1"=>$obj2->provisiones_cp);
            //$arrayPasivos[] = array("0"=>$obj1->deudas_cp,"1"=>$obj2->deudas_cp);
            $arrayPasivos[] = array("0"=>$obj1->deudas_entidades_co,"1"=>$obj2->deudas_entidades_co);
            $arrayPasivos[] = array("0"=>$obj1->acreedores_arrendamiento_co,"1"=>$obj2->acreedores_arrendamiento_co);
            $arrayPasivos[] = array("0"=>$obj1->otras_deudas_cp,"1"=>$obj2->otras_deudas_cp);
            $arrayPasivos[] = array("0"=>$obj1->deudas_empresas_co,"1"=>$obj2->deudas_empresas_co);
            //$arrayPasivos[] = array("0"=>$obj1->acreedores_comerciales_co,"1"=>$obj2->acreedores_comerciales_co);
            $arrayPasivos[] = array("0"=>$obj1->proveedores,"1"=>$obj2->proveedores);
            $arrayPasivos[] = array("0"=>$obj1->otros_acreedores,"1"=>$obj2->otros_acreedores);
            $arrayPasivos[] = array("0"=>$obj1->periodificaciones_cp,"1"=>$obj2->periodificaciones_cp);
            $arrayPasivos[] = array("0"=>$obj1->deuda_caracteristicas_co,"1"=>$obj2->deuda_caracteristicas_co);

        }
        return $arrayPasivos;
    }

    function generarTablaPatrimonio($array){
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



       
        for($i=0;$i<count($array); $i++){
            if($i<=8){
                $fondosPropios1 +=$array[$i][0];
                $fondosPropios2 +=$array[$i][1];
            }
            if($i>=12 && $i<15){
                $deudasLargoPlazo1 +=$array[$i][0];
                $deudasLargoPlazo2 +=$array[$i][1];

            }
            if($i>=22 && $i<25){
                $deudasCortoPlazo1 +=$array[$i][0];
                $deudasCortoPlazo2 +=$array[$i][1];
            }
            if($i>=26 && $i<=27){
                $acreedores1 +=$array[$i][0];
                $acreedores2 +=$array[$i][1];
            }

        }
        $pasivoNoCorriente1=$array[11][0] +$deudasLargoPlazo1 + $array[15][0] + $array[16][0] +$array[17][0]+$array[18][0]+$array[19][0] ;
        $pasivoNoCorriente2=$array[11][1] +$deudasLargoPlazo2 + $array[15][1] + $array[16][1] +$array[17][1]+$array[18][1]+$array[19][0] ;

        $pasivoCorriente1=$array[20][0]  + $array[21][0] +$deudasCortoPlazo1 +$array[25][0] +$acreedores1 +  $array[28][0] +$array[29][0];
        $pasivoCorriente2=$array[20][1]  + $array[21][1] +$deudasCortoPlazo2 +$array[25][1] +$acreedores2 +  $array[28][1] +$array[29][1] ;

        $patrimonioNeto1 =$fondosPropios1 + $array[9][0]+ $array[10][0];
        $patrimonioNeto2 =$fondosPropios2 + $array[9][1]+ $array[10][1];
        
        $total1=$patrimonioNeto1+$pasivoNoCorriente1+$pasivoCorriente1;
        $total2=$patrimonioNeto2+$pasivoNoCorriente2+$pasivoCorriente2;
  
        $porcentajePasivoNo=(($pasivoNoCorriente1==0 && $pasivoNoCorriente2==0) || $pasivoNoCorriente2==0) ? 0 :((($pasivoNoCorriente1-$pasivoNoCorriente2)/$pasivoNoCorriente2)*100);

   
        $porcentajePasivo=(($pasivoCorriente1==0 && $pasivoCorriente2==0) || $pasivoCorriente2==0) ? 0 :((($pasivoCorriente1-$pasivoCorriente2)/$pasivoCorriente2)*100);

        $porcentajePatrimonio=(($patrimonioNeto1==0 && $patrimonioNeto2==0) || $patrimonioNeto2==0) ? 0 :((($patrimonioNeto1-$patrimonioNeto2)/$patrimonioNeto2)*100);

        $porcentajeDeudaCorto=(($deudasCortoPlazo1==0 && $deudasCortoPlazo1==0) || $deudasCortoPlazo2==0) ? 0 :((($deudasCortoPlazo1-$deudasCortoPlazo2)/$deudasCortoPlazo2)*100);

        $porcentajeDeuda=(($$deudasLargoPlazo1==0 && $deudasLargoPlazo2==0) || $deudasLargoPlazo2==0) ? 0 :((($deudasLargoPlazo1-$deudasLargoPlazo2)/$deudasLargoPlazo2)*100);

        $porcentajeAcreedores=(($acreedores1==0 && $acreedores==0) || $acreedores2==0) ? 0 :((($acreedores1-$acreedores2)/$acreedores2)*100);
       
        $porcentajeFondos =(($fondosPropios1==0 && $fondosPropios2==0) || $fondosPropios2==0) ? 0 :((($fondosPropios1 - $fondosPropios2)/ $fondosPropios2)*100);

        $porcentaje1=(($array[0][0]==0 && $array[0][1]==0) || $array[0][1]==0) ? 0 : ((($array[0][0]-$array[0][1])/$array[0][1])*100);
        $porcentaje2= (($array[1][0]==0 && $array[1][1]==0) || $array[1][1]==0) ? 0 :((($array[1][0]-$array[1][1])/$array[1][1])*100);
        $porcentaje3= (($array[2][0]==0 && $array[2][1]==0) || $array[2][1]==0) ? 0 :((($array[2][0]-$array[2][1])/$array[2][1])*100);
        $porcentaje4=(($array[3][0]==0 && $array[3][1]==0) || $array[3][1]==0) ? 0 :((($array[3][0]-$array[3][1])/$array[3][1])*100);
        $porcentaje5= (($array[4][0]==0 && $array[4][1]==0) || $array[4][1]==0) ? 0 :((($array[4][0]-$array[4][1])/$array[4][1])*100);
        $porcentaje6= (($array[5][0]==0 && $array[5][1]==0) || $array[5][1]==0) ? 0 :((($array[5][0]-$array[5][1])/$array[5][1])*100);
        $porcentaje7= (($array[6][0]==0 && $array[6][1]==0) || $array[6][1]==0) ? 0 :((($array[6][0]-$array[6][1])/$array[6][1])*100);
        $porcentaje8=(($array[7][0]==0 && $array[7][1]==0) || $array[7][1]==0) ? 0 :((($array[7][0]-$array[7][1])/$array[7][1])*100);
        $porcentaje9= (($array[8][0]==0 && $array[8][1]==0) || $array[8][1]==0) ? 0 :((($array[8][0]-$array[8][1])/$array[8][1])*100);
        $porcentaje10= (($array[9][0]==0 && $array[9][1]==0) || $array[9][1]==0) ? 0 :((($array[9][0]-$array[9][1])/$array[9][1])*100);
        $porcentaje11= (($array[10][0]==0 && $array[10][1]==0) || $array[10][1]==0) ? 0 :((($array[10][0]-$array[10][1])/$array[10][1])*100);
        $porcentaje12= (($array[11][0]==0 && $array[11][1]==0) || $array[11][1]==0) ? 0 :((($array[11][0]-$array[11][1])/$array[11][1])*100);
        $porcentaje13= (($array[12][0]==0 && $array[12][1]==0) || $array[12][1]==0) ? 0 :((($array[12][0]-$array[12][1])/$array[12][1])*100);
        $porcentaje14= (($array[13][0]==0 && $array[13][1]==0) || $array[13][1]==0) ? 0 :((($array[13][0]-$array[12][1])/$array[13][1])*100);
        $porcentaje15= (($array[14][0]==0 && $array[14][1]==0) || $array[14][1]==0) ? 0 :((($array[14][0]-$array[14][1])/$array[14][1])*100);
        $porcentaje16= (($array[15][0]==0 && $array[15][1]==0) || $array[15][1]==0) ? 0 :((($array[15][0]-$array[15][1])/$array[15][1])*100);
        $porcentaje17= (($array[16][0]==0 && $array[16][1]==0) || $array[16][1]==0) ? 0 :((($array[16][0]-$array[16][1])/$array[16][1])*100);
        $porcentaje18= (($array[17][0]==0 && $array[17][1]==0) || $array[17][1]==0) ? 0 :((($array[17][0]-$array[17][1])/$array[17][1])*100);
        $porcentaje19= (($array[18][0]==0 && $array[18][1]==0) || $array[18][1]==0) ? 0 :((($array[18][0]-$array[18][1])/$array[18][1])*100);
        $porcentaje20= (($array[19][0]==0 && $array[19][1]==0) || $array[19][1]==0) ? 0 :((($array[19][0]-$array[19][1])/$array[19][1])*100);
        $porcentaje21= (($array[20][0]==0 && $array[20][1]==0) || $array[20][1]==0) ? 0 :((($array[20][0]-$array[20][1])/$array[20][1])*100);
        $porcentaje22= (($array[21][0]==0 && $array[21][1]==0) || $array[21][1]==0) ? 0 :((($array[21][0]-$array[21][1])/$array[21][1])*100);
        $porcentaje23= (($array[22][0]==0 && $array[22][1]==0) || $array[22][1]==0) ? 0 :((($array[22][0]-$array[22][1])/$array[22][1])*100);
        $porcentaje24= (($array[23][0]==0 && $array[23][1]==0) || $array[23][1]==0) ? 0 :((($array[23][0]-$array[23][1])/$array[23][1])*100);
        $porcentaje25= (($array[24][0]==0 && $array[24][1]==0) || $array[24][1]==0) ? 0 :((($array[24][0]-$array[24][1])/$array[24][1])*100);
        $porcentaje26= (($array[25][0]==0 && $array[25][1]==0) || $array[25][1]==0) ? 0 :((($array[25][0]-$array[25][1])/$array[25][1])*100);
        $porcentaje27= (($array[26][0]==0 && $array[26][1]==0) || $array[26][1]==0) ? 0 :((($array[26][0]-$array[26][1])/$array[26][1])*100);
        $porcentaje28= (($array[27][0]==0 && $array[27][1]==0) || $array[27][1]==0) ? 0 :((($array[27][0]-$array[27][1])/$array[27][1])*100);
        $porcentaje29= (($array[28][0]==0 && $array[28][1]==0) || $array[28][1]==0) ? 0 :((($array[28][0]-$array[28][1])/$array[28][1])*100);
        $porcentaje30= (($array[29][0]==0 && $array[29][1]==0) || $array[29][1]==0) ? 0 :((($array[29][0]-$array[29][1])/$array[29][1])*100);

        $porcentajeTotal=(($atotal1==0 && $total2==0) || $total2==0) ? 0 :((($total1-$total2)/$total2)*100);
       
        
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

            <td class='text-start'>PATRIMONIO NETO</td>
            <td class='text-end'>".number_format($patrimonioNeto1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajePatrimonio)."  </td>
            <td class='text-end'>".number_format($patrimonioNeto2, 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Fondos propios</td>
            <td class='text-end'>".number_format($fondosPropios1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeFondos)."  </td>
            <td class='text-end'>".number_format($fondosPropios2, 2, '.', ',')." </td>

            </tr>

            <td class='text-start'>Capital</td>
            <td class='text-end'>".number_format($array[0][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje1)." </td>
            <td class='text-end'>".number_format($array[0][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Prima de emisión</td>
            <td class='text-end'>".number_format($array[1][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje2)."  </td>
            <td class='text-end'>".number_format($array[1][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Reservas</td>
            <td class='text-end'>".number_format($array[2][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje3)."  </td>
            <td class='text-end'>".number_format($array[2][1], 2, '.', ',')." </td>


            </tr>

           

            <tr>

            <td class='text-start'>Acciones propias</td>
            <td class='text-end'>".number_format($array[3][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje4)."  </td>
            <td class='text-end'>".number_format($array[3][1], 2, '.', ',')." </td>

            </tr>

            
            <tr>

            <td class='text-start'>Resultado de ejercicios anteriores</td>
            <td class='text-end'>".number_format($array[4][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje5)." </td>
            <td class='text-end'>".number_format($array[1][0], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Otras aportaciones de socios</td>
            <td class='text-end'>".number_format($array[5][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje6)."  </td>
            <td class='text-end'>".number_format($array[5][1], 2, '.', ',')." </td>

            </tr>

           <tr >

            <td class='text-start'>Resultado del ejercicio</td>
            <td class='text-end'>".number_format($array[6][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje7)."  </td>
            <td class='text-end'>".number_format($array[6][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Dividendo a cuenta</td>
            <td class='text-end'>".number_format($array[7][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje8)."  </td>
            <td class='text-end'>".number_format($array[7][1], 2, '.', ',')." </td>
            </tr>

            <tr>

            <td class='text-start'>Otros instrumentos de patrimonio neto</td>
            <td class='text-end'>".number_format($array[8][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje9)." </td>
            <td class='text-end'>".number_format($array[8][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Ajustes por cambios de valor</td>
            <td class='text-end'>".number_format($array[9][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje10)." </td>
            <td class='text-end'>".number_format($array[9][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Socios externos</td>
            <td class='text-end'>".number_format($array[10][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje11)." </td>
            <td class='text-end'>".number_format($array[10][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>
          
            <td class='text-start'>PASIVO NO CORRIENTE</td>
            <td class='text-end'>".number_format($pasivoNoCorriente1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajePasivoNo)."  </td>
            <td class='text-end'>".number_format($pasivoNoCorriente2, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Provisiones a largo plazo</td>
            <td class='text-end'>".number_format($array[11][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje12)."  </td>
            <td class='text-end'>".number_format($array[11][1], 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudas a largo plazo</td>
            <td class='text-end'>".number_format($deudasLargoPlazo1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeDeuda)."  </td>
            <td class='text-end'>".number_format($deudasLargoPlazo1, 2, '.', ',')." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudas con entidades de crédito</td>
            <td class='text-end'>".number_format($array[12][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje13)." </td>
            <td class='text-end'>".number_format($array[12][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Acreedores por arrendamiento financiero </td>
            <td class='text-end'>".number_format($array[13][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje14)." </td>
            <td class='text-end'>".number_format($array[13][1], 2, '.', ',')." </td>

            </tr>
            <tr>
            <td class='text-start'>Otras deudas a largo plazo </td>
            <td class='text-end'>".number_format($array[14][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje15)."  </td>
            <td class='text-end'>".number_format($array[14][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deudas con empresas del grupo y asoc </td>
            <td class='text-end'>".number_format($array[15][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje16)." </td>
            <td class='text-end'>".number_format($array[15][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Pasivos por impuesto diferido </td>
            <td class='text-end'>".number_format($array[16][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje17)." </td>
            <td class='text-end'>".number_format($array[16][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Periodificaciones a largo plazo </td>
            <td class='text-end'>".number_format($array[17][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje18)."  </td>
            <td class='text-end'>".number_format($array[17][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Acreedores comerciales no corrientes </td>
            <td class='text-end'>".number_format($array[18][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje19)." </td>
            <td class='text-end'>".number_format($array[18][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deuda con caracteristicas especiales </td>
            <td class='text-end'>".number_format($array[19][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje20)." </td>
            <td class='text-end'>".number_format($array[19][1], 2, '.', ',')." </td>

            </tr>

            <tr class='table-primary'>
            <td class='text-start'>PASIVO CORRIENTE </td>
            <td class='text-end'>".number_format($pasivoCorriente1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajePasivo)."  </td>
            <td class='text-end'>".number_format($pasivoCorriente2, 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Pasivos vinculados con ANCMV </td>
            <td class='text-end'>".number_format($array[20][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje21)."  </td>
            <td class='text-end'>".number_format($array[20][1], 2, '.', ',')." </td>

            </tr>


            <tr>
            <td class='text-start'>Provisiones a corto plazo </td>
            <td class='text-end'>".number_format($array[21][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje22)."  </td>
            <td class='text-end'>".number_format($array[21][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deudas a corto plazo</td>
            <td class='text-end'>".number_format($deudasCortoPlazo1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeDeudaCorto)."  </td>
            <td class='text-end'>".number_format($deudasCortoPlazo2, 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deudas con entidades de crédito </td>
            <td class='text-end'>".number_format($array[22][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje23)."  </td>
            <td class='text-end'>".number_format($array[22][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Acreedores por arrendamiento financiero </td>
            <td class='text-end'>".number_format($array[23][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje24)."  </td>
            <td class='text-end'>".number_format($array[23][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Otras deudas a corto plazo</td>
            <td class='text-end'>".number_format($array[24][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje25)." </td>
            <td class='text-end'>".number_format($array[24][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'>Deudas con empresas del grupo y asoc </td>
            <td class='text-end'>".number_format($array[25][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje26)."  </td>
            <td class='text-end'>".number_format($array[25][1], 2, '.', ',')." </td>

            </tr>



            <tr>
            <td class='text-start'>Acreedores comerciales y otras cuentas a pagar </td>
            <td class='text-end'>".number_format($$acreedores1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeAcreedores)."  </td>
            <td class='text-end'>".number_format($acreedores2, 2, '.', ',')." </td>

            </tr>


            <tr>
            <td class='text-start'>Proveedores </td>
            <td class='text-end'>".number_format($array[26][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje27)."  </td>
            <td class='text-end'>".number_format($array[26][1], 2, '.', ',')." </td>

            </tr>


            <tr>
            <td class='text-start'>Otros acreedores </td>
            <td class='text-end'>".number_format($array[27][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje28)."  </td>
            <td class='text-end'>".number_format($$array[27][1], 2, '.', ',')." </td>

            </tr>

            
            <tr>
            <td class='text-start'>Peridificaciones a corto plazo </td>
            <td class='text-end'>".number_format($array[28][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje29)." </td>
            <td class='text-end'>".number_format($array[28][1], 2, '.', ',')." </td>

            </tr>

            <tr>
            <td class='text-start'> Deuda con caracteristicas especiales </td>
            <td class='text-end'>".number_format($array[29][0], 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentaje30)." </td>
            <td class='text-end'>".number_format($array[29][1], 2, '.', ',')." </td>

            </tr>
        

            <tr class='table-primary text-start'>
            <td >TOTAL PATRIMONIO NETO Y PASIVO</td>
            <td class='text-end'>".number_format($total1, 2, '.', ',')." </td>
            <td class='text-end'>".sprintf('%.2f', $porcentajeTotal)." </td>
            <td class='text-end'>".number_format($total2, 2, '.', ',')." </td>

            </tr>
            </tbody>
            </table>";

            return $table;

    }
}
?>