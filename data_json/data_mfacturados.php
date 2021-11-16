<?php

require_once '../models/Msolicitude.php';
require_once '../models/Mdepartamento.php';
require_once '../models/Mmunicol.php';
require_once '../models/Vfacturado.php';



session_start();
//$toca=0;
	//muestra toda la data
		$data = Vfacturado::find_by_sql("SELECT id_sol,id_fac,nombre,mdepartamentos_id,mmunicipios_id,costo_total_evento
												   FROM  Vfacturados ;");

		$result = array();
	
		$items = 0;
		foreach ($data as &$rs) {
	
			$data2=Mdepartamento::find_by_sql("SELECT nombre FROM mdepartamentos WHERE cdd ='$rs->mdepartamentos_id' AND status=1 order by id desc;");
			foreach ($data2 as &$rt) {
	
				$dep=$rt->nombre;
	
			}

			$data3=Mmunicol::find_by_sql("SELECT nombre FROM mmunicols WHERE cdd ='$rs->mmunicipios_id' AND status=1 order by id desc;");
			
			if($data3 != null){
				foreach ($data3 as &$rq) {
	
					$mun=$rq->nombre;
					$costo=$rs->costo_total_evento;
	
				}
			}else{
				
					$mun='No Asignado';
					$costo=0;
			}

			
	
			array_push($result,array(
			                 	"id"=>$rs->id_fac,
								"num_sol"=>$rs->id_sol,
								"nombre"=>$rs->nombre,
								"dep"=>$dep,
								"mun"=>$mun,
								"costo_total_evento"=>$costo,
								"cid"=>$rs->id_fac												
	
			 ));
			 
			$items++;
		}

	print_r(json_encode($result));
?>