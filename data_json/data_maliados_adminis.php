<?php
require_once '../models/Maliado.php';
require_once '../models/Msegmento.php';
require_once '../models/Mterritorio.php';
require_once '../models/Mregione.php';
require_once '../models/Mdistribuidora.php';
require_once '../models/Mestado.php';
session_start();
//$toca=0;
//$dist=intval($_SESSION['distribuidora']);


		//muestra toda la data si es ADMINISTRADOR o PROGRAMADOR
		@$data = Maliado::find_by_sql("select id,cid,orbis,cedula,nombre,msegmento_id,cajas_p,tipos,status,completado,mzona_id,mterritorio,mdistribuidoras_id,mregiones_id,mestado_id from maliados WHERE status=1 order by id desc;");


	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {

			@$data2 = Msegmento::find_by_sql("select id,nombre,status from msegmentos WHERE status=1 AND id=".$rs->msegmento_id." order by id desc;");
//print_r($data2);exit();
			foreach ($data2 as &$rt) {

				@$segme=$rt->nombre;

			}

			@$data3 = Mterritorio::find_by_sql("select orbis,status from mterritorios WHERE status=1 AND id=".$rs->mterritorio." order by id desc;");

			foreach ($data3 as &$rl) {

				@$terrif=$rl->orbis;

			}

			@$data4 = Mestado::find_by_sql("select nombres from mestados WHERE id=".$rs->mestado_id." order by id desc;");

			foreach ($data4 as &$rk) {

				@$estadal=$rk->nombres;

			}		


			@$data5 = Mregione::find_by_sql("select status,nombre from mregiones WHERE status=1 AND id=".$rs->mregiones_id." order by id desc;");

				if($data5!=null){
					foreach ($data5 as &$rm) {

						@$regional=$rm->nombre;

					}		
				}else{
					@$regional='NO DEFINIDA';
				}	
			@$data6 = Mdistribuidora::find_by_sql("select status,nombre from mdistribuidoras WHERE status=1 AND id=".$rs->mdistribuidoras_id." order by id desc;");

				if($data6!=null){

					foreach ($data6 as &$rn) {

						@$distribui=$rn->nombre;

					}							
				}else{
					@$distribui='NO DEFINIDA';
				}

		array_push($result,array(
						 				 "cid"=>$rs->cid,
		                           		 "region"=>$regional,
		                           		 "estado"=>$estadal,
		                           		 "distribuidora"=>$distribui,
		                           		 "modulo"=>$rs->mzona_id,
		                           		 "territorio"=>$terrif,
		                        		 "segmento"=>$segme,
		                        		 "nombre"=>$rs->nombre,
		                        		 "cajas"=>$rs->cajas_p,	 
		                        		 "completado"=>$rs->completado

		                         ));
		$items++;
	}




	print_r(json_encode($result));


?>
