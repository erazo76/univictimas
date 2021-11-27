<?php
require_once '../models/Mfacturado.php';
require_once '../models/Msolicitude.php';
require_once '../models/Vfacturado.php';
require_once '../models/Mfacturado.php';




date_default_timezone_set('America/Bogota');

@$action = ($_POST["action"]);
@$id_fac = ($_POST["id_fac"]);
/***********************************/
@$nombre = ($_POST["nombre"]);
@$grupo = ($_POST["grupo"]);
@$grup_financ = ($_POST["grup_financ"]);


@$num_sol = ($_POST["num_sol"]);
@$fecha_registro = ($_POST["fecha_registro"]);
@$fecha_facturacion = ($_POST["fecha_facturacion"]);
@$procesar = ($_POST["procesar"]);
@$precarga = ($_POST["precarga"]);
@$costo_evento_cotizado = ($_POST["costo_evento_cotizado"]);
@$servicios_no_gravados = ($_POST["servicios_no_gravados"]);

@$pagos_a_terceros = ($_POST["pagos_a_terceros"]);
@$iva = ($_POST["iva"]);
@$servicios_gravados = ($_POST["servicios_gravados"]);




@$ejecutado_logistico = ($_POST["ejecutado_logistico"]);
@$gastos_reembolsables = ($_POST["gastos_reembolsables"]);
@$giro_fecty = ($_POST["giro_fecty"]);
@$intermediacion = ($_POST["intermediacion"]);
@$iva_intermediacion_reembolso = ($_POST["iva_intermediacion_reembolso"]);
@$ejecutado_reembolso = ($_POST["ejecutado_reembolso"]);
@$costo_tiquetes_ejecutado = ($_POST["costo_tiquetes_ejecutado"]);
@$iva_tiquetes = ($_POST["iva_tiquetes"]);
@$costo_total_tiquetes = ($_POST["costo_total_tiquetes"]);
@$costo_total_evento = ($_POST["costo_total_evento"]);


/**********************************/

switch ($action){
  case 'add':

    if($procesar){
      if($fecha_facturacion==""){
        $pasar=false;
      }else{
        $pasar=true;
        $facturar=1;

      }
    }else  if($precarga){
        $pasar=true;
        $facturar=0;
      
    }

      if($num_sol ==""){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese el Numero de la Solicitud.
            </div>');

      }else  if(!$pasar){

        $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
            <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
            <h4>
            <i class="icon fa fa-warning"></i>
            Alerta!
            </h4>
            Ingrese Fecha de la Facturación.
            </div>');

      }else{  //(A) si se escribe un nombre se consulta si ya existe...

        $consulta = Mfacturado::find('all',array('conditions' => array('mrequerimientos_id=?',$num_sol)));

          if($consulta==null){  //(B) si no existe lo guarda...

            session_start();
            $usuario_id = $_SESSION['idusuariox'];
            $hoy = date('d-m-Y');

            $segme = new Mfacturado();
            $segme->mrequerimientos_id = $num_sol;
            $segme->user_create = $usuario_id;
            $segme->created = $hoy;
            if($facturar){
              $segme->fecha_factura = $fecha_facturacion;
            }else{
              $segme->fecha_factura = $hoy;

            }
            $segme->facturado = $facturar;


            $segme->costo_evento_cotizado = $costo_evento_cotizado;
            $segme->servicios_no_gravados = $servicios_no_gravados;
            $segme->servicios_gravados = $servicios_gravados;
            $segme->pagos_a_terceros = $pagos_a_terceros;
            $segme->iva = $iva;
            $segme->ejecutado_logistico = $ejecutado_logistico;
            $segme->gastos_reembolsables = $gastos_reembolsables;
            $segme->giro_fecty = $giro_fecty;
            $segme->intermediacion = $intermediacion;
            $segme->iva_intermediacion_reembolso = $iva_intermediacion_reembolso;            
            $segme->ejecutado_reembolso = $ejecutado_reembolso;
            $segme->costo_tiquetes_ejecutado = $costo_tiquetes_ejecutado;            
            $segme->iva_tiquetes = $iva_tiquetes;
            $segme->costo_total_tiquetes = $costo_total_tiquetes;
            $segme->costo_total_evento = $costo_total_evento;




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

                  Registro inactivo . ¿Desea incluir ['.$nombre.'] en el maestro de grupos, áreas, equipos o dependencias?

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
                  El grupo, áreas, equipo o dependencia ['.$nombre.'] ya se encuentra registrado.
                  </div>');

           }
                 // echo json_encode($respuesta);
        }


     }
             echo json_encode($respuesta);

  break;
