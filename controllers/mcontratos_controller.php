<?php
require_once '../models/Mcontrato.php';
require_once '../models/Mrequerimiento.php';
date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$cos_contrato = ($_POST["cos_contrato"]);
@$num_contrato = ($_POST["num_contrato"]);
@$id = 1;


/**********************************/

switch ($action){
  
    case 'sumar_costo':

      @$data = Mdetalle::find_by_sql('SELECT sum(d_costo_t) as tot_cos from mdetalles where mrequerimientos_id = 1 and status = 1');

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

      if($num_contrato==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el número de contrato.
            </div>');
      }else if($cos_contrato==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la asignación del contrato.
            </div>'); 

      }else{  

        $consulta = Mcontrato::find('all',array('conditions' => array('num_contrato=?',$num_contrato)));

          if($consulta==null){  //(B) si no existe lo guarda...

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $segme = new Mcontrato();
            $segme->num_contrato = $num_contrato;
            $segme->cos_contrato = $cos_contrato;
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

          }else{ 

              $respuesta = array('resultado'=>'alert','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El contrato ['.$num_contrato.'] ya se encuentra registrado.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }
             echo json_encode($respuesta);

  break;
#*******************************************************************************
  case 'edit':

    if($num_contrato==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el número de contrato.
          </div>');
    }else if($cos_contrato==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese la asignación del contrato.
          </div>'); 

    }else{

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $depa= Mcontrato::find($id);
            $depa->cos_contrato = $cos_contrato;
            $depa->num_contrato = $num_contrato;
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
  case 'search':
        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $hoy = date("d-m-Y");

      @$data = Mcontrato::find('all');

      if($data !=null){

        foreach($data as $rs){

            $resp = array(
                  "num_contrato"=>$rs->num_contrato,
                  "cos_contrato"=>$rs->cos_contrato,
                  "estado"=>"si"
            );

        }
       // print_r($resp);exit();
        echo json_encode($resp);
      }else{
        $resp = array(
          "num_contrato"=>0,
          "cos_contrato"=>0,
          "estado"=>"no"   
        );
        echo json_encode($resp);
      }
  break;

#*******************************************************************************
  case 'search_act':
    session_start();
    $usuario_id = $_SESSION['idusuariox'];
    $hoy = date("d-m-Y");

    @$data = Mcontrato::find('all');
    if($data !=null){
      foreach($data as $rs){
          @$individual = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as indi_cos from mrequerimientos WHERE status=1 AND tipo1 <>9 AND tipo2=6 AND tipo3=5;");  
          @$reubicacion = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as reub_cos from mrequerimientos WHERE status=1 AND tipo2 <>6 AND tipo1=9 AND tipo3=5;"); 
          @$colectiva = Mrequerimiento::find_by_sql("SELECT sum(costo_total) as cole_cos from mrequerimientos WHERE status=1 AND tipo3 <>5 AND tipo1=9 AND tipo2=6;");
          
          if($individual !=null){
            foreach($individual as $r1){
              if($r1->indi_cos==null){
              $reg1=0;
              }else{
              $reg1 = $r1->indi_cos;      
              }
            }        
          }
          
          if($reubicacion !=null){
            foreach($reubicacion as $r2){
              if($r2->reub_cos==null){
              $reg2=0;
              }else{
              $reg2 = $r2->reub_cos;      
              }
            }        
          }

          if($colectiva !=null){
            foreach($colectiva as $r3){
              if($r3->cole_cos==null){
              $reg3=0;
              }else{
              $reg3 = $r3->cole_cos;      
              }
            }        
          }
          $reg4=$rs->cos_contrato-($reg1+$reg2+$reg3);
          @$resp = array(
                    "num_contrato"=>$rs->num_contrato,
                    "cos_contrato"=>$rs->cos_contrato,
                    "estado"=>"si",
                    "cos_indi"=>number_format($reg1,1,',', ' '),
                    "cos_reub"=>number_format($reg2,1,',', ' '),
                    "cos_cole"=>number_format($reg3,1,',', ' '),
                    "restan"=>number_format($reg4,1,',', ' '),
          );
        
          echo json_encode($resp);
        } 
    
    }else{
          @$resp = array(
            "num_contrato"=>0,
            "cos_contrato"=>0,
            "estado"=>"no", 
            "cos_indi"=>0,
            "cos_reub"=>0,
            "cos_cole"=>0,
            "restan"=>0   
          );
          echo json_encode($resp);
    }   
     

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

    case 'temporal':

      if($tipo ==""){

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
            $hoy = date('d-m-Y');

            $tempo = new Mdetalle();
            $tempo->d_tipo = $tipo;
            $tempo->d_concepto = $concepto;
            $tempo->d_cantidad = $cantidad;
            $tempo->d_medida = $medida;
            $tempo->d_costo = $costo;
            $tempo->d_costo_t = $costo*$cantidad;
            $tempo->d_obs = $observaciones;
            $tempo->mrequerimientos_id = 1;
            $tempo->user_create = $usuario_id;
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

                        foreach ($consultada as $activoros) {
                                                
                          $activoros->user_modify = $usuario_id;
                          $activoros->updated = $hoy;
                          $activoros->mrequerimientos_id = $ideado;
                          $activoros->save();

                        }    
                      

        }


          //echo json_encode($respuesta);

  }
  break;  

}//end switch
?>
