<?php
require_once '../models/Mactivo.php';
date_default_timezone_set('America/Caracas');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$record = ($_POST["record"]);
@$recordado = ($_POST["recordado"]);
@$recordatorio = ($_POST["recordatorio"]);
@$l_recordado = ($_POST["l_recordado"]);
@$l_orbis = ($_POST["l_orbis"]);
@$l_record = ($_POST["l_record"]);
/***********************************/
@$marca = ($_POST["marca"]);
@$modelo = ($_POST["modelo"]);
@$serial = ($_POST["serial"]);
@$activo = ($_POST["activo"]);
@$comodato = ($_POST["comodato"]);
@$distribuidora = ($_POST["distribuidora"]);
@$busco = ($_POST["busco"]);
/**********************************/

switch ($action){

  case 'add':

      if($nombre ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el nombre de la marca.
            </div>');

      }else{  //(A) si se escribe un nombre se consulta si ya existe...

        $consulta = Mmarca::find('all',array('conditions' => array('nombre=?',$nombre)));

          if($consulta==null){  //(B) si no existe lo guarda...

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $segme = new Mmarca();
            $segme->nombre = $nombre;
            $segme->user_create = $usuario_id;
            $segme->created = $hoy;


            if($segme->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido registrados exitosamente !.
                    </div>');

            }else{


              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
         					<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
         					<h4>
         					<i class="icon fa fa-ban"></i>
         					Alerta!
         					</h4>
         					Error al registrar los datos.
         					</div>');
            }

            //echo json_encode($respuesta);

        }else{ //(B) si exite el nombre verifica el status del registro...

            foreach ($consulta as $st) {

                 $estado=$st->status;
                 $ide=$st->id;

              }

            if($estado!=1){ //se activa mensaje modal para llevar el status a "1" ... (o no).

                    //echo 'MODAL PARA ACTIVAR REGISTRO GUARDADO'; exit();

              $respuesta = array('resultado'=>'alert','mensaje'=>'<input type="hidden" id="id" value="'.$ide.'">
                  <div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>

                  Registro inactivo . ¿Desea incluir ['.$nombre.'] en el maestro de marcas?

                      <div class="modal-footer" >
                        <button type="button" id="no" class="btn btn-outline pull-left" data-dismiss="alert" onClick="no()">No</button>
                        <button type="button" id="silo" class="btn btn-outline pull-left" onClick="si()" >Si</button>
                      </div>
                  </div>');

            }else{


              $respuesta = array('resultado'=>'alert','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  La marca ['.$nombre.'] ya se encuentra registrada.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }


     }
             echo json_encode($respuesta);

  break;
#*******************************************************************************
  case 'edit':

      if($nombre ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el nombre de la marca.
            </div>');

      }else{

    $consulta = Mmarca::find('all',array('conditions' => array('nombre=?',$nombre)));

      if($consulta==null){

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');



            $depa= Mmarca::find($id);
            $depa->nombre = $nombre;
            $depa->user_modify = $usuario_id;
            $depa->updated = $hoy;


            if($depa->save()){

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Alerta!
                    </h4>
                    Los datos han sido actualizados exitosamente !.
                    </div>');

            }else{


              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Error al actualizar los datos.
                  </div>');


            }

        }else{ //(B) si exite el nombre verifica el status del registro...

            foreach ($consulta as $st) {

                 $estado=$st->status;
                 $ide=$st->id;

              }

            if($estado!=1){ //se activa mensaje modal para llevar el status a "1" ... (o no).

                    //echo 'MODAL PARA ACTIVAR REGISTRO GUARDADO'; exit();

              $respuesta = array('resultado'=>'alert','mensaje'=>'<input type="hidden" id="id" value="'.$ide.'">
                  <div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>

                  Registro inactivo . ¿Desea incluir ['.$nombre.'] en maestro de marcas?

                      <div class="modal-footer" >
                        <button type="button" id="no" class="btn btn-outline pull-left" data-dismiss="alert" onClick="no()">No</button>
                        <button type="button" id="silo" class="btn btn-outline pull-left" onClick="si()" >Si</button>
                      </div>
                  </div>');

            }else{


              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  La marca ['.$nombre.'] ya se encuentra registrado.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }


     }
             echo json_encode($respuesta);

  break;
#*******************************************************************************
  case 'delete':

      if($record !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" /*&& ($rol ==1 || $rol==4)*/){

                  $acti= Mactivo::find($record);
                  $acti->user_modify = $usuario_id;
                  $acti->updated = $hoy;
                  $acti->status = 0;

                  if($acti->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se desincorporo el activo al aliado comercial!.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al desincorporar el activo.
                        </div>');

                  }

        }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Transacción denegada !
                  </div>');

        }


          echo json_encode($respuesta);

  }
  break;
#*******************************************************************************
  case 'search':
    if($record !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=?',$record)));

      if($data !=null){

        foreach($data as $rs){

            $resp = array(
                  "marca"=>$rs->mmarcas_id,
                  "modelo"=>$rs->modelo,
                  "serial"=>$rs->serial,
                  "activo"=>$rs->activo,
                  "comodato"=>$rs->comodato

            );

        }

        echo json_encode($resp);
      }

    }
  break;

#*******************************************************************************
  case 'search_act':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',1,1)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;

#*******************************************************************************
  case 'search_act_edit':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',$busco,1)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;

#*******************************************************************************
  case 'search_act2':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',1,0)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;


#*******************************************************************************
  case 'search_act_delete':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',1,1)));

      if($data !=null){//si consigue al menos un registro de activo

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            foreach ($data as $acti) {
             
            
                  $acti->user_modify = $usuario_id;
                  $acti->updated = $hoy;
                  $acti->status = 0;

                  $acti->save();
            }
                  
      }else{

       

      }


  break;

#*******************************************************************************
  case 'search_act3':
    
      @$data = Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',$recordatorio,1)));

      if($data !=null){//si consigue al menos un registro de activo

        $resp='si';

      }else{

        $resp='no';

      }

    echo json_encode($resp);

  break;

#******************************************************************************

    case 'get_marcas':

        @$data = Mmarca::find('all',array('conditions' => array('status=?',1),'order' => 'id desc'));

      if($data !=null){
               $resp = '<option value="" selected disabled>Indique la marca</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->nombre.'</option>';
              $resp .= '<hidden>';
            }

       }

         echo $resp;
    break;

 #******************************************************************************

    case 'temporal':

      if($marca ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la marca del activo.
            </div>');

      }else if($modelo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el modelo del activo.
            </div>');

      }else  if($serial ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
           Ingrese el serial del activo.
            </div>');

      }else  if($activo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el rotulo del activo.
            </div>');

      }else  if($comodato ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el número de comodato.
            </div>');

      }else{

              @$consultata = Mactivo::find('all',array('conditions' => array('comodato=? AND status=?',$comodato,1)));

          if($consultata == null){

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $tempo = new Mactivo();
            $tempo->mmarcas_id = $marca;
            $tempo->modelo = $modelo;
            $tempo->serial = $serial;
            $tempo->activo = $activo;
            $tempo->comodato = $comodato;
            $tempo->maliados_id = 1;
            $tempo->mdistribuidoras_id = $distribuidora;
            $tempo->user_create = $usuario_id;
            $tempo->created = $hoy;
                  if($tempo->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se registro el activo exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al registrar el activo.
                        </div>');

                  }
          //echo json_encode($respuesta);
        }else{

                        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-ban"></i>
                            Alerta!
                            </h4>
                            Este activo ya esta registrado.
                            </div>');

            }  

        }        
        echo json_encode($respuesta);
      break;

#******************************************************************************

    case 'temporal2':

      if($marca ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la marca del activo.
            </div>');

      }else if($modelo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el modelo del activo.
            </div>');

      }else  if($serial ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
           Ingrese el serial del activo.
            </div>');

      }else  if($activo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el rotulo del activo.
            </div>');

      }else  if($comodato ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
          Ingrese el número de comodato.
            </div>');

      }else{
              @$consultata = Mactivo::find('all',array('conditions' => array('comodato=? AND status=?',$comodato,1)));
 
            if($consultata == null){

                session_start();
                $usuario_id = $_SESSION['idusuariox'];
                $hoy = date('d-m-Y');

                $tempo = new Mactivo();
                $tempo->mmarcas_id = $marca;
                $tempo->modelo = $modelo;
                $tempo->serial = $serial;
                $tempo->activo = $activo;
                $tempo->comodato = $comodato;
                $tempo->maliados_id = $id;
                $tempo->mdistribuidoras_id = $distribuidora;
                $tempo->user_create = $usuario_id;
                $tempo->created = $hoy;
                      if($tempo->save()){

                        $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-check"></i>
                            Alerta!
                            </h4>
                            Se registro el activo exitosamente !.
                            </div>');

                      }else{


                        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-ban"></i>
                            Alerta!
                            </h4>
                            Error al registrar el activo.
                            </div>');

                      }
              //echo json_encode($respuesta);
            }else{

                        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                            <h4>
                            <i class="icon fa fa-ban"></i>
                            Alerta!
                            </h4>
                            Este activo ya esta registrado.
                            </div>');

            }  

        }
        echo json_encode($respuesta);
      break;

#******************************************************************************
    case 'activa':

      if($id !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && ($rol ==1 || $rol ==4)){

                  $bien= Mmarca::find($id);
                  $bien->user_modify = $usuario_id;
                  $bien->updated = $hoy;
                  $bien->status = 1;

                  if($bien->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Marca activada exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al activar el registro.
                        </div>');

                  }

        }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  Transacción denegada !
                  </div>');

        }


          echo json_encode($respuesta);

  }
  break;

#******************************************************************************

    case 'definitivo':

      if($recordado !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && $rol ==3 ){

                  $activoro = Maliado::find('all',array('conditions' => array('cedula=? AND l_cedula=? AND orbis=?',$recordado,$l_recordado,$l_orbis)));
                
                    foreach ($activoro as $rs) {
                                         
                      $ideado=$rs->id;


//print_r($ideado);exit();
                      $consultada=Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',intval($l_record),1)));

                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->maliados_id = $ideado;
                          $activoros->save();

                        }    
                    }            

        }


          //echo json_encode($respuesta);

  }
  break;

#******************************************************************************

    case 'definitivo2':

      if($recordado !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && $rol ==3 ){

                  $activoro = Maliado::find('all',array('conditions' => array('cedula=? AND l_cedula=? AND orbis=?',$recordado,$l_recordado,$l_orbis)));
                
                    foreach ($activoro as $rs) {
                                         
                      $ideado=$rs->id;

                    } 

                    $consultada=Mactivo::find('all',array('conditions' => array('maliados_id=? AND status=?',1,1)));

                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->maliados_id = $ideado;
                          $activoros->save();

                        }    
                      

        }


          //echo json_encode($respuesta);

  }
  break;  

}//end switch
?>
