<?php
require_once '../models/Mrequerimiento.php';
require_once '../models/Minventario.php';
require_once '../models/Mdetalle.php';
require_once '../models/Mdepartamento.php';
require_once '../models/Mmunicol.php';
require_once '../models/Mcpoblado.php';

date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$id = ($_POST["id"]);
@$plus = ($_POST["plus"]);
@$record = ($_POST["record"]);

@$nombre = ($_POST["nombre"]);
@$fecha1 = ($_POST["fecha1"]);
@$marca = ($_POST["marca"]);
@$modelo = ($_POST["modelo"]);
@$cantidad = ($_POST["cantidad"]);
@$descripcion = ($_POST["descripcion"]);

/***********************************/

switch ($action){

  case 'contar_id':

    @$data = Mrequerimiento::find('all');

  if($data !=null){
    $contados= count($data)+1;
      
   }else{
    $contados= count($data)+1;
   }

     
     echo json_encode($contados);
break;

#******************************************************************************
   case 'add':

      if($nombre ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar el nombre del equipo.
            </div>');

      }else if($marca ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar la marca del equipo.
            </div>');

      }else if($modelo ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar el modelo del equipo.
            </div>');

      }else if($cantidad ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar la cantidad inicial de equipos.
            </div>');

      }else if($descripcion ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar una dessripción breve del equipo.
            </div>');

      }else{  //(A)
       
            session_start();
            @$usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');           

            $alia = new Minventario();     
            $alia->nombre = $nombre;
            $alia->marca = $marca;
            $alia->modelo = $modelo;
            $alia->cantidad = $cantidad;
            $alia->observacion = $descripcion;
            $alia->user_create = $usuario_id;
            $alia->created = $hoy;
            
             if($alia->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Excelente!
                    </h4>
                    Los datos han sido registrados exitosamente!.
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
        }
            echo json_encode($respuesta);

  break;
  #*******************************************************************************
  
  case 'del_temp':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        
        $alia2 = Mtemporale::find($record);
        $alia2 ->delete();
  break;

    #*******************************************************************************
  
  case 'get_recuperados':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
         $rolex = $_SESSION['rolx'];
         $resp = '';
     if($rolex==3){

        @$data = Mtemporale::find('all',array('conditions' => array('completado>? AND user_create=?',1,$usuario_id)));

 
      //print_r($data);exit();
      //exit();
      if($data !=null){

   
              $resp = count($data);

       }else{

               $resp = '0';

       }

    echo $resp;   

}else if($rolex==4 ){

        @$data = Mtemporale::find('all',array('conditions' => array('completado>?',1)));

 
      //print_r($data);exit();
      //exit();
      if($data !=null){

   
              $resp = count($data);

       }else{

               $resp = '0';

       }
    echo $resp;   

}else{
    echo $resp; 
}
         

  break;

    #*******************************************************************************
  case 'search_rec':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rolex = $_SESSION['rolx'];
        $hoy = date("d-m-Y");
    
      @$data = Mtemporale::find('all');
      
      if($data !=null){

        foreach($data as $rs){
//echo($rs->id);exit();
          $resp =$rs->id;

        }

        
       }
  
        echo $resp;

  break;

    #*******************************************************************************
  
  case 'get_incompletos':

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rolex = $_SESSION['rolx'];
     if($rolex==3){
        @$data = Maliado::find('all',array('conditions' => array('completado=? AND user_create=?',0,$usuario_id)));
           
      //print_r($data);
      //exit();
      if($data !=null){


              $resp = count($data);

       }else{

               $resp = '0';

       }
     echo $resp; 

}else if($rolex==2  || $rolex==4 ){

        @$data = Maliado::find('all',array('conditions' => array('completado=?',0)));
           
      //print_r($data);
      //exit();
      if($data !=null){


              $resp = count($data);

       }else{

               $resp = '0';

       }
     echo $resp;  

}

  break;
#*******************************************************************************  
  case 'edit':

//echo 'la fecha es: '.$fecha1;exit();

      if($plus ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese la cantidad de equipos a agregar.
            </div>');

      }else if($descripcion ==""){

        $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Debe ingresar una dessripción breve del equipo.
            </div>');

      }else{  

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $alia = Minventario::find($record);

            $alia->cantidad = $cantidad+$plus;
            $alia->observacion = $descripcion;

        
            $alia->user_modify = $usuario_id;
            $alia->updated = $hoy;



             if($alia->save()){ // da el mensaje de guardado...

                $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-check"></i>
                    Excelente!
                    </h4>
                    Los datos han sido actualizados exitosamente!.
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

             echo json_encode($respuesta);
           }
  break;

#*******************************************************************************


#*******************************************************************************  
case 'aprobar':
  
        if($rn_nombre1 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable" >
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el primer nombre del responsable territorial.
              </div>');
  
        }else if($rn_apellido1 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el primer apellido del responsable territorial.
              </div>');
  
        }else if($rn_num_doc ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el numero de documento del responsable territorial.
              </div>');
  
        }else if($tele2 ==""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
              Ingrese el número telefónico/celualar del responsable territorial.
              </div>');
  
        }else if($correo2 == ""){
  
          $respuesta = array('deslizador'=>'1','resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
              <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
              <h4>
              <i class="icon fa fa-warning"></i>
              Alerta!
              </h4>
             Ingrese el correo electrónico del responsable territorial.
              </div>');
  
        }else{  
  
          $consulta = Mrequerimiento::find('all',array('conditions' => array('id!=?',$id)));
  
            if($consulta==!null){  //(B) si existe actualiza el responsable territorial que aprueba...
  
              session_start();
              $usuario_id = $_SESSION['idusuariox'];
              $hoy = date('d-m-Y');
  
              $alia = Mrequerimiento::find($id);
  
              $alia->user_modify = $usuario_id;
              $alia->updated = $hoy;

              $alia->rn_nombre1 = $rn_nombre1;
              $alia->rn_nombre2 = $rn_nombre2;
              $alia->rn_apellido1 = $rn_apellido1;
              $alia->rn_apellido2 = $rn_apellido2;

              $alia->rn_tdoc = $rn_tdoc;
              $alia->rn_num_doc = $rn_num_doc;
              $alia->tele2 = $tele2;
              $alia->correo2 = $correo2;

              $alia->completado = 2;
              
  
  
               if($alia->save()){ // da el mensaje de guardado...
  
                  $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                      <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                      <h4>
                      <i class="icon fa fa-check"></i>
                      Alerta!
                      </h4>
                      Se ha aprobado el requerimiento.
                      </div>');
  
              }else{
  
  
                $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                    <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                    <h4>
                    <i class="icon fa fa-ban"></i>
                    Alerta!
                    </h4>
                    Error al aprobar el requerimiento.
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
                    Este requerimiento no existe.
                    </div>');
    
          }
  
               echo json_encode($respuesta);
        }

    break;


  case 'delete':

      if($record !=null){

        session_start();
        @$usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" /*&& ($rol ==1 || $rol==4)*/){

                  $alia= Mrequerimiento::find($record);
                  $alia->user_modify = $usuario_id;
                  $alia->updated = $hoy;
                  $alia->status = 0;

                  if($alia->save()){

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

  case 'delete_rec':

      if($record !=null){

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

        if($usuario_id !="" && ($rol ==3 || $rol==4)){

                  $alia= Mtemporale::find($record);

                  if($alia->delete()){

                    $respuesta = array('resultado'=>'ok','mensaje'=>'<div class="alert alert-success alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-check"></i>
                        Alerta!
                        </h4>
                        Registro descartado !.
                        </div>');

                  }else{


                    $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <h4>
                        <i class="icon fa fa-ban"></i>
                        Alerta!
                        </h4>
                        Error al descartar el registro.
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
        @$usuario_id = $_SESSION['idusuariox'];
        
//echo($usuario_id);exit();
        $rol = $_SESSION['rolx'];
        $hoy = date("d-m-Y");

      @$data = Minventario::find('all',array('conditions' => array('id=?',$record)));

      if($data !=null){

        foreach($data as $rs){

          $resp = array(
                  "id"=>$rs->id,
                  "nombre"=>$rs->nombre,                  
                  "marca"=>$rs->marca,
                  "modelo"=>$rs->modelo,
                  "cantidad"=>$rs->cantidad,
                  "descripcion"=>$rs->observacion
                 );
        }

        echo json_encode($resp);
       }

    }
    break;

//########################################################################################################################
    case 'search_a':

      if($record !=null){
  
          session_start();
          @$usuario_id = $_SESSION['idusuariox'];
          
  //echo($usuario_id);exit();
          $rol = $_SESSION['rolx'];
          $hoy = date("d-m-Y");
  
        @$data = Mrequerimiento::find('all',array('conditions' => array('id=?',$record)));
  
        if($data !=null){
  
          foreach($data as $rs){
  //echo($rs->tipos);exit();
                  
  
            $resp = array(
                    "id"=>$rs->id,
                    "nombre"=>$rs->nombre,
                    "fecha1"=>(string)$rs->fecha1->format("d-m-Y"),
                    "departamento"=>$rs->mdepartamentos_id,
                    "municipio"=>$rs->mmunicipios_id,
                    "cpoblado"=>$rs->mcpoblado_id,
  
                    "a_primario"=>$rs->a_primario,
                    "acceso1"=>$rs->acceso1,
                    "acceso2"=>$rs->acceso2,
                    "num_dir"=>$rs->num_dir,
                    "a_referencia"=>$rs->a_referencia,
                    "referencia"=>$rs->referencia,
  
                    "fecha2"=>(string)$rs->fecha2->format("d-m-Y"),
                    "fecha3"=>(string)$rs->fecha3->format("d-m-Y"),
                   // "hora1"=>date("h:i a", strtotime($rs->hora1)),
                   // "hora2"=>date("h:i a", strtotime($rs->hora2)),

                    "hora1"=>$rs->hora1,
                    "hora2"=>$rs->hora2,
  
                    "rt_nombre1"=>$rs->rt_nombre1,
                    "rt_nombre2"=>$rs->rt_nombre2,
                    "rt_apellido1"=>$rs->rt_apellido1,
                    "rt_apellido2"=>$rs->rt_apellido2,
                    "rt_tdoc"=>$rs->rt_tdoc,
                    "rt_num_doc"=>$rs->rt_num_doc,
                    "tele1"=>$rs->tele1,
                    "correo1"=>$rs->correo1,
                    "grupo"=>$rs->grupos_id,
                    "otro1"=>$rs->otro1,
  
                    "tipo1"=>$rs->tipo1,
                    "tipo2"=>$rs->tipo2,
                    "tipo3"=>$rs->tipo3,
                    "tipo4"=>$rs->tipo4,
                    
                    "arutaval"=>$rs->arutaval,
                    "apircval"=>$rs->apircval,
                    "afase"=>$rs->afase,
                    "amedida"=>$rs->amedida,
                    "idaccion"=>$rs->idaccion,
                    "entidad"=>$rs->entidad,
                    "num_vic"=>$rs->num_vic,
                    "descripcion"=>$rs->descripcion,
                    "aloja"=>$rs->aloja,
                    "trans"=>$rs->trans,
                    "t_trans"=>$rs->t_trans,
                    "to_total"=>$rs->costo_total,
                    "region"=>$rs->mregiones_id,
                    "completado"=>$rs->completado
                   );
          }
  
          echo json_encode($resp);
         }
  
      }
      break;

}//end switch

?>
