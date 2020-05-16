<?php
require_once '../models/Mrequerimiento.php';
require_once '../models/Mdepartamento.php';
require_once '../models/Mmunicol.php';
session_start();
//$toca=0;
	//muestra toda la data
		$data = Mrequerimiento::find_by_sql("SELECT id,cid,nombre,mdepartamentos_id,mmunicipios_id,fecha2,rt_nombre1,rt_apellido1 FROM mrequerimientos WHERE status=1 order by id desc;");

	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {

		$data2=Mdepartamento::find_by_sql("SELECT nombre FROM mdepartamentos WHERE cdd =".$rs->mdepartamentos_id." AND status=1 order by id desc;");
		foreach ($data2 as &$rt) {

			$dep=$rt->nombre;

		}

		$data3=Mmunicol::find_by_sql("SELECT nombre FROM mmunicols WHERE cdd =".$rs->mmunicipios_id." AND status=1 order by id desc;");
		
		if($data3!=null){
			foreach ($data3 as &$rq) {

				$mun=$rq->nombre;

			}
		}else{
			
				$mun='No Asignado';
		}
		$responsable=$rs->rt_nombre1.' '.$rs->rt_apellido1;

		array_push($result,array(
						
		                           		 "id"=>$rs->id,
		                           		 "nombre"=>$rs->nombre,
		                           		 "departamento"=>$dep,
		                           		 "municipio"=>$mun,
		                           		 "fecha"=>$rs->fecha2->format("d-m-Y"),
		                        		 "responsable"=>$responsable
		                        		 

		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>