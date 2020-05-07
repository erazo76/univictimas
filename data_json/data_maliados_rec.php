<?php
require_once '../models/Maliado.php';
require_once '../models/Msegmento.php';
require_once '../models/Mterritorio.php';
require_once '../models/Mtemporale.php';
session_start();
//$toca=0;
$usus=intval($_SESSION['idusuariox']);
//echo $usus;exit();
		//muestra solo la data del usuario según la distribuidora
		$data = Mtemporale::find_by_sql("select id,cid,orbis,cedula,nombre,msegmento_id,tipos,status,sorbis from mtemporales WHERE status=1 and user_create=".$usus." order by id desc;");
	

	$result = array();
	
	$items = 0;
	foreach ($data as &$rs) {

			$data2 = Msegmento::find_by_sql("select id,nombre,status from msegmentos WHERE status=1 AND id=".$rs->msegmento_id." order by id desc;");

			if($data2!=null){
				foreach ($data2 as &$rt) {

					$segme=$rt->nombre;

				}
			}else{
					$segme='NO ASIGNADO';
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
						 				 "cid"=>$rs->id,
		                           		 "orbis"=>$orbita,
		                           		 "nombre"=>$rs->nombre,
		                           		 "cedula"=>$rs->cedula,
		                           		 "estatus"=>$tipes1,
		                           		 "segmento"=>$segme


		                         ));
		$items++;
	}

	print_r(json_encode($result));
?>