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


        $bd = new baseClases();

        $sql = "SELECT  * from msolicitudes where  status=1 order by id asc";
        $arrp = $bd->select($sql);

$total_reg=count($arrp);
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
$encabezado = ["No. Requerimiento", "Nombre del Evento", "Modalidad del Evento", "Actividad Plan de Acción", "Fecha Solicitud", "Fecha de Inicio",  "Fecha Finalización", "Responsable del Evento","Subdirección o Grupo DGI","Nombre de la Actividad","Nro de Victimas","Nro de Funcionarios","Nro de Participantes","   ","Detalles Especificos del Requerimiento"];
# El último argumento es por defecto A1 pero lo pongo para que se explique mejor
$hojaDeProductos->fromArray($encabezado, null, 'A1');


# Comenzamos en la 2 porque la 1 es del encabezado
$numeroDeFila = 2;
foreach($arrp as $data){
    # Obtener los datos de la base de datos
    $id_sol = $data['id'];
  $grupo=$data['grup_financ_id'];
    $sql_grupo = "SELECT  nombre from grupos where  id='.$grupo.' and status=1";
    $arrp_grupo = $bd->select($sql_grupo);
    $subdireccion = $arrp_grupo[0]['nombre'];

    $sql_detalles = "   select count(d_cantidad) as cantidad,d_concepto as concepto
		    from mdetalles
			WHERE 
			mrequerimientos_id=".$id_sol."
							  
			and status=1 
			 GROUP BY d_concepto order by d_concepto; ";
   $arrp_detalles = $bd->select($sql_detalles);


$total_reg_det=count($arrp_detalles);
$total_reg=count($arrp);




    $fecha_ini=  substr($data['fecha2'], 0, 10);
    $fecha_fin=  substr($data['fecha3'], 0, 10);
    $fecha_sol=  substr($data['fecha1'], 0, 10);

    // $fecha_ini=  substr($data['fecha_inicio'], 0, 10);

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


    $id_sol = $data['id'];
    $nombre_evento = $data['nombre'];


      $modalidad_evento=$data['modalidad_evento'];
    
      if ($modalidad_evento<2){
        $modalidad='Presencial';
      
      }else{
        $modalidad='Virtual';  
      }
    
      $plan_accion=$data['plan_accion'];  
    
    
      if ($plan_accion==1){
        $modalidad_plan_accion='Plan de acción 2021';
      
      }else if ($plan_accion==2){
        $modalidad_plan_accion='Plan de trabajo DGI 2021';
      }else if ($plan_accion==3){
        $modalidad_plan_accion='Plan de Trabajo Mesa Nacional';
      
      }




    $fecha_solicitud = $fecha_sol;

    $actividad = $data['descripcion'];

    $responsable = $data['rn_nombre1'].' '.$data['rn_apellido1'];
    $fecha_inicio = $fecha_ini;

    $fecha_fin = $fecha_fin;
    $municipio = $data['municipio'];
    $victimas = $data['num_vic'];
    $funcionarios = $data['entidad'];
    $total =$victimas+$funcionarios;
    

    # Escribirlos en el documento
    $hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $id_sol);
    $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $nombre_evento);
    $hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $modalidad);
    $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $modalidad_plan_accion);
    $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $fecha_solicitud);
    $hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, $fecha_inicio);
    $hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, $fecha_fin);
    $hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, $responsable);
    $hojaDeProductos->setCellValueByColumnAndRow(9, $numeroDeFila, $subdireccion);
    $hojaDeProductos->setCellValueByColumnAndRow(10, $numeroDeFila, $actividad );
    $hojaDeProductos->setCellValueByColumnAndRow(11, $numeroDeFila, $victimas);
    $hojaDeProductos->setCellValueByColumnAndRow(12, $numeroDeFila, $funcionarios);
    $hojaDeProductos->setCellValueByColumnAndRow(13, $numeroDeFila, $total);
    $i = 1;

  foreach($arrp_detalles as $data_detalles){

  $hojaDeProductos->setCellValueByColumnAndRow(14+$i, $numeroDeFila, $data_detalles['cantidad'].'--'.$data_detalles['concepto']);
  $i++;                    

}

$numeroDeFila++;


    



}

$nombreDelDocumento = "Reporte General de Solicitudes.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
if($total_reg>0){
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
}else{

    print '<script language="JavaScript">';
    print 'alert("NO HAY REGISTROS FACTURADOS PARA ESE MES");';
    print '</script>';
    print '<script languaje="javascript" type="text/javascript">window.close();</script>';

}
