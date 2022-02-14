<?php
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
        $total1=$activoNoCorriente1+$activoCorriente1;
        $total2=$activoNoCorriente2+$activoCorriente2;
        
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
            <td>".$activoNoCorriente1." </td>
            <td>".((($activoNoCorriente1-$activoNoCorriente2)/$activoNoCorriente2)*100)." % </td>
            <td>".$activoNoCorriente2." </td>
            </tr>

            <tr>

            <td class='text-start'>Inmovilizado intangible</td>
            <td>".$array[0][0]." </td>
            <td>".((($array[0][0]-$array[0][1])/$array[0][1])*100)." % </td>
            <td>".$array[0][1]." </td>

            </tr>

            <td class='text-start'>Inmovilizado material</td>
            <td>".$array[1][0]." </td>
            <td>".((($array[1][0]-$array[1][1])/$array[1][1])*100)." %</td>
            <td>".$array[1][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Inversiones inmobiliarias</td>
            <td>".$array[2][0]." </td>
            <td>".((($array[2][0]-$array[2][1])/$array[2][1])*100)." % </td>
            <td>".$array[2][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Inmovilizado Inversiones en empresas del grupo y asoc</td>
            <td>".$array[3][0]." </td>
            <td>".((($array[3][0]-$array[3][1])/$array[3][1])*100)." % </td>
            <td>".$array[3][1]." </td>


            </tr>

           

            <tr>

            <td class='text-start'>Inversiones financieras a largo plazo</td>
            <td>".$array[4][0]." </td>
            <td>".((($array[4][0]-$array[4][1])/$array[4][1])*100)." % </td>
            <td>".$array[4][1]." </td>

            </tr>

            
            <tr>

            <td class='text-start'>Acttivos por impuesto diferido</td>
            <td>".$array[5][0]." </td>
            <td>".((($array[5][0]-$array[5][1])/$array[5][1])*100)." %</td>
            <td>".$array[5][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudores commerciales no corrientes</td>
            <td>".$array[6][0]." </td>
            <td>".((($array[6][0]-$array[6][1])/$array[6][1])*100)." % </td>
            <td>".$array[6][1]." </td>

            </tr>

           <tr class='table-primary'>

            <td class='text-start'>ACTIVO CORRIENTE</td>
            <td>".$activoCorriente1." </td>
            <td>".(($activoCorriente1+$activoCorriente2)/2)." % </td>
            <td>".$activoCorriente2." </td>
            </tr>

            <tr>

            <td class='text-start'>Activos no corrientes mantenidos para la venta</td>
            <td>".$array[7][0]." </td>
            <td>".((($array[7][0]-$array[7][1])/$array[7][1])*100)." % </td>
            <td>".$array[7][1]." </td>
            </tr>

            <tr>

            <td class='text-start'>Existencias</td>
            <td>".$array[8][0]." </td>
            <td>".((($array[8][0]-$array[8][1])/$array[8][1])*100)." %</td>
            <td>".$array[8][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Deudores comerciales y otras c. a cobrar</td>
            <td>".$array[9][0]." </td>
            <td>".((($array[9][0]-$array[9][1])/$array[9][1])*100)." %</td>
            <td>".$array[9][1]." </td>

            </tr>

            <tr>
            
            <td class='text-start'>Clientes por ventas y prestaciones de servicios</td>
            <td>".$array[10][0]." </td>
            <td>".((($array[10][0]-$array[10][1])/$array[10][1])*100)." % </td>
            <td>".$array[10][1]." </td>

            </tr>

            <tr>
          
            <td class='text-start'>Accionistas por desembolsos exigidos</td>
            <td>".$array[11][0]." </td>
            <td>".((($array[11][0]-$array[11][1])/$array[11][1])*100)." % </td>
            <td>".$array[11][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Otros deudores</td>
            <td>".$array[12][0]." </td>
            <td>".((($array[12][0]-$array[12][1])/$array[12][1])*100)." % </td>
            <td>".$array[12][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Inversiones en empresas del grupo y asoc</td>
            <td>".$array[13][0]." </td>
            <td>".((($array[13][0]-$array[13][1])/$array[13][1])*100)." % </td>
            <td>".$array[13][1]." </td>

            </tr>

            <tr>

            <td class='text-start'>Periodificaciones</td>
            <td>".$array[14][0]." </td>
            <td>".((($array[14][0]-$array[14][1])/$array[14][1])*100)." % </td>
            <td>".$array[14][1]." </td>

            </tr>

            <tr>
            <td class='text-start'>Efectivo y otros activos liquidos equiv </td>
            <td>".$array[15][0]." </td>
            <td>".((($array[15][0]-$array[15][1])/$array[15][1])*100)." % </td>
            <td>".$array[15][1]." </td>

            </tr>

            <tr>
            <td class='table-primary text-start'>Total</td>
            <td>".$total1." </td>
            <td>".((($total1-$total2)/$total2)*100)." %</td>
            <td>".$total2." </td>

            </tr>
            </tbody>
            </table>";
            return $table;

    }
}
?>