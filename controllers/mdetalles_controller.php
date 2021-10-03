<?php
require_once '../models/Mdetalle.php';
date_default_timezone_set('America/Bogota');
session_start();
@$usuario_id = $_SESSION['idusuariox'];
@$id_sesion_usuario = $_SESSION['instante'];
@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$idea = ($_POST["idea"]);
@$ideco = ($_POST["ideco"]);
@$ideco2 = ($_POST["ideco2"]);

@$record = ($_POST["record"]);
@$recordado = ($_POST["recordado"]);
@$recordatorio = ($_POST["recordatorio"]);
@$l_recordado = ($_POST["l_recordado"]);
@$l_orbis = ($_POST["l_orbis"]);
@$l_record = ($_POST["l_record"]);
/***********************************/
@$dia = ($_POST["dia"]);
@$tipo = ($_POST["tipo"]);
@$concepto = ($_POST["concepto"]);
@$cantidad = ($_POST["cantidad"]);
@$medida = ($_POST["medida"]);
@$costo = ($_POST["costo"]);
@$observaciones = ($_POST["observaciones"]);
//@$distribuidora = ($_POST["distribuidora"]);
@$busco = ($_POST["busco"]);

/**********************************/

switch ($action){
  

  case 'sumar_costo':
      
    $usuario_id = $_SESSION['idusuariox'];
    $id_sesion_usuario = $_SESSION['instante'];
     if ($ideco2>0){
       $valor=$ideco2;
       $cadena= "mrequerimientos_id = $valor and";
     }else{
      $valo=0;
      $cadena="";
     }
    @$data = Mdetalle::find_by_sql('SELECT sum(d_costo_t) as tot_cos from mdetalles where '.$cadena.' status = 1');

  if($data !=null){
    foreach($data as $rs){
      if($rs->tot_cos==null){
        $contados=0;
      }else{
      $contados = $rs->tot_cos;      
      }
    }        
  }

    
    echo json_encode($contados);
break;
    
    case 'sumar_costo_temporal':
      
      $usuario_id = $_SESSION['idusuariox'];
      $id_sesion_usuario = $_SESSION['instante'];

      @$data = Mdetalle::find_by_sql('SELECT sum(d_costo_t) as tot_cos from mdetalles where id_sesion_usuario = '.$id_sesion_usuario.' and reg_temp=true and status = 1');

    if($data !=null){
      foreach($data as $rs){
        if($rs->tot_cos==null){
          $contados=0;
        }else{
        $contados = $rs->tot_cos;      
        }
      }        
    }

      
      echo json_encode($contados);
  break;
  
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

                  $acti= Mdetalle::find($record);
                

                  if($acti->delete()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se desincorporo el item al Requerimiento.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al desincorporar el item.
                        </div>');

                  }
                 // echo json_encode($respuesta);
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
case 'search_reporte':
  if($record !=null){

      session_start();
      $usuario_id = $_SESSION['idusuariox'];
      $rol = $_SESSION['rolx'];
      $hoy = date("d-m-Y");
      // $record=(int)($record);
    @$data = Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=?',$record)));

    if($data !=null){

      foreach($data as $rs){

          $resp[] = array(
                "dia"=>$rs->dia,
                "mrequerimientos_id"=>$rs->mrequerimientos_id,
                "tipo"=>$rs->d_tipo, 
                "d_concepto"=>$rs->d_concepto,
                "cantidad"=>$rs->d_cantidad,
                "d_medida"=>$rs->d_medida,
                "concepto"=>$rs->concepto,
                "medida"=>$rs->unidad_med,
                "id_categoria"=>$rs->id_categoria,
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
                  "dia"=>$rs->dia,
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
    
      @$data = Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

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
    
      @$data = Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

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

  case 'update_reg_solicitud':

    if($dia ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el día de item.
          </div>');

    }else   if($concepto ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese concepto del item.
          </div>');

    }else if($cantidad ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese la cantidad de items.
          </div>');

    }else  if($medida ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese la unidad de medida del item.
          </div>');

    }else  if($costo ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el costo del item.
          </div>');

    }else  if($observaciones ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el las observaciones.
          </div>');

    }else{

          session_start();
          $usuario_id = $_SESSION['idusuariox'];
          $id_sesion_usuario = $_SESSION['instante'];
          $hoy = date('d-m-Y');

          $tempo = new Mdetalle();
          $tempo->dia = $dia;
          $tempo->d_tipo = $tipo;
          $tempo->d_concepto = $concepto;
          $tempo->d_cantidad = $cantidad;
          $tempo->d_medida = $medida;

          $tempo->concepto = $concepto;
          $tempo->precio_uni = $costo;
          $tempo->unidad_med = $medida;
          $tempo->id_categoria = $tipo;

          $tempo->d_costo = $costo;
          $tempo->d_costo_t = $costo*$cantidad;
          $tempo->d_obs = $observaciones;
          $tempo->mrequerimientos_id =$idea;
          $tempo->user_create = $usuario_id;
          $tempo->id_sesion_usuario = $id_sesion_usuario;
          $tempo->reg_temp = 'false';

          $tempo->created = $hoy;
                if($tempo->save()){

                  $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4>
                      <i class="icon fa fa-check"></i>
                      Alerta!
                      </h4>
                      Se registro el item exitosamente !.
                      </div>');

                }else{


                  $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4>
                      <i class="icon fa fa-ban"></i>
                      Alerta!
                      </h4>
                      Error al registrar el item.
                      </div>');

                }
    }
      echo json_encode($respuesta);
    break;

#******************************************************************************
 
    
 #******************************************************************************

    case 'detalles_temporal':

      if($dia ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el día de item.
            </div>');

      }else if($tipo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el tipo de item.
            </div>');

      }else if($concepto ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese concepto del item.
            </div>');

      }else if($cantidad ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la cantidad de items.
            </div>');

      }else  if($medida ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la unidad de medida del item.
            </div>');

      }else  if($costo ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el costo del item.
            </div>');

      }else  if($observaciones ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el las observaciones.
            </div>');

      }else{

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $id_sesion_usuario = $_SESSION['instante'];
            $hoy = date('d-m-Y');
             if ($tipo==""){
              $tipo=8;
             }
            $tempo = new Mdetalle();

            if(!$id_sesion_usuario){
              $id_sesion_usuario=1;
            }
            $tempo->dia = $dia;
            $tempo->d_tipo = $tipo;
            $tempo->d_concepto = $concepto;
            $tempo->d_cantidad = $cantidad;
            $tempo->d_medida = $medida;

            $tempo->concepto = $concepto;
            $tempo->precio_uni = $costo;
            $tempo->unidad_med = $medida;
            $tempo->id_categoria = $tipo;

            
            $tempo->d_costo = $costo;
            $tempo->d_costo_t = $costo*$cantidad;
            $tempo->d_obs = $observaciones;
            $tempo->mrequerimientos_id = 0;
            $tempo->user_create = $usuario_id;
            $tempo->id_sesion_usuario = $id_sesion_usuario;
            $tempo->created = $hoy;
                  if($tempo->save()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Se registro el item exitosamente !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al registrar el item.
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

                    $consultada=Mdetalle::find('all',array('conditions' => array('mrequerimientos_id=? AND status=?',1,1)));

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
