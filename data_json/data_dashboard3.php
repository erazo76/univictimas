<?php
require_once '../models/Vfacturado.php';
require_once '../models/Grupo.php';
require_once '../models/Mcontrato.php';

	$result = array();
	@$data = Mcontrato::find('all');
    if($data !=null){
	$ejecafe = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=1;");
	$centro_o = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=2;");
	$caribe = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=3;");
	$llano = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=4;");
	$centro_s = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=5;");
	$pacifico = Vfacturado::find_by_sql("SELECT sum(costo_total_evento) as tot_cos from Vfacturados WHERE grup_financ_id=6;");

	$M_asig = Mcontrato::find_by_sql("SELECT sub_participacion,dir_inter,subdir_snariv,subdir_nac,grup_proy,vic_ext from Mcontratos WHERE vigente=TRUE;");
	
	foreach($M_asig as $asig){
		$sub_participacion=$asig->sub_participacion;
		$dir_inter=$asig->dir_inter;
		$subdir_snariv=$asig->subdir_snariv;
		$subdir_snariv=$asig->subdir_snariv;
		$grup_proy=$asig->grup_proy;
		$vic_ext=$asig->vic_ext;



	  } 
	
	 $region = Grupo::find_by_sql("SELECT id,nombre from grupos WHERE status=1 order by id asc;");
	$items = 0;

    if($ejecafe !=null){
		foreach($ejecafe as $r1){
		  if($r1->tot_cos==null){
			$reg1=0;
		  }else{
		  $reg1 = floatval($sub_participacion)-floatval($r1->tot_cos);  
    
		  }

		}  
      
	}
	
	if($centro_o !=null){
		foreach($centro_o as $r2){
		  if($r2->tot_cos==null){
			$reg2=0;
		  }else{
		  $reg2 = floatval($dir_inter)-floatval($r2->tot_cos);  
    
		  }

		}    
    
	}

	if($caribe !=null){
		foreach($caribe as $r3){
		  if($r3->tot_cos==null){
			$reg3=0;
		  }else{
		  $reg3 = floatval($subdir_snariv)-floatval($r3->tot_cos);  
     
		  }
		}   
     
	}

	if($llano !=null){
		foreach($llano as $r4){
		  if($r4->tot_cos==null){
			$reg4=0;
		  }else{
		  $reg4 = floatval($subdir_nac)-floatval($r4->tot_cos);    
		  }

		}    
    
	}

	if($centro_s !=null){
		foreach($centro_s as $r5){
		  if($r5->tot_cos==null){
			$reg5=0;
		  }else{
		  $reg5 = floatval($grup_proy)-floatval($r5->grup_proy);  
		  }
		}    
    
	}

	if($pacifico !=null){
		foreach($pacifico as $r6){
		  if($r6->tot_cos==null){
			$reg6=0;
		  }else{
		  $reg6 = floatval($vic_ext)-floatval($r6->grup_proy);  
		  }
		}  
      
	}


	foreach ($region as &$rg) {
		switch ($rg->id){
			case 1: $val = floatval($reg1);
					$nom = $rg->nombre;				
			break;
			case 2: $val = floatval($reg2);
					$nom = $rg->nombre;				
			break;
			case 3: $val = floatval($reg3);
					$nom = $rg->nombre;				
			break;
			case 4: $val = floatval($reg4);
					$nom = $rg->nombre;				
			break;
			case 5: $val = floatval($reg5);
					$nom = $rg->nombre;				
			break;
			case 6: $val = floatval($reg6);
					$nom = $rg->nombre;				
			break;

		}
		array_push($result,array(   
			"valor"=>$val,
			"region"=>$nom		
		));	
}


	}
	echo json_encode($result);
?>