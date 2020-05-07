<?php
require_once '../models/Mregione.php';
require_once '../models/Mestado.php';
require_once '../models/Mmunicipio.php';
require_once '../models/Mparroquia.php';
require_once '../models/Mdistribuidora.php';
require_once '../models/Mpoblado.php';
require_once '../models/Maliado.php';

date_default_timezone_set('America/Caracas');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$record = ($_POST["record"]);
/***********************************/
@$nombre = ($_POST["nombre"]);
@$distribuidora = ($_POST["distribuidora"]);
@$estado = ($_POST["estado"]);
@$municipio = ($_POST["municipio"]);
@$parroquia = ($_POST["parroquia"]);
@$ciudad = ($_POST["ciudad"]);
/**********************************/

switch ($action){

    case 'get_estados':

        @$data = Mestado::find('all');

      if($data !=null){
               $resp = '<option value="" disabled selected>Indique un Estado</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->nombres.'</option>';
              $resp .= '<hidden>';
            }

       }

         echo $resp;
    break;

#******************************************************************************
    case 'get_municipios':

        @$data = Mmunicipio::find('all',array('conditions' => array('idestados=?',$estado)));

      if($data !=null){
               $resp = '<option value="" disabled selected>Indique un Municipio</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->nombres.'</option>';
              $resp .= '<hidden>';
            }

       }else{
        $resp = '<option value="">No hay municipios asignados</option>';
       }

         echo $resp;
    break;

#******************************************************************************
    case 'get_parroquias':

        @$data = Mparroquia::find('all',array('conditions' => array('idmunicipios=?',$municipio)));

      if($data !=null){
               $resp = '<option value="" disabled selected>Indique una Parroquia</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->nombres.'</option>';
              $resp .= '<hidden>';
            }

       }else{
        $resp = '<option value="">No hay parroquias asignadas</option>';
       }

         echo $resp;
    break;

#******************************************************************************

    case 'get_municipios_e':

        @$data = Mmunicipio::find('all',array('conditions' => array('id=?',intval($municipio))));
//print_r($data);exit();
        if($data !=null){
            
            foreach($data as $rs){
               $resp = '<option value="'.$rs->id.'">'.$rs->nombres.'</option>';
               $resp .= '<hidden>';
            }  

        }else{
               $resp = '<option value="">No hay municipios asignados</option>';
        }

         echo $resp;
    break;

#******************************************************************************
    case 'get_parroquias_e':

        @$data = Mparroquia::find('all',array('conditions' => array('id=?',intval($parroquia))));

        if($data !=null){

          foreach($data as $rs){          
               $resp = '<option value="'.$rs->id.'">'.$rs->nombres.'</option>';
               $resp .= '<hidden>';
          }     
        }else{
               $resp = '<option value="">No hay parroquias asignadas</option>';
        }

         echo $resp;
    break;

#******************************************************************************
    case 'get_ciudad_e':

        @$data = Mpoblado::find('all',array('conditions' => array('gid=?',intval($ciudad))));

          if($data !=null){

            foreach($data as $rs){            
               $resp = '<option value="'.$rs->gid.'">'.strtoupper($rs->nombre).'</option>';
               $resp .= '<hidden>';
            }               
          }else{
               $resp = '<option value="">No hay centros poblados asignados</option>';
          }

         echo $resp;
    break;

#******************************************************************************

    case 'get_ciudad':
        
    
      @$geomun=Mmunicipio::find('all',array('conditions' => array('id=?',$municipio)));
      @$geopar=Mparroquia::find('all',array('conditions' => array('id=?',$parroquia)));
      

    //print_r($geomun);
   // print_r($geopar);exit();
        foreach ($geomun as $gm) {

                @$idmuni=$gm->id_dpt;
                @$idestado=$gm->idestados;
                  if(strlen($idestado)==1){
                     $idestado= "0".$idestado;
                  }
                  if(strlen($idmuni)==1){
                     $idmuni= "0".$idmuni;
                  }
                foreach ($geopar as $gp) {
                  @$idparro=$gp->id_dpt;
                    if(strlen($idparro)==1){
                       $idparro= "0".$idparro;
                    } 

                    if($idestado=="02"){//caso especial AMAZONAS sin parroquias
                      @$apoblado=$idestado.$idmuni."00";
                    }else{
                      @$apoblado=$idestado.$idmuni.$idparro;
                    }               
                  
                }  
//echo $apoblado;exit();
        }

         @$data = Mpoblado::find_by_sql("SELECT gid,nombre FROM mpoblados WHERE cod_parr='".$apoblado."' ORDER BY id DESC;");
      //print_r($data);exit();
      if($data !=null){
               $resp = '<option value="" disabled selected>Indique un centro poblado</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->gid.'">'.strtoupper($rs->nombre).'</option>';
              $resp .= '<hidden>';

            }

       }else{

                $resp = '<option value="" disabled selected>Indique un centro poblado</option>';
                  foreach($geopar as $prp){
                    $resp .= '<option value="'.$prp->id.'">'.strtoupper($prp->nombres).'</option>';
                    $resp .= '<hidden>';

                  }


             //$resp = '<option value="" disabled selected>No hay centros poblados asignados </option>';

            
       }

        echo $resp;
   
    break;

#******************************************************************************
    case 'get_coordenadas':

        @$data = Mpoblado::find_by_sql("SELECT gid,nombre,ST_YMax(geom) AS lata,ST_XMax(geom) AS longa FROM mpoblados WHERE gid='$ciudad';");

      if($data !=null){

            foreach($data as $rs){
            //echo($rs->tipos);exit();
                    
                      $resp = array(
                              "lata"=>$rs->lata,
                              "longa"=>$rs->longa
                              );        
            }
                      
       }else{
                      $resp = array(
                              "lata"=>6.12,
                              "longa"=>-67.39
                              );  
       }

         echo json_encode($resp);
    break;
#******************************************************************************    

    case 'get_geojson':

       @$data = Maliado::find_by_sql("SELECT row_to_json(fc)
          FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
          FROM (SELECT 'Feature' As type
          , ST_AsGeoJSON(lg.geom)::json As geometry
          , row_to_json(lp) As properties
          FROM maliados As lg
          INNER JOIN (SELECT id, nombre FROM maliados where id=97) As lp
          ON lg.id = lp.id ) As f ) As fc;");

      if($data !=null){

        
        foreach ($data as $rs) {
          $resp=$rs->row_to_json;
        }

      }
    echo $resp;
    break;
#******************************************************************************      

}//end switch
?>


