<?php
require_once '../models/Mrequerimiento.php';
require_once '../models/Mdepartamento.php';
require_once '../models/Mmunicol.php';
require_once '../models/Musuario.php';
session_start();
//$toca=0;
	//muestra toda la data
		$data = Mrequerimiento::find_by_sql("SELECT id,cid,mdepartamentos_id,mmunicipios_id,fecha2,costo_total,completado		,
		case 
		when a_supeo='' then  'SIN OBSERVACION' 
		when a_supeo is null then  'SIN OBSERVACION'
		else a_supeo
		end ,a_supe
			FROM mrequerimientos WHERE status=1 order by id desc;");

	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {

		$data2=Mdepartamento::find_by_sql("SELECT nombre FROM mdepartamentos WHERE cdd =".$rs->mdepartamentos_id." AND status=1 order by id desc;");
		foreach ($data2 as &$rt) {

			$dep=$rt->nombre;

		}

		$data3=Mmunicol::find_by_sql("SELECT nombre FROM mmunicols WHERE cdd =".$rs->mmunicipios_id." AND status=1 order by id desc;");
		
		if($data3 != null){
			foreach ($data3 as &$rq) {

				$mun=$rq->nombre;

			}
		}else{
			
				$mun='No Asignado';
		}
	


		array_push($result,array(
						
		                           		 "id"=>$rs->id,		                           		 
		                           		 "departamento"=>$dep,
		                           		 "municipio"=>$mun,
		                           		 "fecha"=>$rs->fecha2->format("d-m-Y"),
										 "aprobado"=>$rs->completado,
										 "costo_total"=>$rs->costo_total,
										 "a_supe"=>$rs->a_supe,
										 "observacion"=>$rs->a_supeo
		                        		 

		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>