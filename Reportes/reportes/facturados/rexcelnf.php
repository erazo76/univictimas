<?php
//  ValidaSession("../../../login");


/**
 * Ejemplo de cómo usar PDO y PHPSpreadSheet para
 * exportar datos de MySQL a Excel de manera
 * fácil, rápida y segura
 *
 * @author parzibyte
 * @see https://parzibyte.me/blog/2019/02/14/leer-archivo-excel-php-phpspreadsheet/
 * @see https://parzibyte.me/blog/2018/02/12/mysql-php-pdo-crud/
 * @see https://parzibyte.me/blog/2019/02/16/php-pdo-parte-2-iterar-cursor-comprobar-si-elemento-existe/
 * @see https://parzibyte.me/blog/2018/11/08/crear-archivo-excel-php-phpspreadsheet/
 * @see https://parzibyte.me/blog/2018/10/11/sintaxis-corta-array-php/
 *
 */
require_once "../../../vendor/autoload.php";
require_once("../../lib/bd/basedatosAdoIbase.php");


# Nuestra base de datos
//require_once 'models/Vfacturado.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;

$fecha_desde = ($_GET["fecha_inicio"]);
$fecha_final = ($_GET["fecha_final"]);


if (($fecha_desde!='') && ($fecha_final!='')){

    $cadena_fecha=" and fecha_solicitud

    BETWEEN CAST ('$fecha_desde' AS DATE) AND CAST ('$fecha_final' AS DATE) ";
}else{
    $cadena_fecha="";
}
# Obtener base de datos

        $bd = new baseClases();

        $sql = "SELECT  * from vfactura_ejecucion WHERE facturado=FALSE $cadena_fecha ;  ";
        $arrp = $bd->select($sql);

// print_r($sql);exit;
$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("Ing. Yonny Ramírez")
    ->setLastModifiedBy('Ing. Yonny Ramírez')
    ->setTitle('Archivo exportado desde Postgres')
    ->setDescription('Un archivo de Excel exportado desde Postgres por parzibyte');



# Como ya hay una hoja por defecto, la obtenemos, no la creamos
$hojaDeProductos = $documento->getActiveSheet();
$hojaDeProductos->setTitle("UNIVICTIMAS");

# Escribir encabezado de los productos
$encabezado = ["No. Requerimiento", "Fecha Solicitud", "Fecha facturación", "Actividad", "Subdirección o Grupo DGI", "Responsable", "Fecha Inicio", "Fecha Terminacion", "Departamento", "Municipio", "Victimas", "Funcionarios", "Total"];
# El último argumento es por defecto A1 pero lo pongo para que se explique mejor
$hojaDeProductos->fromArray($encabezado, null, 'A1');


# Comenzamos en la 2 porque la 1 es del encabezado
$numeroDeFila = 2;
foreach($arrp as $data){
    # Obtener los datos de la base de datos

    $fecha_ini=  substr($data['fecha_inicio'], 0, 10);
    $fecha_fin=  substr($data['fecha_fin'], 0, 10);
    $fecha_sol=  substr($data['fecha_solicitud'], 0, 10);

    $fecha_ini=  substr($data['fecha_inicio'], 0, 10);

    $partes = explode("-", $fecha_ini);
    $aa= $partes[0];
    $mes= $partes[1];
    $dd=$partes[2];
    $fecha_ini=$dd.'-'.$mes.'-'.$aa;
    
    $partes_2 = explode("-", $fecha_fin);
    $aa2= $partes_2[0];
    $mes2= $partes_2[1];
    $dd2=$partes_2[2];
    $fecha_fin=$dd2.'-'.$mes2.'-'.$aa2;

    $partes_3 = explode("-", $fecha_sol);
    $aa3= $partes_3[0];
    $mes3= $partes_3[1];
    $dd3=$partes_3[2];
    $fecha_sol=$dd3.'-'.$mes3.'-'.$aa3;


    $fecha_fac=  substr($data['fecha_factura'], 0, 10);

    $partes_4 = explode("-", $fecha_fac);
    $mes4= $partes_4[1];
    
    switch ($mes4) {

        case 1:

        $mes='Enero';

        break;
        case 2:

            $mes='Febrero';
    
            break;
            case 3:

                $mes='Marzo';
        
                break;
                case 4:

                    $mes='Abril';
            
                    break;
                    case 5:

                        $mes='Mayo';
                
                        break;
                        case 6:

                            $mes='Junio';
                    
                            break;
                            case 7:

                                $mes='Julio';
                        
                                break;
                                case 8:

                                    $mes='Agosto';
                            
                                    break;
                                    case 9:

                                        $mes='Septiembre';
                                
                                        break;
                                        case 10:

                                            $mes='Octubre';
                                    
                                            break;
                                            case 11:

                                                $mes='Noviembre';
                                        
                                                break;
                                                case 12:

                                                    $mes='Diciembre';
                                            
                                                    break;


 }




    $fecha_sol=$dd3.'-'.$mes3.'-'.$aa3;

    $id_sol = $data['id_sol'];
    $fecha_solicitud = $fecha_sol;
    $mes_factura = $mes;
    $actividad = $data['descripcion'];
    $subdireccion = $data['grupo'];
    $responsable = $data['nombre_responsable'].' '.$data['apellido_responsable'];
    $fecha_inicio = $fecha_ini;

    $fecha_fin = $fecha_fin;
    $departamento = $data['departamento'];
    $municipio = $data['municipio'];
    $victimas = $data['victimas'];
    $funcionarios = $data['funcionarios'];
    $total =$victimas+$funcionarios;
    
   

    # Escribirlos en el documento
    $hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $id_sol);
    $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $fecha_solicitud);
    $hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $mes_factura);
    $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $actividad);
    $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $subdireccion);
    $hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, $responsable);
    $hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, $fecha_inicio);
    $hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, $fecha_fin);
    $hojaDeProductos->setCellValueByColumnAndRow(9, $numeroDeFila, $departamento);
    $hojaDeProductos->setCellValueByColumnAndRow(10, $numeroDeFila, $municipio);
    $hojaDeProductos->setCellValueByColumnAndRow(11, $numeroDeFila, $victimas);
    $hojaDeProductos->setCellValueByColumnAndRow(12, $numeroDeFila, $funcionarios);
    $hojaDeProductos->setCellValueByColumnAndRow(13, $numeroDeFila, $total);
   



    $numeroDeFila++;
}

$nombreDelDocumento = "Ejecucion_Eventos.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
