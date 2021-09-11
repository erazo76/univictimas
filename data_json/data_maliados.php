<?php
require_once '../models/Maliado.php';
require_once '../models/Msegmento.php';
require_once '../models/Mterritorio.php';
session_start();
//$toca=0;
$dist=intval($_SESSION['distribuidora']);

	if($_SESSION['rolx']== 2 || $_SESSION['rolx']== 4 ){
		//muestra toda la data si es ADMINISTRADOR o PROGRAMADOR
		$data = Maliado::find_by_sql("select id,cid,orbis,cedula,nombre,msegmento_id,cajas_p,tipos,status,completado,mzona_id,mterritorio,sorbis from maliados WHERE status=1 order by id desc;");
	}else{
		//muestra solo la data del usuario según la distribuidora
		$data = Maliado::find_by_sql("select id,cid,orbis,cedula,nombre,msegmento_id,cajas_p,tipos,status,completado,mzona_id,mterritorio,sorbis from maliados WHERE status=1 and mdistribuidoras_id=".$dist." order by id desc;");
	}

	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {

			$data2 = Msegmento::find_by_sql("select id,nombre,status from msegmentos WHERE status=1 AND id=".$rs->msegmento_id." order by id desc;");

			foreach ($data2 as &$rt) {

				$segme=$rt->nombre;

			}

			$data3 = Mterritorio::find_by_sql("select orbis,status from mterritorios WHERE status=1 AND id=".$rs->mterritorio." order by id desc;");

			foreach ($data3 as &$rl) {

				$terrif=$rl->orbis;

			}

if($rs->orbis=='' && $rs->sorbis==0){

	$orbita='Sin codigo ORBIS';

}else{

	$torbis=$rs->sorbis;

	switch ($torbis){

 	    case '1':$aorbis='A';break;
 	    case '2':$aorbis='C';break;
  		case '3':$aorbis='P';break;
  		default :$aorbis="-";break; 


 	}// END SWITCH 

	$borbis=$rs->orbis;
	$orbita=$aorbis.$borbis;

}

@$array = explode(",", $rs->tipos);

$tipes1='';
 
if(@$array[0]==0 && @$array[1]==null){

    	 $tipes1="ACTIVO/";

}else if($array[0]==2){

    	 $tipes1="POTENCIAL/";

}else if($array[0] ==0 && $array[1]==1){

	$tipes1="ACTIVO/COMPARTIDO/";
}


		array_push($result,array(
						 "cid"=>$rs->cid,
		                           		 "orbis"=>$orbita,
		                           		 "nombre"=>$rs->nombre,
		                           		 "cedula"=>$rs->cedula,
		                           		 "estatus"=>$tipes1,
		                           		 "segmento"=>$segme,
		                        		 "cajas"=>$rs->cajas_p,
		                        		 "modulo"=>$rs->mzona_id,
		                        		 "territorio"=>$terrif,	 
		                        		 "completado"=>$rs->completado

		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>