#*******************************************************************************
case 'edit':

  if($procesar){
    if($fecha_facturacion==""){
      $pasar=false;
    }else{
      $pasar=true;
      $facturar=1;

    }
  }else  if($precarga){
      $pasar=true;
      $facturar=0;
    
  }

    if($num_sol ==""){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese el Numero de la Solicitud.
          </div>');

    }else  if(!$pasar){

      $respuesta = array('resultado'=>'error','mensaje'=>'<div class="alert alert-warning alert-dismissable">
          <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
          <h4>
          <i class="icon fa fa-warning"></i>
          Alerta!
          </h4>
          Ingrese Fecha de la Facturación.
          </div>');

    }else{  //(A) si se escribe un nombre se consulta si ya existe...

    $consulta = Mfacturado::find('all',array('conditions' => array('mrequerimientos_id=?',$num_sol)));
    $id=4;

      if($consulta!=null){  //(B) si no existe lo guarda...

        session_start();
        $usuario_id = $_SESSION['idusuariox'];
        $hoy = date('d-m-Y');
        $segme = Mfacturado::find($id_fac); 

        $segme->user_modify = $usuario_id;

        if($facturar){
          $segme->fecha_factura = $fecha_facturacion;
        }else{
          $segme->fecha_factura = $hoy;

        }
        $segme->facturado = $facturar;

        $segme->costo_evento_cotizado = $costo_evento_cotizado;
        $segme->servicios_no_gravados = $servicios_no_gravados;
        $segme->servicios_gravados = $servicios_gravados;
        $segme->pagos_a_terceros = $pagos_a_terceros;
        $segme->iva = $iva;
        $segme->ejecutado_logistico = $ejecutado_logistico;
        $segme->gastos_reembolsables = $gastos_reembolsables;
        $segme->giro_fecty = $giro_fecty;
        $segme->intermediacion = $intermediacion;
        $segme->iva_intermediacion_reembolso = $iva_intermediacion_reembolso;            
        $segme->ejecutado_reembolso = $ejecutado_reembolso;
        $segme->costo_tiquetes_ejecutado = $costo_tiquetes_ejecutado;            
        $segme->iva_tiquetes = $iva_tiquetes;
        $segme->costo_total_tiquetes = $costo_total_tiquetes;
        $segme->costo_total_evento = $costo_total_evento;




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

              Registro inactivo . ¿Desea incluir ['.$nombre.'] en el maestro de grupos, áreas, equipos o dependencias?

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
              El grupo, áreas, equipo o dependencia ['.$nombre.'] ya se encuentra registrado.
              </div>');

       }
             // echo json_encode($respuesta);
    }


 }
         echo json_encode($respuesta);

break;
#*******************************************************************************


case 'search_sol':

 
    @$data = Msolicitude::find_by_sql("select  id, nombre,a_supe from Msolicitudes where id=".$num_sol." ;");
    @$data_fac = Mfacturado::find_by_sql("select  id from Mfacturados where mrequerimientos_id=".$num_sol." ;");


    if($data_fac !=null){

      foreach($data_fac as $rs_fac){
  
        $resp = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El Número de Solicitud Ya Fue Facturada. Debe Dirigirse a la Opcion Editar.
                  </div>');
      }
  
    
     }else

  if($data !=null){

    foreach($data as $rs){

      $a_supe=$rs->a_supe;
      if($a_supe==1){
        $resp = $rs->nombre;
      }else{
        $resp = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El Número de Solicitud NO HA SIDO APROBABADA Por El Supervisor !!.
                  </div>');

      }

     
    }

  
   }else{
    $resp = array('resultado'=>'error','mensaje'=>'<div class="alert alert-danger alert-dismissable">
                  <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                  <h4>
                  <i class="icon fa fa-ban"></i>
                  Alerta!
                  </h4>
                  El Número de Solicitud No Existe.
                  </div>');


   }
     echo json_encode($resp);
break;

case 'search_facturados':

   if($id_fac !=null){


      // $rol = $_SESSION['rolx'];
      $hoy = date("d-m-Y");

    //  @$data_sol = Msolicitude::find('all',array('conditions' => array('id=?',$record)));

     @$data = Mfacturado::find('all',array('conditions' => array('id=?',$id_fac)));
     
    if($data !=null){

      foreach($data as $rs){
        @$data_sol = Msolicitude::find_by_sql("select nombre from Msolicitudes where id=".$rs->mrequerimientos_id." ;");

     foreach($data_sol as $rs_n){
      $nombre=$rs_n->nombre;
     }


        $resp = array(
                "id"=>$rs->id,
                "num_sol"=>$rs->mrequerimientos_id, 
                "nombre"=>$nombre,                                   
                "fecha_factura"=>(string)$rs->fecha_factura->format("d-m-Y"),                
                "costo_evento_cotizado"=>$rs->costo_evento_cotizado,
                "servicios_no_gravados"=>$rs->servicios_no_gravados,
                "pagos_a_terceros"=>$rs->pagos_a_terceros,
                "servicios_gravados"=>$rs->servicios_gravados,
                "iva"=>$rs->iva,
                "ejecutado_logistico"=>$rs->ejecutado_logistico,
                "gastos_reembolsables"=>$rs->gastos_reembolsables,
                "giro_fecty"=>$rs->giro_fecty,
                "intermediacion"=>$rs->intermediacion,
                "iva_intermediacion_reembolso"=>$rs->iva_intermediacion_reembolso,                
                "ejecutado_reembolso"=>$rs->ejecutado_reembolso,
                "costo_tiquetes_ejecutado"=>$rs->costo_tiquetes_ejecutado,
                "iva_tiquetes"=>$rs->iva_tiquetes,
                "costo_total_tiquetes"=>$rs->costo_total_tiquetes,
                "costo_total_evento"=>$rs->costo_total_evento,
                "facturado"=>$rs->facturado

               );
      }

      echo json_encode($resp);
     }
     
   }
  
  break;  

}//end switch
?>
