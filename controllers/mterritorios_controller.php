<?php
require_once '../models/Mterritorio.php';
require_once '../models/Vw_distribuidore.php';
require_once '../models/Vw_cliente.php';
require_once '../models/Vw_nevera.php';

date_default_timezone_set('America/Caracas');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$record = ($_POST["record"]);
@$vista = ($_POST["vista"]);
@$campo = ($_POST["campo"]);
/***********************************/
@$orbis = ($_POST["orbis"]);
@$nombre = ($_POST["nombre"]);
@$distribuidora = ($_POST["distribuidora"]);
@$distribuidoras = ($_POST["distribuidoras"]);
@$modulo = ($_POST["modulo"]);
@$l_rif = ($_POST["l_rif"]);
@$c_rif = ($_POST["c_rif"]);
@$territorio = ($_POST["territorio"]);
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
            Ingrese el nombre del territorio.
            </div>');

      }else if($orbis ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el códio ORBIS del territorio.
            </div>');

      }else if($distribuidora ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la dependencia del territorio.
            </div>');

      }else if($c_rif ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el número de RIF.
            </div>');

      }else{  //(A) si se escribe un nombre se consulta si ya existe...

        $consulta = Mterritorio::find('all',array('conditions' => array('orbis=?',$orbis)));

          if($consulta==null ){  //(B) si no existe lo guarda...

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $terri = new Mterritorio();
            $terri->nombre = $nombre;
            $terri->orbis = $orbis;
            $terri->mdistribuidoras_id = $distribuidora;
            $terri->modulo = $modulo;
            $terri->l_rif = $l_rif;
            $terri->c_rif = $c_rif;
            $terri->user_create = $usuario_id;
            $terri->created = $hoy;

            if($terri->save()){ // da el mensaje de guardado...

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

                  Registro inactivo . ¿Desea incluir ['.$orbis.'] en el maestro de territorios?

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
                  El territorio ['.$orbis.'] ya se encuentra registrado.
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
            Ingrese el nombre del territorio.
            </div>');

      }else if($orbis ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el códio ORBIS del territorio.
            </div>');

      }else if($distribuidora ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la dependencia del territorio.
            </div>');

      }else if($c_rif ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el número de RIF.
            </div>');

      }else{


    $consulta = Mterritorio::find('all',array('conditions' => array('orbis=? AND id!=?',$orbis, $id)));

      if($consulta==null){

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');



            $terri= Mterritorio::find($id);
            $terri->nombre = $nombre;
            $terri->orbis = $orbis;
            $terri->mdistribuidoras_id = $distribuidora;
            $terri->user_modify = $usuario_id;
            $terri->updated = $hoy;
            $terri->modulo = $modulo;
            $terri->l_rif = $l_rif;
            $terri->c_rif = $c_rif;


            if($terri->save()){

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

                  Registro inactivo . ¿Desea incluir ['.$orbis.'] en el maestro de territorios?

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
                  El territorio ['.$orbis.'] ya se encuentra registrado.
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

        if($usuario_id !="" && ($rol ==2 || $rol == 4)){

                  $depa= Mterritorio::find($record);
                  $depa->user_modify = $usuario_id;
                  $depa->updated = $hoy;
                  $depa->status = 0;

                  if($depa->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Registro eliminado exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al eliminar el registro.
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

      @$data = Mterritorio::find('all',array('conditions' => array('id=?',$record)));

      if($data !=null){

        foreach($data as $rs){

          $resp = array(
                  "id"=>$rs->id,
                  "orbis"=>strtoupper($rs->orbis),
                  "nombre"=>$rs->nombre,
                  "distribuidora"=>$rs->mdistribuidoras_id,
                  "modulo"=>$rs->modulo,
                  "l_rif"=>$rs->l_rif,
                  "c_rif"=>$rs->c_rif
                 );
        }

        echo json_encode($resp);
       }

    }
    break;

#******************************************************************************

    case 'get_territorios':

//echo $modulo;exit();

if($distribuidora==1 || $distribuidora==8 || $distribuidora==9 || $distribuidora==0){
       
       @$datal = Mterritorio::find('all',array('conditions' => array('status=? AND modulo=?',1,$modulo)));

}else{
       
       @$datal = Mterritorio::find('all',array('conditions' => array('status=? AND modulo=? AND mdistribuidoras_id=?',1,$modulo,$distribuidora))); 

}

      if($datal !=null){
            $respo = '<option value="" selected disabled>Indique el territorio</option>';
            foreach($datal as $rs){
              $respo .= '<option value="'.$rs->id.'">'.$rs->orbis.'</option>';
              $respo .= '<hidden>';
            }

       }else{
        $respo = '<option value="">No hay territorios asignados</option>';
       }

         echo $respo;
    break;

#******************************************************************************

    case 'get_territorios_e':
       
    @$data = Mterritorio::find('all',array('conditions' => array('id=?',intval($territorio))));

      if($data !=null){

            foreach($data as $rs){

               $respo = '<option value="'.$rs->id.'">'.$rs->orbis.'</option>';
               $respo .= '<hidden>';              
            }

       }else{
        $respo = '<option value="">No hay territorios asignados</option>';
       }

         echo $respo;
    break;

#******************************************************************************

    case 'get_gterritorios':

if($distribuidoras== 1 || $distribuidoras== 8 || $distribuidoras== 9 || $distribuidoras== 0){

         @$data = Mterritorio::find('all',array('conditions' => array('status=?',1)));
        
}else /*if($distribuidoras!=2 || $distribuidoras!=9)*/{
       
        @$data = Mterritorio::find('all',array('conditions' => array('status=? AND mdistribuidoras_id=?',1,$distribuidoras)));

}

        //print_r($data); exit();
      if($data !=null){
            $resp = '<option value=""selected disabled>Indique el territorio</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->orbis.'</option>';
              $resp .= '<hidden>';
            }

      }else{

            $resp = '<option value="">Indique el territorio</option>';
            foreach($data as $rs){
              $resp .= '<option value="'.$rs->id.'">'.$rs->orbis.'</option>';
              $resp .= '<hidden>';
            }

      }

         echo $resp;
    break;



#******************************************************************************

    case 'activa':

      if($id !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && ($rol ==2 || $rol ==4)){

                  $bien= Mterritorio::find($id);
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
                        Territorio activado exitosamente !.
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

    case 'get_vista':

  
if($vista == 'Vw_distribuidore'){
  @$data = Vw_distribuidore::find('all');
}else{
  @$data = Vw_cliente::find('all');
}

      if($data !=null){
               $resp = '<option value=""selected disabled>Indique dato a filtar</option>';
            foreach($data as $rs){
              $cmp=$rs->$campo;
              $resp .= '<option value="'.$cmp.'">'.$cmp.'</option>';
              $resp .= '<hidden>';
            }

       }

         echo $resp;
    break;


}//end switch
?>