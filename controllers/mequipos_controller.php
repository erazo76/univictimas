<?php
require_once '../models/Mequipo.php';
require_once '../models/Minventario.php';
date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$record = ($_POST["record"]);
@$recordado = ($_POST["recordado"]);
@$recordatorio = ($_POST["recordatorio"]);
@$l_recordado = ($_POST["l_recordado"]);
@$l_orbis = ($_POST["l_orbis"]);
@$l_record = ($_POST["l_record"]);
/***********************************/
@$valore = ($_POST["valore"]);
@$equipo = ($_POST["equipo"]);
@$equipa = ($_POST["equipa"]);
@$equipe = ($_POST["equipe"]);
@$marca = ($_POST["marca"]);
@$modelo = ($_POST["modelo"]);
@$serial = ($_POST["serial"]);
@$observaciones = ($_POST["observaciones"]);
//@$distribuidora = ($_POST["distribuidora"]);
@$busco = ($_POST["busco"]);
/**********************************/

switch ($action){
  
  case 'get_equipos':

    @$data = Minventario::find('all',array('conditions' => array('status=?',1),'order' => 'id desc'));

    if($data !=null){
             $resp = '<option value="" selected disabled> Seleccione una unidad</option>';
          foreach($data as $rs){
            $resp .= '<option value="'.$rs->id.'">'.$rs->nombre.'</option>';
            $resp .= '<hidden>';
          }

     }

       echo $resp;
    
  break;
#*******************************************************************************
case 'get_datos':

  //@$data = Minventario::find('all',array('conditions' => array('status=?',1),'order' => 'id desc'));
  @$data = Minventario::find('all',array('conditions' => array('id=?',$equipa)));
  if($data !=null){

    foreach($data as $rs){

        $resp = array(
              "marca"=>$rs->marca,
              "modelo"=>$rs->modelo
        );

    }
   // print_r($resp);exit();
    echo json_encode($resp);
  }else{
    $resp = array();
    echo json_encode($resp);
  }
  
break;
#*******************************************************************************

  case 'restar_inv':
       
      @$data = Mequipo::find('all',array('conditions' => array('mrequerimientos_id=?',$valore)));     
  
        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $hoy = date('d-m-Y');
        
        foreach($data as $rs){
                $equip = $rs->equipo;
                $invo = Minventario::find('all',array('conditions' => array('id=?',$equip)));
              foreach($invo as $inv){
               
                $inv->cantidad -= 1;
                $inv->user_modify = $usuario_id;
                $inv->updated = $hoy;
                $inv->save();  
              }      
        }
   

  break;

#*******************************************************************************

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

                  $acti= Mequipo::find($record);
                  $acti->user_modify = $usuario_id;
                  $acti->updated = $hoy;
                  $acti->status = 0;

                  if($acti->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Ok!
                        </h4>
                        Se retiro la unidas del listado.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Error!
                        </h4>
                         Algo salio mal al retirar la unidad del listado.
                        </div>');

                  }
                 // echo json_encode($respuesta);
        }else{

              $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Detengase!
                  </h4>
                  Transacción denegada!
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

      @$data = Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=?',$record)));

      if($data !=null){

        foreach($data as $rs){

            $resp[] = array(
                  "tipo"=>$rs->d_tipo,
                  "concepto"=>$rs->d_concepto,
                  "cantidad"=>$rs->d_cantidad,
                  "medida"=>$rs->d_medida,
                  "costo"=>$rs->d_costo,
                  "observaciones"=>$rs->d_obs

            );

        }
       // print_r($resp);exit();
        echo json_encode($resp);
      }else{
        $resp[] = array();
        echo json_encode($resp);
      }

    }
  break;

#*******************************************************************************
  case 'search_act':
    
      @$data = Mequipo::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

      if($data !=null){//si consigue al menos un registro 

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
    
      @$data = Mequipo::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

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

      if($equipo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Seleccione una unidad de negocio.
            </div>');

      }else  if($serial ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el serial de la udnidad de negocio.
            </div>');

      }else  if($observaciones ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese las observaciones.
            </div>');

      }else{

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $tempo = new Mequipo();
            $tempo->equipo = $equipo;
            $tempo->marca = $marca;
            $tempo->modelo = $modelo;            
            $tempo->serial = $serial;            
            $tempo->observaciones = $observaciones;
            $tempo->mrequerimientos_id = 1;
            $tempo->user_create = $usuario_id;
            $tempo->created = $hoy;
                  if($tempo->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Excelente!
                        </h4>
                        Se registro la solicitud de entrega exitosamente!.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Error!
                        </h4>
                        Algo salio mal al registrar la solicitud de entrega.
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

#******************************************************************************/
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

        if($usuario_id !=""){

                  $activoro = Mrequerimiento::find('all',array('conditions' => array('id=?',intval($recordado))));
                
                    foreach ($activoro as $rs) {
                                         
                      $ideado=$rs->id;

                    } 

                    $consultada=Mequipo::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

                    if( $consultada!=null) {
                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->mrequerimientos_id = $ideado;
                          $activoros->save();

                        }    
                      } 

        }


          //echo json_encode($respuesta);

  }
  break;  

}//end switch
?>
