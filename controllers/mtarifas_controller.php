<?php
// require_once '../models/Mregione.php';
// require_once '../models/Mdepartamento.php';
// require_once '../models/Mmunicol.php';
// require_once '../models/Mcpoblado.php';
// require_once '../models/Mdistribuidora.php';
// require_once '../models/Mrequerimiento.php';
require_once '../models/Mtarifario.php';
require_once '../models/Mtarifa.php';
require_once '../models/Mcategoria.php';




date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$record = ($_POST["record"]);
/***********************************/
@$nombre = ($_POST["nombre"]);
@$distribuidora = ($_POST["distribuidora"]);
@$departamento = ($_POST["departamento"]);
@$municipio = ($_POST["municipio"]);
@$cpoblado = ($_POST["cpoblado"]);

/**********************************/

@$tarifario = ($_POST["tarifario"]);
@$concepto = ($_POST["concepto"]);
@$id_concepto = ($_POST["id_concepto"]);
@$tipo_tarifario = ($_POST["tipo"]);







switch ($action){




  #******************************************************************************


case 'get_categoria':

  @$data = Mcategoria::find_by_sql("select  id, concepto from Mcategorias ;");


if($data !=null){
  $resp = '<option value="">Indique la Categoria</option>';
  foreach($data as $rs){
        $resp .= '<option value="'.$rs->id.'">'.$rs->concepto.'</option>';
        $resp .= '<hidden>';
      }

 }else{
  $resp = '<option value="">Indique la Categoria</option>';
}

   echo $resp;
break;

case 'get_concepto':

  if ($tipo_tarifario==1){
    @$data = Mtarifario::find_by_sql("select  id as id_concepto, nombre from Mtarifarios where id_categoria=$tarifario ;");

  }else if ($tipo_tarifario==2){
    @$data = Mtarifa::find_by_sql("select  id as id_concepto, nombre from Mtarifas where id_categoria=$tarifario ;");

  }
  //@$data = Mcategoria::find_by_sql("select  id, concepto from Mcategorias ;");


if($data !=null){
  $resp = '<option value="">Indique el Concepto</option>';
      foreach($data as $rs){
        $resp .= '<option value="'.$rs->id_concepto.'">'.$rs->nombre.'</option>';
        $resp .= '<hidden>';
      }

 }else{
  $resp = '<option value="">Indique el Concepto</option>';
 }

   echo $resp;
break;




case 'get_detalles_concepto':

  if ($tipo_tarifario==1){
    @$data = Mtarifario::find_by_sql("select  id, nombre as det_concepto, unidad_med as unimed,precio_uni_iva as precio_unitario from Mtarifarios where id=$concepto ;");

  }else if ($tipo_tarifario==2){
    @$data = Mtarifa::find_by_sql("select  id, nombre as det_concepto, unidad_med as unimed,precio_uni_iva as precio_unitario from Mtarifas where id=$concepto ;");

  }


  if($data !=null){

    foreach($data as $rs){

      $resp = array(
              "det_concepto"=>$rs->det_concepto,
              "unimed"=>$rs->unimed,
              "precio_unitario"=>$rs->precio_unitario
             );
    }

    echo json_encode($resp);
   }else {
    $resp = array(
      "det_concepto"=>"",
      "unimed"=>"",
      "precio_unitario"=>"",
     );
   }
break;


case 'search_concepto':

  //@$data = Mtarifario::find_by_sql("select  id, concepto from Mtarifarios where concepto='MATERIALES' ;");
  @$data = Mtarifario::find_by_sql("select  id, concepto from Mtarifarios; ");


if($data !=null){
  $resp = '<option value="">Indique el Concepto</option>';
      foreach($data as $rs){
        $resp .= '<option value="'.$rs->id.'">'.$rs->concepto.'</option>';
        $resp .= '<hidden>';
      }

 }else{
         $resp = '<option value="">No hay Conceptos asignados</option>';
 }

   echo $resp;
break;


#******************************************************************************     


  #******************************************************************************


  case 'get_categoria_2':

    @$data = Mcategoria::find_by_sql("select  id, concepto from Mcategorias ;");
  
  
  if($data !=null){
    $resp = '<option value="">Indique la Categoria</option>';
    foreach($data as $rs){
          $resp .= '<option value="'.$rs->id.'">'.$rs->concepto.'</option>';
          $resp .= '<hidden>';
        }
  
   }else{
    $resp = '<option value="">Indique la Categoria</option>';
  }
  
     echo $resp;
  break;
  
  case 'get_concepto_2':
  
    @$data = Mtarifa::find_by_sql("select  id as id_concepto, nombre from Mtarifas where id_categoria=$tarifario ;");
  
  
  if($data !=null){
    $resp = '<option value="">Indique el Concepto</option>';
        foreach($data as $rs){
          $resp .= '<option value="'.$rs->id_concepto.'">'.$rs->nombre.'</option>';
          $resp .= '<hidden>';
        }
  
   }else{
    $resp = '<option value="">Indique el Concepto</option>';
   }
  
     echo $resp;
  break;
  
  
  
  
  case 'get_detalles_concepto_2':
  
    @$data = Mtarifa::find_by_sql("select  id, nombre as det_concepto, unidad_med as unimed,precio_uni_iva as precio_unitario from Mtarifas where id=$concepto ;");
  
    if($data !=null){
  
      foreach($data as $rs){
  
        $resp = array(
                "det_concepto_2"=>$rs->det_concepto,
                "unimed_2"=>$rs->unimed,
                "precio_unitario_2"=>$rs->precio_unitario
               );
      }
  
      echo json_encode($resp);
     }
  break;
  
  
  case 'search_concepto_2':
  
    @$data = Mtarifa::find_by_sql("select  id, concepto from Mtarifas; ");
  
  
  if($data !=null){
    $resp = '<option value="">Indique el Concepto</option>';
        foreach($data as $rs){
          $resp .= '<option value="'.$rs->id.'">'.$rs->concepto.'</option>';
          $resp .= '<hidden>';
        }
  
   }else{
           $resp = '<option value="">No hay Conceptos asignados</option>';
   }
  
     echo $resp;
  break;

}//end switch
?>


