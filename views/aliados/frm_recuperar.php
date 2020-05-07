<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);

?>

<?php include("../layouts/constantes.php")?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>

<form id="form" role="form" enctype="multipart/form-data">

<div class="base">

	<ul>
 		<li id="uno"> <!--################################## DATOS DE IDENTIFICACIÓN Y UBICACIÓN ##################################  -->

			<div class="col-md-12">
				<div class="box-header with-border" tabindex="-1">
						<h1 class="box-title" id="no_cli" style="color:#FF0040;" >  </h1> 
					 	<h3 class="box-title"> Datos de identificación y ubicación</h3>

				</div><!-- /.box-header -->
			</div>

			<div class="col-md-4">
		 	
		  		<div class="box box-primary">
						<input type="hidden" id="distribuidora">
						<input type="hidden" id="region">
						<input type="hidden" id="id">
						<input type="hidden" id="recuperado">
						<input type="hidden" id="lata" value=6.12>
						<input type="hidden" id="longa" value=-67.39>	

						<div class="box-body">

							<div class="form-group-sm">

<div class="row">
	<div class="col-sm-6">							
							  <label for="orbis">Código ORBIS</label>

								<div class="input-group">
								    <div class="input-group-btn">
								        <select id="s_orbis" class="btn-sm" tabindex="-1">
											<option value="0">-</option>
											<option value="1">A</option>
											<option value="2">C</option>
											<option value="3">P</option>
								        </select>
								    </div>
								    <input type="text" class="form-control bbb" id="orbis" onpaste="return false" tabindex="1" onkeypress="return esorbis(event);" onblur="alsaliro4(this.id)" placeholder="Ingrese código ORBIS Ej.: AOOO6">
								</div>
	</div>
	<div class="col-sm-6">
							
								<label>Estatus del aliado</label>
								<select id="estatus_aliado" class="form-control" multiple="multiple" tabindex="0">
									<option value="0">Activo</option>
									<option value="1">Compartido</option>
									<option value="2">Potencial</option>
								</select>
	</div>
</div>	

							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_orbis' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="nombre">Nombre del establecimiento</label>
							  <input type="text" class="form-control bbb" id="nombre" placeholder="Ingrese nombre del establecimiento"  onpaste="return false" tabindex="2" onkeypress="return esnombre(event);"  onblur="alsalir(this.id)"  >
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_nombre' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="razon">Razón social</label>
							  <input type="text" class="form-control bbb" id="razon" placeholder="Ingrese razón social"  onpaste="return false" tabindex="3" onkeypress="return esrazon(event);" onblur="alsalir(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_razon' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							   <label>Segmento</label>
							   <select id="segmento" class="form-control bbb" tabindex="4">
							   <option></option>
							   </select>
							</div>

							<div class="form-group-sm">
							  <label for="cedula">Rif/Cedula de identidad</label>

								<div class="input-group">
								    <div class="input-group-btn">
								        <select id="l_cedula" class="btn-sm" tabindex="-1">
											<option selected value="V">V</option>
											<option value="J">J</option>
											<option value="P">P</option>
											<option value="E">E</option>
											<option value="G">G</option>
								        </select>
								    </div>
							  		<input type="text" class="form-control bbb" id="cedula" placeholder="Ingrese cédula o Rif"  onpaste="return false" tabindex="5" onkeypress="return escedula(event);" onblur="alsalira(this.id)">
							  </div>
							   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_cedula' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="fecha1">Fecha primera visita</label>
							  <input class="form-control bbb" id="fecha1" data-date-format="dd-mm-yyyy"  placeholder="dia-mes-año" type="text" onpaste="return false" tabindex="6">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha1' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
							  <label for="fecha2">Ultima actualización</label>
							  <input class="form-control bbb" id="fecha2" data-date-format="dd-mm-yyyy" placeholder="dia-mes-año" type="text" onpaste="return false" disabled="true">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_fecha2' ></div>
							</div>

						</div>
		 		</div>
			</div>

			<div class="col-md-4">
		 	
		  		<div class="box box-primary">

					<div class="box-body">

							<div class="form-group-sm">
								<label>Estado</label>
								<select id="estado" class="form-control bbb" tabindex="7">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Municipio</label>
								<select id="municipio" class="form-control bbb" tabindex="8">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Parroquia</label>
								<select id="parroquia" class="form-control bbb" tabindex="9">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Poblado/ciudad</label>
								<select id="ciudad" class="form-control bbb" tabindex="10">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Sector</label>
								<select id="sector" class="form-control bbb" tabindex="11">
									<option value="0">NORTE</option>
									<option value="1">SUR</option>
									<option value="2">ESTE</option>
									<option value="3">OESTE</option>
									<option value="4">CENTRO</option>
								</select>
							</div>

						    <div class="form-group-sm">
							    <label >Acceso principal</label>
	                                <div class = "input-group">

										<span class="input-group-btn">
									      	<select id="a_principal" class="btn-sm"  tabindex="12"  >
										       	<option value="0">Avenida</option>
										       	<option value="1">Calle</option>
										       	<option value="2">Carrera</option>
										       	<option value="3">Vereda</option>
										       	<option value="4">Callejón</option>
										       	<option value="5">Carretera</option>
										       	<option value="6">Autopista</option>
											</select>
 										</span>

	  									<input type="text" id="acceso1" class="form-control bbb" placeholder="Ingrese nombre de acceso principal"  onpaste="return false" tabindex="12" onkeypress="return esacceso(event);" onblur="alsalir(this.id)">
	            					</div>
	            					<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_acceso1' class="aaa"><p></p></div>
							</div>

						    <div class="form-group-sm">
							    <label >Acceso Secundario</label>
	                                <div class = "input-group">

										<span class="input-group-btn">
									      	<select id="a_secundario" class="btn-sm"  tabindex="13"  >
										        <option value="0">Avenida</option>
										        <option value="1">Calle</option>
										        <option value="2">Carrera</option>
										        <option value="3">Vereda</option>
										        <option value="4">Callejón</option>
										        <option value="5">Carretera</option>
										        <option value="6">Autopista</option>
											</select>
 										</span>

	                                    <input type="text" id="acceso2" class="form-control bbb" placeholder="Ingrese nombre de acceso secundario"  onpaste="return false" tabindex="13" onkeypress="return esacceso1(event);" onblur="alsalir(this.id)">
	            					</div>
	            					<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_acceso2' class="aaa"><p></p></div>
							</div>

					</div>
 				</div>
			</div>

			<div class="col-md-4">
		 	
		  		<div class="box box-primary">

						<div class="box-body">

							<div class="form-group-sm">
							  <label for="referencia">Referencia</label>
							  <input type="text" class="form-control bbb" id="referencia" placeholder="Ingrese una referencia"  onpaste="return false" tabindex="14" onkeypress="return esreferencia(event);" onblur="alsalir(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_referencia' class="aaa"><p></p></div>
							</div>

							<div class="form-group-sm">
								<label>Módulo</label>
								<select id="zona" class="form-control bbb" tabindex="15">
									<option value="I">I</option>
									<option value="II">II</option>
									<option value="III">III</option>
									<option value="IV">IV</option>
									<option value="V">V</option>
									<option value="VI">VI</option>
									<option value="VII">VII</option>
									<option value="VIII">VIII</option>
									<option value="IX">IX</option>
									<option value="X">X</option>
									<option value="XI">XI</option>
									<option value="XII">XII</option>
									<option value="XIII">XIII</option>
									<option value="XIV">XIV</option>
									<option value="XV">XV</option>
									<option value="XVI">XVI</option>
									<option value="XVII">XVII</option>
									<option value="XVIII">XVIII</option>
									<option value="XIX">XIX</option>
									<option value="XX">XX</option>
			 					</select>
							</div>

							<div class="form-group-sm">
								<label>Territorio</label>
								<select id="territorio" class="form-control bbb" tabindex="16">
								<option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Territorio geográfico</label>
								<select id="territorio_g" class="form-control bbb" tabindex="17">
								<option></option>
								</select>
							</div>
							<div class="focusguard" id="guardialat" tabindex="18"></div>
						   </div>
		 		</div>

					<div class="box-header with-border">
						<h3 class="box-title">Coordenadas geográficas</h3>
					</div><!-- /.box-header -->

				<div class="box box-primary">

						  <div class="box-body">

							<div class="form-group-sm">
							  <label for="latitud">Latitud</label>

								<div class="input-group">
								    <span class="input-group-addon"><span class="fa fa-plus"></span>
									
								    </span>
								     <input type="text" class="form-control bbb" id="latitud" placeholder="Ingrese latitud"  onpaste="return false" tabindex="19" onkeypress="return eslatitud(event);" onblur="alsalira2(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_latitud"></span>
									
								    </span>									
								</div>
						   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_latitud' class="aaa"><p></p></div>
							</div>            

							<div class="form-group-sm">
							  <label for="longitud">Longitud</label>

								<div class="input-group">
								    <span class="input-group-addon"><span class="fa fa-minus"></span>
									
								    </span>
								    <input type="text" class="form-control bbb" id="longitud" placeholder="Ingrese longitud"  onpaste="return false" tabindex="20" onkeypress="return eslongitud(event);" onblur="alsalira3(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_longitud"></span>
									
								    </span>									
								</div>
						   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_longitud' class="aaa"><p></p></div>
							</div> 


							<div class="focusguard" id="guardia1" tabindex="21"></div>
						  <!-- /.box-body -->
						   </div>
		 		</div><!-- /.box -->
			</div>
		</li>

		<li id="dos"> <!--################################## DATOS DE CONTACTO Y COMERCIALES ##################################  -->

			<div class="col-md-4">

				<div class="box-header with-border">
						
					 	<h3 class="box-title">Datos de contacto</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">
						<!-- form start -->
						<div class="box-body">

							<div class="form-group-sm">
							  <label for="propietario">Dueño/Responsable del establecimiento</label>
							  <input type="text" class="form-control ccc" id="propietario" placeholder="Ingrese nombre del dueño/responsable"  onpaste="return false" tabindex="22" onkeypress="return espropietario(event);" onblur="return esnombre2(this.value);">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_propietario' ></div>
							</div>

								<div id="confirma_nombre">
									<ul><li id="conf_nom" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="tele1">Teléfono de contacto principal</label>
							  <input type="text" class="form-control ccc" id="tele1" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="23" onkeypress="return estele1(event);" onblur="alsalir3(this.id)" >
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele1' ></div>
							</div>

								<div id="confirma_telefono">
									<ul><li id="conf_tel" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="tele2">Teléfono de contacto secundario</label>
							  <input type="text" class="form-control ccc" id="tele2" placeholder="Ingrese un número telefónico"  onpaste="return false" tabindex="24" onkeypress="return estele2(event);" onblur="alsalir3(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_tele2' ></div>
							</div>

								<div id="confirma_telefono2">
									<ul><li id="conf_tel2" style="color:#fff;text-align:center" ></li></ul>
								</div>

							<div class="form-group-sm">
							  <label for="correo1">Correo electrónico</label>
							  <input type="text" class="form-control ccc" id="correo1" placeholder="Ingrese un correo electrónico"  onpaste="return false" tabindex="25" onkeypress="return escorreo(event);" onblur="alsalir3(this.id)">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_correo1' ></div>
							</div>

								<div id="confirma_correo">
									<ul><li id="conf_cor" style="color:#fff;text-align:center" ></li></ul>
								</div>

						</div><!-- /.box-body -->
		 		</div><!-- /.box -->
			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title">Datos Comerciales</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<!-- form start -->
						<div class="box-body">



							<div class="form-group">
								<label>Frecuencia de visita</label></br>
								<select id="dias" class="form-control" multiple="multiple" tabindex="26">
									<option value="0">Lunes</option>
									<option value="1">Martes</option>
									<option value="2">Miercoles</option>
									<option value="3">Jueves</option>
									<option value="4">Viernes</option>
									<option value="5">Sabado</option>
								</select>
							</div>

							<div class="form-group-sm">
							  <label for="caja_t">Total de cajas semanales</label>
							  <input type="text" class="form-control ccc" id="caja_t" placeholder="Ingrese total de cajas semanales"  onpaste="return false" tabindex="0" onkeypress="return escajat(event);" onblur="alsalir4(this.id);sig_1()">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_caja_t' ></div>
							</div>

							<div class="form-group-sm">
							  <label for="caja_p">Cajas propias semanales</label>
							  <input type="text" class="form-control ccc" id="caja_p" placeholder="Ingrese cajas propias semanales"  onpaste="return false" tabindex="28" onkeypress="return escajap(event);" onblur="alsalir4(this.id);menor()">
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_caja_p' ></div>
							</div>

							<div class="form-group-sm">
							  <label for="caja_o">Cajas objetivo semanales</label>
							  <input type="text" class="form-control" id="caja_o" placeholder="Cajas  objetivo semanales" readonly="true" onfocus="cajas_obj();" tabindex="29">
 							</div>

							<div class="form-group-sm">
								<label>Medio de despacho</label>
								<select id="despacho" class="form-control ccc" tabindex="30" >
								    <option value="0">Independiente</option>
								    <option value="1">Directo</option>
								    <option value="2">Avance</option>
								</select>
							</div>

						 </div><!-- /.box-body -->

		 		</div><!-- /.box -->
			</div>

			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title"></h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<!-- form start -->
						<div class="box-body">

						    <div class="form-group-sm">
							  <label>Descuento</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="31" id="descu">
	                                  </span>
	                                   	<select id="descuento" class="form-control ccc" tabindex="32" disabled>
									      <option value="0">0 %</option>
									      <option value="1">1 %</option>
									      <option value="2">1,5 %</option>
									      <option value="3">2 %</option>
									      <option value="4">2,5 %</option>
									      <option value="5">3 %</option>
									      <option value="6">3,5 %</option>
									      <option value="7">4 %</option>		
									      <option value="8">4,5 %</option>
									      <option value="9">5 %</option>								      
							            </select>
	            				</div>
							</div>


							<div class="form-group-sm">
							  <label>Línea seca</label>

								<div class="input-group">
								    <input type="text"  class="form-control ccc" id="seca" placeholder="Indique productos línea seca propios"  onpaste="return false" tabindex="33" onkeypress="return eslineaseca(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_seca"></span>
									
								    </span>									
								</div>
						   
							  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_seca' ></div>
							</div>  

							<div class="form-group-sm">
								<label>Refrigerado competencia</label>
								<div class="input-group">
									<input type="text"  class="form-control ccc" id="rf_competencia" placeholder="Indique productos refrigerados de la competencia"  onpaste="return false" tabindex="34" onkeypress="return esrefcomp(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_rcompetencia"></span>
									
								    </span>									
								</div>
								
								
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_rf_competencia' ></div>
							</div>

							<div class="form-group-sm">
								<label>Línea seca competencia</label>
								<div class="input-group">
									<input type="text"  class="form-control ccc" id="ls_competencia" placeholder="Indique productos línea seca de la competencia"  onpaste="return false" tabindex="35" onkeypress="return eslineasecomp(event);" onblur="alsalira(this.id)">
								    <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_scompetencia"></span>
									
								    </span>								
								</div>
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_ls_competencia' ></div>
							</div>

							<div class="focusguard" id="guardia2" tabindex="36"></div>

						</div><!-- /.box-body -->

		 		</div><!-- /.box -->

			</div>
		</li>

		<li id="tres"><!--################################## DATOS PUBLICITARIOS Y DE ACTIVOS ##################################  -->

<div class="row">
			<div class="col-md-4">

				<div class="box-header with-border">
					 	<h3 class="box-title" >Datos publicitarios y de neveras</h3>
				</div><!-- /.box-header -->

		  		<div class="box box-primary">

						<div class="box-body">

						    <div class="form-group">
							  <label>Neveras propias</label>
	                            <div class = "input-group">
								      <span class = "input-group-addon">
	                                     <input type = "checkbox" tabindex="37" id="a_propio">
	                                  </span>
	                                   	<select id="lab_propio" class="form-control" tabindex="-1" disabled>
									      <option value="0">No existen neveras</option>
									      <option value="1">Exiten neveras</option>
    						            </select>	                                  
									  <span class="input-group-addon" ><span class="fa fa-question-circle" id="h_apropios"></span>
									
								      </span>	
	            				</div>
							</div>

							<div class="form-group">
								<label>Otras neveras</label></br>
								<select id="activo" class="form-control" multiple="multiple" tabindex="38" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<!--<option value="0">Propios</option>-->
								</select>
							</div>

							<div class="form-group">
								<label>Toldos</label></br>
								<select id="toldo" class="form-control" multiple="multiple" tabindex="0" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
									
								</select>
							</div>

							<div class="form-group">
								<label>Avisos</label></br>
								<select id="aviso" class="form-control" multiple="multiple" tabindex="0" >
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
								</select>
							</div>

							<div class="form-group">
								<label>Fachadas</label></br>
								<select id="fachada" class="form-control" multiple="multiple" tabindex="0">
									<option value="4">Ninguno</option>
									<option value="1">Competencia</option>
									<option value="2">Propietario</option>
									<option value="3">Distribuidor</option>
									<option value="0">Propios</option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Observaciones</label>
								<input type="text"  class="form-control" id="observacion" placeholder="Ingrese observaciones"  onpaste="return false" tabindex="0" onkeypress="return esobservacion(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_observacion' ></div>
							</div>
						</div>

						  <div class="box-footer">
							<button id="save" type="button" class="btn btn-success" tabindex="0"><i class="fa fa-fw fa-save"></i>Guardar</button>
							<button id="exit" type="button" class="btn btn-primary pull-right" tabindex="-1"><i class="fa fa-fw fa-reply"></i>Regresar</button>
							<!--<button id="cancelar" type="button" class="btn btn-primary" tabindex="-1"><i class="fa fa-fw fa-times"></i>Cancelar</button>-->
						  </div>

				</div><!-- /.box-body -->


		 	</div>

			<div class="col-md-8">
<div id="oculto" style='display:none;'>
	
		
					<div class="box-header with-border">
					 	<h3 class="box-title">Neveras propias</h3>
					</div><!-- /.box-header -->
	<div class="box">			
					<div class="box-body dataTables_wrapper form-inline dt-bootstrap">
							<table id="tabla" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>Id</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Serial</th>
										<th>Activo fijo</th>
										<th width="131px">Comodato N°</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
								<tfoot>
									<tr>
										<th>Id</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Serial</th>
										<th>Activo fijo</th>
										<th width="131px">Comodato N°</th>
									</tr>
								</tfoot>
							</table>
					</div>
				
					<div class="box-footer">
						<button id="agregar" type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Agregar activo</button>
					   	<button id="quitar" type="button" class="btn btn-danger"><i class="fa fa-fw fa-minus"></i>Desincorporar activo</button>
					</div>
	</div>
</div>			 
			</div><!-- /.box-body -->
</div>

	    </li>
	</ul>
</div>

</form>

<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">Activo</h4>
			<div class="message1"></div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  <div class="box box-primary">

					<div class="box-header with-border"></div><!-- /.box-header -->
					<!-- form start -->
					  <div class="box-body">

							<div class="form-group-sm">
								<label>Marca</label>
								<select id="a_marca"   class="form-control" >
								    <option></option>
								</select>
							</div>

							<div class="form-group-sm">
								<label>Modelo</label>
								<input type="text"  class="form-control" id="a_modelo"  placeholder="Ingrese modelo del activo"  onpaste="return false" onkeypress="return esa_modelo(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_modelo' ></div>
							</div>

							<div class="form-group-sm">
								<label>Serial</label>
								<input type="text"  class="form-control" id="a_serial"  placeholder="Ingrese serial del activo"  onpaste="return false" onkeypress="return esa_serial(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_serial' ></div>
							</div>

							<div class="form-group-sm">
								<label>Activo fijo</label>
								<input type="text"  class="form-control" id="a_activo_f"  placeholder="Ingrese el número de activo fijo (LLA-000000)"  onpaste="return false" onblur="alsalira3(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_activo_f' ></div>
							</div>

							<div class="form-group-sm">
								<label>Número de comodato</label>
								<input type="text"  class="form-control" id="a_comodato"  placeholder="Ingrese el número de comodato"  onpaste="return false" onkeypress="return esa_comodato(event);" onblur="alsalira(this.id)">
								<div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_a_comodato' ></div>
							</div>

					  </div><!-- /.box-body -->

				  </div><!-- /.box -->

				</div>
			</div>
							      <div class="modal-footer">
							      		<button id="close1" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Incluir</button>
							      		<button id="cancelar2" type="button" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Cancelar</button>

							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<form id="form" role="form" enctype="multipart/form-data" >
  <div class="modal-dialog modal-lm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="contenido-modal">
         <h4 class="modal-title" id="myModalLabel1">Referencia geográfica</h4>
			<div class="message1"></div>
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				  <!-- general form elements -->
				  <div class="box box-primary">

					<div class="box-header with-border"></div><!-- /.box-header -->
					<!-- form start -->
					  <div class="box-body">

						<div id="weathermap">
							<!--<div class='custom-popup' id="map" style="height: 440px; border: 1px solid #AAA;"></div>-->
						</div>

					  </div><!-- /.box-body -->

				  </div><!-- /.box -->

				</div>
			</div>
							      <div class="modal-footer">
							      		<!--<button id="close3" type="button" class="btn btn-success" ><i class="fa fa-fw fa-save"></i>Puntear</button>-->
							      		<button id="cancelar3" type="button" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Cancelar</button>
							      </div>
        </div>
      </div>
    </div>
  </div>
</form>                   
</div>

						  <div class="box-footer">
							<button id="izquierda" type="button" class="btn btn-primary" disabled tabindex="-1"><i class="fa fa-arrow-left"></i>Anterior</button>

							<button id="derecha" type="button" class="btn btn-primary pull-right" tabindex="-1">Siguiente<i class="fa fa-arrow-right"></i></button>
						  </div>

<script language="JavaScript" src="../../plugins/maxLength/maxLength.js"></script>
<script type="text/javascript" src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/datepicker/locales/bootstrap-datepicker.es.js" charset="UTF-8"></script>
<script src="../../plugins/unslider/unslider-min.js"></script>
<script type="text/javascript" src="../../js/bootstrap-multiselect.js"></script>
<script language="JavaScript" src="../../plugins/mask/jquery.mask.min.js"></script>
<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<script src="../../plugins/balloon/jquery.balloon.min.js"></script>
<script src="../../plugins/leaflet/leaflet.js"></script>
<script src="../../plugins/leaflet/leaflet.label.js"></script>

<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<link rel="stylesheet" href="../../css/style_format_pass.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css" type="text/css"/>
<link rel="stylesheet" href="../../plugins/unslider/unslider.css">
<link rel="stylesheet" href="../../plugins/leaflet/leaflet.css"/>


 <script type="text/javascript">

$(document).ready(function() {

	$.post( "../../controllers/mactivos_controller", { action: "search_act_delete"}).done(function( data ) {},"json");

$("#latitud" ).click(function() {

		var alata= parseFloat(document.getElementById('lata').value/*6.12*/); 
		var alonga= parseFloat(document.getElementById('longa').value/*-67.39*/);
//alert(alata);
//alert(alonga);
document.getElementById('weathermap').innerHTML = "<div class='custom-popup' id='map' style='height: 440px; border: 1px solid #AAA;'></div>";
	var enlinea=1;
	if(navigator.onLine){
		enlinea=1;
	} else {
		enlinea=0;
	}

		var map = L.map('map', {

		    center: [alata, alonga ],
		    minZoom: 6,
		    maxZoom: 18,
		    zoom: 9

		});

		var basemap = new L.TileLayer.WMS('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    					subdomains: ['a','b','c']
		}).addTo(map);		


var popup = L.popup();
var marker = L.marker([alata, alonga]).addTo(map);
map.on('click', function(e) {
    //alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        
        popup.setLatLng(e.latlng);
        popup.setContent(e.latlng.lng + ", "+ e.latlng.lat);
        popup.openOn(map);

    						$.confirm({
						    title: '¿ Desea agregar estas coordenadas a la ficha del aliado?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

						    	var latitu = e.latlng.lat;
						    	var longitu = -1*(e.latlng.lng);
						    			
						    		latitu=(latitu.toFixed(6)).toString();	
						    		longitu=(longitu.toFixed(6)).toString();
						    		
						    		if(latitu.substr(1,1)=='.'){
						    			latitu='0'+latitu;
    								}

						    	$('#latitud').val(latitu);
						    	$('#longitud').val(longitu);
						    	$('#modal2').modal('toggle');
						    	//map.closePopup();
						       	document.getElementById('ms_latitud').innerHTML = '';
						    	setTimeout(function(){$('#longitud').focus()}, 50);
							},

						    cancel: function(){

							}
						});	


});
				if(enlinea==1){

					$('#latitud').focus();

    						$.confirm({
						    title: '¿Desea indicar las coordenadas utilizando un mapa?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						cancelButtonClass: 'btn-success',

						    confirm: function(){

								$('#modal2').modal({backdrop: 'static',keyboard: false});
									$('body').on('shown.bs.modal', function (e) {
									    setTimeout(function(){ map.invalidateSize()}, 500);
									});								
								$('#latitud').focus();
			
							},

						    cancel: function(){
						    	$('#latitud').focus();
						    	map.remove();
							}
						});	

    			}else{

    				$('#latitud').focus();

    			}

});


$("#guardialat").focusin(function(event) {

		var alata= parseFloat(document.getElementById('lata').value/*6.12*/); 
		var alonga= parseFloat(document.getElementById('longa').value/*-67.39*/);
//alert(alata);
//alert(alonga);
document.getElementById('weathermap').innerHTML = "<div class='custom-popup' id='map' style='height: 440px; border: 1px solid #AAA;'></div>";
	var enlinea=1;
	if(navigator.onLine){
		enlinea=1;
	} else {
		enlinea=0;
	}

		var map = L.map('map', {

		    center: [alata, alonga ],
		    minZoom: 6,
		    maxZoom: 18,
		    zoom: 9

		});

		var basemap = new L.TileLayer.WMS('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    					subdomains: ['a','b','c']
		}).addTo(map);		


var popup = L.popup();
var marker = L.marker([alata, alonga]).addTo(map);
map.on('click', function(e) {
    //alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
        
        popup.setLatLng(e.latlng);
        popup.setContent(e.latlng.lng + ", "+ e.latlng.lat);
        popup.openOn(map);

    						$.confirm({
						    title: '¿ Desea agregar estas coordenadas a la ficha del aliado?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

						    	var latitu = e.latlng.lat;
						    	var longitu = -1*(e.latlng.lng);
						    			
						    		latitu=(latitu.toFixed(6)).toString();	
						    		longitu=(longitu.toFixed(6)).toString();
						    		
						    		if(latitu.substr(1,1)=='.'){
						    			latitu='0'+latitu;
    								}

						    	$('#latitud').val(latitu);
						    	$('#longitud').val(longitu);
						    	$('#modal2').modal('toggle');
						    	//map.closePopup();
						       	document.getElementById('ms_latitud').innerHTML = '';
						    	setTimeout(function(){$('#longitud').focus()}, 50);
							},

						    cancel: function(){
						    //map.off();
							}
						});	


});

				if(enlinea==1){

					$('#latitud').focus();

    						$.confirm({
						    title: '¿Desea indicar las coordenadas utilizando un mapa?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						cancelButtonClass: 'btn-success',

						    confirm: function(){

								$('#modal2').modal({backdrop: 'static',keyboard: false});
									$('body').on('shown.bs.modal', function (e) {
									    setTimeout(function(){ map.invalidateSize()}, 500);
									});								
								$('#latitud').focus();
			
							},

						    cancel: function(){
						    	$('#latitud').focus();
						    	map.remove();
							}
						});	

    			}else{

    				$('#latitud').focus();

    			}

});

$( "#orbis" ).blur(function() {

  	$.post( "../../controllers/maliados_controller", { action: "search_orbis_2",orbis:$("#orbis").val(),sorbis:$("#s_orbis").val(),record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

			
			var parsedJson = $.parseJSON(data);

				$(".message").html(parsedJson.mensaje);
//alert(parsedJson.mensaje);
					if(parsedJson.resultado == 'error'){

						setTimeout(function(){
							$(".alert").alert('close');
							$('#orbis').focus();
						}, 3000);

					}else{


					}

	},"json");

});
//$('#potencia').attr('checked',true);

//$('#estatus_aliado > option[value="0"]').attr('selected', 'selected');

//$('#dias > option[value="0"]').attr('selected', 'selected');
//$('#toldo > option[value="4"]').attr('selected', 'selected');
//$('#aviso > option[value="4"]').attr('selected', 'selected');
//$('#fachada > option[value="4"]').attr('selected', 'selected');
//$('#activo > option[value="4"]').attr('selected', 'selected');


//MASCARAS DE VALIDACION ########################################

$("#s_orbis").change(function() {



taco=document.getElementById('s_orbis').value;

		if(taco==0 || taco==3){

			$('#estatus_aliado').multiselect('deselect', ['0']);
			$('#estatus_aliado').multiselect('select', ['2']);
			$('#estatus_aliado').multiselect("disable");
	
				if(taco==0){
					$('#orbis').val('SIN CÓDIGO ORBIS');
				}else{
					$('#orbis').val('');
				}

			$('#orbis').focus();

		}else{

			$('#estatus_aliado').multiselect('deselect', ['2']);
			$('#estatus_aliado').multiselect('select', ['0']);
			$('#estatus_aliado').multiselect("enable");
			$('#orbis').val('');
			$('#orbis').focus();

		}
});

$('#orbis').mask('0000', {

  });

$('#cedula').mask('A000000000', {


    	//placeholder: "Ingrese código ORBIS Ej.: AOOO6"

  });

$('#tele1').mask('A000-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[0]/, optional: false

     		        }

    	  },

    	//placeholder: "Ingrese código ORBIS Ej.: AOOO6"

  });

$('#tele2').mask('A000-000-0000', {

    	translation: {

    		 'A': {

        			pattern: /[0]/, optional: false

     		        }

    	  },

    	//placeholder: "Ingrese código ORBIS Ej.: AOOO6"

  });


var options =   {
  onKeyPress: function(cep, e, field, options) {
    var masks = ['AC.000000', 'AB.000000', 'AD.000000'];
    var mask;
    if(cep==5){
		mask=masks[0];     	
    }else if(cep==6){
		mask=masks[1]; 
    }else if(cep==7){
 		mask=masks[2];    	
    }
    $('#longitud').mask(mask, options);
	},
    	translation: {

    		 'A': {

        			pattern: /[567]/, optional: false

     		        },
    		 
    		 'B': {

        			pattern: /[0-9]/, optional: false

     		        },

    		 'C': {

        			pattern: /[8-9]/, optional: false

     		        },

    		 'D': {

        			pattern: /[0-4]/, optional: false

     		        }          		             		        

    	  }

};

$('#longitud').mask('00.000000', options);


var opciones =  {
  onKeyPress: function(cep, e, field, opciones) {
    var masks2 = ['AC.000000', 'AB.000000'];
    var mask2 = (cep==1) ? masks2[0] : masks2[1];
    $('#latitud').mask(mask2, opciones);
	},
    	translation: {

    		 'A': {

        			pattern: /[01]/, optional: false

     		        },
    		 
    		 'B': {

        			pattern: /[0-9]/, optional: false

     		        },

    		 'C': {

        			pattern: /[0-3]/, optional: false

     		        }       		             		        

    	  }

};

$('#latitud').mask('00.000000',opciones);

$('#h_latitud').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Los limites de LATITUD en Venezuela estan entre 00 y 13 (sistema WGS 84)' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  } 


});

$('#h_longitud').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Los limites de LONGITUD en Venezuela estan entre -74 y -58 (sistema WGS 84)' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  } 


});

$('#h_seca').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Indique la presencia y/o cantidad de productos de LINEA SECA distribuidos por LLA' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  }

  });

$('#h_rcompetencia').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Indique la presencia y/o cantidad de productos REFRIGERADOS distribuidos por la competencia' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  } 

});

$('#h_scompetencia').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Indique la presencia y/o cantidad de productos de LINEA SECA distribuidos por la competencia' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  } 

});

$('#h_apropios').balloon({ 

	html: true, 
	position: 'top left',
  	contents: 'Indique las neveras pertenecientes a LLA concedidas en comodato al ALIADO' ,
  	minLifetime: 2000 ,
  	
  	  css: {
    fontSize: 10,
    fontWeight: 'bold',
    backgroundColor: '#ff0000',
    color: '#fff'
  } 

});
//$('#a_activo_f').mask('LLA-000000');

$('#a_activo_f').mask('AAY-000000', {'translation': {
                                        A: {pattern: /[L]/},
                                        Y: {pattern: /[A]/}
                                      }
});

var tick=0;

$("#derecha" ).click(function() {

	if(tick==0){

		var cont_alert =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		if(cont_alert!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

		}else{

			$('.base').unslider('animate:1');
			tick=1;
			document.getElementById('izquierda').disabled = false;

		}


	}else if(tick==1){

		var cont_alert3 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
		//var cont_alert = $('.aaa p:contains("") ').size();

		if(cont_alert3!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

		}else{

			$('.base').unslider('animate:2');
			tick=2;
			document.getElementById('derecha').disabled = true;

		}

	}

});

$("#izquierda" ).click(function() {

	if(tick==1){

		$('.base').unslider('animate:0');
		tick=0;
		document.getElementById('izquierda').disabled = true;

	}else if(tick==2){

		$('.base').unslider('animate:1');
		tick=1;
		document.getElementById('derecha').disabled = false;

	}

});


		$('#tele1').keyup(function() {
			// set password variable
			var telefo = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar1",telefono:telefo}).done(function( data ) {
			 $("#conf_tel").html( data );

			});

		}).focus(function() {
			$('#confirma_telefono').show();
		}).blur(function() {
			$('#confirma_telefono').hide();
		});

		$('#tele2').keyup(function() {
			// set password variable
			var telefo = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar2",telefono:telefo}).done(function( data ) {
			 $("#conf_tel2").html( data );

			});

		}).focus(function() {
			$('#confirma_telefono2').show();
		}).blur(function() {
			$('#confirma_telefono2').hide();
		});

		$('#propietario').keyup(function() {
			// set password variable
			var nombreso = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar4",nombre:nombreso}).done(function( data ) {
			 $("#conf_nom").html( data );

			});

		}).focus(function() {
			$('#confirma_nombre ').show();
		}).blur(function() {
			$('#confirma_nombre').hide();
		});

		$('#correo1').keyup(function() {
			// set password variable
			var corre = $(this).val();

			$.post( "../../controllers/validaciones", { action: "validar3",correo:corre}).done(function( data ) {
			 $("#conf_cor").html( data );

			});

		}).focus(function() {
			$('#confirma_correo').show();
		}).blur(function() {
			$('#confirma_correo').hide();
		});

		$('.base').unslider({

			keys: false,
			nav: false,
			arrows: false

		});

		$('#fecha1').datepicker({
			startDate: '-180m',
    		endDate: '+0d',
			todayBtn: false,
		             todayHighlight: true,
		        	autoclose: true,
			language: 'es',
			showOnFocus: true

		});

		$("#fecha2").datepicker("setDate", new Date());

		$('#guardia1').on('focus', function() {
				$('#longitud').focus();
				var cont_alert2 =$('.bbb').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				if(cont_alert2!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

				}else{

					$('.base').unslider('animate:1');

				    setTimeout(function() {

				    	$('#propietario').focus();
				    	document.getElementById('izquierda').disabled = false;
				    	tick=1;

				    }, 100);					

				}	

		});

		$('#guardia2').on('focus', function() {
				$('#ls_competencia').focus();
				var cont_alert4 =$('.ccc').filter(function() { return $(this).val() == ""; }).size();
				//var cont_alert = $('.aaa p:contains("") ').size();

				if(cont_alert4!=0){

						$.confirm({
						    title: '¡existen campos vacios !', // hides the title.
						    cancelButton: false, // hides the cancel button.
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success',
						    content: false// hides content block.
						});	

				}else{

					$('.base').unslider('animate:2');

				    setTimeout(function() {

				    	$('#toldo').focus();
				    	document.getElementById('derecha').disabled = true;
				    	tick=2;

				    }, 100);					

				}

		});


		$('#estatus_aliado').multiselect({
		
			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked){
            			 	//var estatus = $('#estatus_aliado').val();

	            //var vuelta=document.getElementById("orbis");
	            //var ms_vuelta=document.getElementById("ms_orbis");
	            //var elemi=document.getElementById("potencia");
          		//var lbl_p=document.getElementById("lbl_potencia");

            	var este =(element.val());

				if(checked === true) {

					if(este==0){

						 $('#estatus_aliado').multiselect('deselect', ['2']);
						 $('#estatus_aliado').multiselect('select', ['0']);
							//vuelta.style.display = 'block';
							//ms_vuelta.style.display = 'block';
							//lbl_p.innerHTML ="Activo";
							//elemi.checked=true;			

							/*if ( $("#orbis").hasClass('bbb') ) {

								 $("#orbis").removeClass('bbb');

							}else {
								
								$("#orbis").addClass('bbb');

							}

							/*if(vuelta.classList.contains("bbb")){
								vuelta.classList.remove("bbb");
							}else{
								vuelta.classList.add("bbb");
							}*/


					}else if(este==2){

						 $('#estatus_aliado').multiselect('deselect', ['0','1']);
						    //vuelta.style.display = 'none';
						    //vuelta.value='';
							//ms_vuelta.style.display = 'none';
							//lbl_p.innerHTML ="Potencial";
							//elemi.checked=false;

							/*if ( $("#orbis").hasClass('bbb') ) {

								 $("#orbis").removeClass('bbb');

							}else {
								
								$("#orbis").addClass('bbb');
								
							}*/							

					}else if(este==1){

						 $('#estatus_aliado').multiselect('select', ['0','1']);
						 $('#estatus_aliado').multiselect('deselect', ['2']);
							/*vuelta.style.display = 'block';
							ms_vuelta.style.display = 'block';
							lbl_p.innerHTML ="Activo";
							elemi.checked=true;			
							
							if ( $("#orbis").hasClass('bbb') ) {

								 $("#orbis").removeClass('bbb');

							}else {
								
								$("#orbis").addClass('bbb');
								
							}
						/*	if(vuelta.classList.contains("bbb")){
								vuelta.classList.remove("bbb");
							}else{
								vuelta.classList.add("bbb");
							}*/
					}

				}else if(checked === false){

					if(este==0){

						 $('#estatus_aliado').multiselect('select', ['2']);
						 $('#estatus_aliado').multiselect('deselect', ['0','1']);
						 /*vuelta.style.display = 'none';
						 ms_vuelta.style.display = 'none';
						 lbl_p.innerHTML ="Potencial";
						 elemi.checked=false;*/

					}else if(este==2){

						 $('#estatus_aliado').multiselect('select', ['0']);
							/*vuelta.style.display = 'block';
							ms_vuelta.style.display = 'block';
							lbl_p.innerHTML ="Activo";
							elemi.checked=true;

							if ( $("#orbis").hasClass('bbb') ) {

								 $("#orbis").removeClass('bbb');

							}else {
								
								$("#orbis").addClass('bbb');
								
							}												
							/*if(vuelta.classList.contains("bbb")){
								vuelta.classList.remove("bbb");
							}else{
								vuelta.classList.add("bbb");
							}	*/					 
					}

				}
				//var sur=$("#estatus_aliado").val();
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Seleccione estatus del aliado',
			buttonWidth: '100%'

		});

		$('#dias').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,
			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Seleccione días de visita',
			buttonWidth: '100%'

		});

		$('#toldo').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3){
						 $('#toldo').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#toldo').multiselect('deselect', ['0','1','2','3' ]);
					}
				}else if(checked === false){

					if(este==4){

						$('#toldo').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#toldo option:selected');	
					if (selectedOptions.length < 1) {
						$('#toldo').multiselect('select', ['4']);
					}	
				//var sur=$("#estatus_aliado").val();
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de toldos',
			buttonWidth: '100%'

		});

		$('#aviso').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3 ){
						 $('#aviso').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#aviso').multiselect('deselect', ['0','1','2','3' ]);
					}

				}else if(checked === false){

					if(este==4){

						$('#aviso').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#aviso option:selected');	
					if (selectedOptions.length < 1) {
						$('#aviso').multiselect('select', ['4']);
					}
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de  avisos',
			buttonWidth: '100%'

		});

		$('#fachada').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			 onChange: function(element, checked, option){
            			 	//var toldor = $('#toldo').val();
            			 	var este =(element.val());
				if(checked === true) {

					if(este==0 || este==1 || este==2 || este==3){
						 $('#fachada').multiselect('deselect', ['4']);
					}else if(este==4){
						 $('#fachada').multiselect('deselect', ['0','1','2','3' ]);
					}
				}else if(checked === false){

					if(este==4){

						$('#fachada').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#fachada option:selected');	
					if (selectedOptions.length < 1) {
						$('#fachada').multiselect('select', ['4']);
					}	
				//var sur=$("#estatus_aliado").val();
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de fachadas',
			buttonWidth: '100%'

		});

		$('#activo').multiselect({

			enableClickableOptGroups: true,
			enableCollapsibleOptGroups: false,

			onChange: function(element, checked, option) {
					var selecto=(element.val());
				if(checked === true) {
	
					if(/*selecto==0 || */selecto==1 || selecto==2 || selecto==3){
						 
						 $('#activo').multiselect('deselect', ['4']);
							
							/*if(selecto==0){

								$('#modal1').modal({backdrop: 'static',keyboard: false});
								//document.getElementById('oculto').style.display = 'block';
							}*/

					}else if(selecto==4){

						 $('#activo').multiselect('deselect', [/*'0',*/'1','2','3' ]);

					}


				}else if(checked === false){

					if(selecto==4){

						$('#activo').multiselect('select', ['4']);		
				
					}

				}
			 		var selectedOptions = $('#activo option:selected');	
					if (selectedOptions.length < 1) {
						$('#activo').multiselect('select', ['4']);
					}
			},

			maxHeight: 180,
			inheritClass: true,
			nonSelectedText: 'Indique presencia de otras neveras',
			buttonWidth: '100%'

		});

		// ********************************************************************************************

		$("#exit" ).click(function() {

						$.confirm({
						    title: '¡Esta acción descartara el registro recuperado!.¿Desea continuar?',
						    content:false,
						    confirmButton: 'Si',
						    cancelButton: 'No',
						    confirmButtonClass: 'btn-primary',
    						    cancelButtonClass: 'btn-success',

						    confirm: function(){

								$.post( "../../controllers/maliados_controller", {action: "del_temp",record:<?php echo intval($_GET["record"]); ?>}).done(function(data){},"json");

						    	setTimeout(function(){

						                  $(location).attr('href','../aliados/index_rec');
                  
						        }, 1000);
							},

						    cancel: function(){

							}
						});	

		});

		// ********************************************************************************************

		$("#descu" ).change(function() {

			if( $('#descu').prop('checked')== true ) {

			   	document.getElementById("descuento").disabled = false;
			   	$("#descuento").val(1);
			   	$('#descuento option[value=0]').attr("disabled", true);

			}else{

			 	document.getElementById("descuento").disabled = true;
			 	$("#descuento").val(0);

			}

		});

		$("#a_propio" ).change(function() {

			if( $('#a_propio').prop('checked')== true ) {

			   	 $("#lab_propio").val(1);
			   	 $('#modal1').modal({backdrop: 'static',keyboard: false});
			   	
			}else{

			 	$("#lab_propio").val(0);
			}

		});

			  	$.post( "../../controllers/mactivos_controller", { action: "search_act3",recordatorio: <?php echo intval($_GET["record"]); ?>}).done(function( data ) {
						
						var parsedJson = $.parseJSON(data);

								if(parsedJson == 'si'){

									document.getElementById('oculto').style.display = 'block';
									document.getElementById("a_propio").checked = true;
									document.getElementById("a_propio").disabled = true;
									$("#lab_propio").val(1);

								}else{

									document.getElementById("a_propio").checked = false;
									$("#lab_propio").val(0);

								}

				},"json");

					      	
							var identico2 = <?php echo intval($_GET["record"]); ?>//$('#id').val();
							//alert(identico2);	
									var table = $('#tabla').dataTable({
									  	
										  //"destroy": true,

										  "ajax": {
											"url": "../../data_json/data_mactivos_2?al="+identico2+"",
											"dataSrc": ""
										  },
										  "columns": [
												{ "data": "cid" },
												{ "data": "marca" },
												{ "data": "modelo" },
												{ "data": "serial" },
												{ "data": "activo" },
												{ "data": "comodato" }
											],
										//"order": [[ 0, "asc" ]],
										"bPaginate": false,
										
										"info":     false,
										"bFilter": false

										  //"aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }]
									});


							$('#tabla tbody').on( 'click', 'tr', function () {

								if ( $(this).hasClass('selected') ) {
									$(this).removeClass('selected');
								}
								else {
									table.$('tr.selected').removeClass('selected');
									$(this).addClass('selected');
								}
							});

		$("#close1").click(function() {

				$.post( "../../controllers/mactivos_controller", {

					action: "temporal2",
					id: $('#id').val(),
					marca: $('#a_marca').val(),
					modelo: $('#a_modelo').val(),
					serial: $('#a_serial').val(),
					activo: $('#a_activo_f').val(),
					comodato: $('#a_comodato').val(),
					distribuidora: $('#distribuidora').val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message1").html(parsedJson.mensaje);

					if(parsedJson.resultado != 'error'){

						document.getElementById("a_propio").disabled = true;
					    setTimeout(function(){

							$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
								 $("#a_marca" ).html( data );

							});
							$("#a_modelo").val(null);
							$("#a_serial").val(null);
							$("#a_activo_f").val(null);
							$("#a_comodato").val(null);
							//$("#distribuidora").val(null);

if(document.getElementById('oculto').style.display == 'block'){

	$('#tabla').DataTable().ajax.reload();

}else{				
	$('#tabla').DataTable().ajax.reload();
	document.getElementById('oculto').style.display = 'block';
}						


 							$(".alert").alert('close');
					      	$('#modal1').modal('toggle');

					    }, 3000);

					}else{

					}

				},"json");
		    //$('#activo').focus();

		});


			$('#quitar').click( function () {

				var value= table.$('tr.selected').children('td:first').text();
				if(!value){

						$.alert({
						    title: '!Seleccione el activo a desincorporar!',
						    content: false,
						    confirmButton: true, // hides the confirm button.
						    closeIcon: false,
						    confirmButton: 'cerrar',
						    confirmButtonClass: 'btn-success'
						});

				}else{

						$.confirm({

								    title: '¿Desea desincorporar este activo?!',
								    content:false,
								    confirmButton: 'Si',
								    cancelButton: 'No',
								    confirmButtonClass: 'btn-primary',
		    						    cancelButtonClass: 'btn-success',

						    		confirm: function(){

										$.post( "../../controllers/mactivos_controller", { action: "delete",record:value}).done(function( data ) {
											//$(".message").html(data);
											var parsedJson = $.parseJSON(data);
											$(".message").html(parsedJson.mensaje);

									    	setTimeout(function(){

												$(".alert").alert('close');
												//$('#tabla').dataTable();
												 

													  	$.post( "../../controllers/mactivos_controller", { action: "search_act3", recordatorio: $('#id').val()}).done(function( data ) {
																
																var parsedJson = $.parseJSON(data);

																		if(parsedJson == 'si'){
																		
																			$('#tabla').DataTable().ajax.reload();
																				
																		

																		}else{
					      													document.getElementById('oculto').style.display = 'none';
																			document.getElementById("a_propio").checked = false;
																			document.getElementById("a_propio").disabled = false;
																			$("#lab_propio").val(0);

																		}

														},"json");	

									        }, 3000);
										});		

									},

								 	cancel: function(){

									}
						});

				}
			});		


		$("#cancelar2").click(function() {

			$('#modal1').modal('toggle');
		$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
			 $("#a_marca" ).html( data );

		});
			$("#a_modelo").val(null);
			$("#a_serial").val(null);
			$("#a_activo_f").val(null);
			$("#a_comodato").val(null);

			  	$.post( "../../controllers/mactivos_controller", { action: "search_act_edit", busco:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {
						
						var parsedJson = $.parseJSON(data);

								if(parsedJson == 'si'){

									

								}else{

									document.getElementById("a_propio").checked = false;
									$("#lab_propio").val(0);

								}

				},"json");
		});

		$("#cancelar3").click(function() {

			$('#modal2').modal('toggle');
			//map.closePopup();
			$('#latitud').focus();
			
		});	

		$("#agregar").click(function() {
			$('#modal1').modal({backdrop: 'static',keyboard: false});
		});

// para consultar y cargar los segmentos ***********************************************************
		$.post( "../../controllers/msegmentos_controller", { action: "get_segmentos"}).done(function( data ) {
			 $("#segmento" ).html( data );

		});

// para consultar y cargar los datos geograficos ***********************************************************

		$.post( "../../controllers/mgeograficas_controller", { action: "get_estados"}).done(function( data ) {
			 $("#estado" ).html( data );

		});


		$('#estado').change(function(event) {
			
				$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios",estado: $("#estado").val()}).done(function( data ) {
					 $("#municipio" ).html( data );

				});


				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias"}).done(function( data ) {
					 $("#parroquia" ).html( data );

				});				

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad"}).done(function( data ) {
					 $("#ciudad" ).html( data );

				});	
		});


		$('#municipio').change(function(event) {
			
				$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias",municipio: $("#municipio").val()}).done(function( data ) {
					 $("#parroquia" ).html( data );

				});

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad"}).done(function( data ) {
					 $("#ciudad" ).html( data );

				});					
		});

		$('#parroquia').change(function(event) {

				$.post( "../../controllers/mgeograficas_controller", { action: "get_ciudad",municipio: $("#municipio").val(),parroquia: $("#parroquia").val()}).done(function( data ) {
					 $("#ciudad" ).html( data );
					// $("#lata" ).val( parsedJson.lata );
					// $("#longa" ).val( parsedJson.longa );

				});

		});

// para consultar y cargar los territorios ***********************************************************
		$.post( "../../controllers/mterritorios_controller", { action: "get_territorios",modulo: $("#zona").val(),distribuidora: $("#distribuidora").val()}).done(function( data ) {
			 $("#territorio_g" ).html( data );

		});

		$('#zona').change(function(event) {
			
					$.post( "../../controllers/mterritorios_controller", { action: "get_territorios",modulo: $("#zona").val(),distribuidora: $("#distribuidora").val()}).done(function( data ) {
					 $("#territorio_g" ).html( data );

				});
		});

		$.post( "../../controllers/mterritorios_controller", { action: "get_gterritorios",distribuidoras: $("#distribuidora").val()}).done(function( data ) {
			 $("#territorio" ).html( data );

		});

		$.post( "../../controllers/mmarcas_controller", { action: "get_marcas"}).done(function( data ) {
			 $("#a_marca" ).html( data );

		});

		$.post( "../../controllers/mdistribuidoras_controller", { action: "get_distri"}).done(function( data ) {
			 $("#distribuidora" ).html( data );

		});

		$.post( "../../controllers/mregiones_controller", { action: "get_regi",distribuidora:$("#distribuidora").val()}).done(function( data ) {
			 $("#region" ).html( data );

		});

		$.post( "../../controllers/maliados_controller", { action: "search2",record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

			//alert(data);
			var parsedJson = $.parseJSON(data);
				$("#recuperado").html(parsedJson.recuperado);
				$("#no_cli").html(parsedJson.nombre);
				$("#id").val(parsedJson.id);
				$("#s_orbis").val(parsedJson.sorbis);
				$("#orbis").val(parsedJson.orbis);
				$("#nombre").val(parsedJson.nombre);
				$("#razon").val(parsedJson.razon);
				$("#segmento").val(parsedJson.segmento);
				$("#cedula").val(parsedJson.cedula);

				$("#fecha1").val(parsedJson.fecha1);
				$("#fecha2").val(parsedJson.fecha2);

				$("#estado").val(parsedJson.estado);

				$("#sector").val(parsedJson.sector);
				
				var bmun =parsedJson.municipio;
				var bpar =parsedJson.parroquia;
				var bciu =parsedJson.ciudad;				

		$.post( "../../controllers/mgeograficas_controller", { action: "get_municipios_e",municipio:bmun}).done(function( data ) {

				$("#municipio" ).html( data );
			
		});	

		$.post( "../../controllers/mgeograficas_controller", { action: "get_parroquias_e",parroquia: bpar}).done(function( data ) {
			
			 $("#parroquia" ).html( data );

		});

		$.post( "../../controllers/mgeograficas_controller", {action: "get_ciudad_e",ciudad: bciu}).done(function( data ) {
			//setTimeout(function(){
			 $("#ciudad" ).html( data );
			//}, 1500);
		});	

				$("#a_principal").val(parsedJson.a_principal);
				$("#acceso1").val(parsedJson.acceso1);
				$("#a_secundario").val(parsedJson.a_secundario);
				$("#acceso2").val(parsedJson.acceso2);
				$("#referencia").val(parsedJson.referencia);
				$("#zona").val(parsedJson.zona);

				$("#territorio").val(parsedJson.territorio);

				//$("#territorio_g").val(parsedJson.territorio_g);
				var bter = parsedJson.territorio_g;
				$.post( "../../controllers/mterritorios_controller", { action: "get_territorios_e",territorio: bter}).done(function( data ) {
					
					 $("#territorio_g" ).html( data );

				});
				
				$("#latitud").val(parsedJson.latitud);
					
					document.getElementById('lata').value=parseFloat(parsedJson.latitud); 
				
				$("#longitud").val(parsedJson.longitud);
					document.getElementById('longa').value=parseFloat(parsedJson.longitud)*(-1);


				$("#propietario").val(parsedJson.propietario);
				$("#tele1").val(parsedJson.tele1);
				$("#tele2").val(parsedJson.tele2);
				$("#correo1").val(parsedJson.correo1);
				$("#estatus_aliado").val(parsedJson.estatus_aliado);
				$("#dias").val(parsedJson.dias);
				$("#caja_t").val(parsedJson.caja_t);
				$("#caja_p").val(parsedJson.caja_p);
				$("#caja_o").val(parsedJson.caja_o);
				$("#despacho").val(parsedJson.despacho);
				$("#descuento").val(parsedJson.descuento);
				$("#seca").val(parsedJson.seca);
				$("#rf_competencia").val(parsedJson.rf_competencia);
				$("#ls_competencia").val(parsedJson.ls_competencia);

				$("#toldo").val(parsedJson.toldo);
				$("#aviso").val(parsedJson.aviso);
				$("#fachada").val(parsedJson.fachada);
				$("#activo").val(parsedJson.activo);
				$("#observacion").val(parsedJson.observacion);
				
				$("#distribuidora").val(parsedJson.distribuidora);
				$("#region").val(parsedJson.region);

				var completador = parsedJson.recuperado;
				var identico = parsedJson.id;
				var des_cu = parsedJson.descuento;
				//alert(des_cu);
				var or_bis = $("#orbis").val();
				var es_ali = parsedJson.estatus_aliado;
				var di_as = parsedJson.dias;

				if(di_as==null){
					di_as=='';
				}else{
					di_as = di_as.split(',');
				}
				

				var desc_ch=document.getElementById("descu");
				var desc_cue=document.getElementById("descuento");

				if (des_cu == 0) {
					desc_ch.checked=false;

				}else{
					desc_ch.checked=true;
					desc_cue.disabled = false;
				}

				var tol_do = parsedJson.toldo;

				if(tol_do==null){
					$('#toldo').multiselect('select', ['4']);
				}else{
					tol_do = tol_do.split(',');
				}

				

				var avi_so = parsedJson.aviso;
				if(avi_so==null){
					$('#aviso').multiselect('select', ['4']);
				}else{
					avi_so = avi_so.split(',');
				}

				var fa_cha = parsedJson.fachada;
				if(fa_cha==null){
					$('#fachada').multiselect('select', ['4']);
				}else{
					fa_cha = fa_cha.split(',');
				}

				var ac_ti = parsedJson.activo;
				if(ac_ti==null){
					$('#activo').multiselect('select', ['4']);
				}else{
					ac_ti = ac_ti.split(',');
				}				


  //		document.getElementById('oculto').style.display = 'block';

				if(!or_bis){
					$("#orbis").val('SIN CÓDIGO ORBIS');
				}

				if(es_ali =='0'){

					$('#estatus_aliado').multiselect('select', ['0']);

				}else if(es_ali =='0,1'){

					$('#estatus_aliado').multiselect('select', ['0','1']);

				}else if(es_ali=='2'){
					
					$('#estatus_aliado').multiselect('select', ['2']);
				}	


				if(di_as){

					$('#dias').multiselect('select', di_as);

				}

				if(tol_do){

					$('#toldo').multiselect('select', ['4']);

				}

				if(avi_so){

					$('#aviso').multiselect('select', ['4']);

				}

				if(fa_cha){

					$('#fachada').multiselect('select', ['4']);

				}

				if(ac_ti){

					$('#activo').multiselect('select', ['4']);

				}												

			
			},"json");


		//** enviar los datos al controlador ***********************************************************
		$("#save" ).click(function() {

				poten = $("#orbis").val();

//alert($('#distribuidora').val());

/*if(poten == "Sin código ORBIS"){
	poten="";
}*/
//alert($('#fecha1').val());

				$.post( "../../controllers/maliados_controller", {

					action: "add",
					caso: "1",
					id: <?php echo intval($_GET["record"]); ?>,
					sorbis: $("#s_orbis").val(),
					orbis: poten,
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					estado: $("#estado").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val(),

					propietario: $("#propietario").val(),
					tele1: $("#tele1").val(),
					tele2: $("#tele2").val(),
					correo1: $("#correo1").val(),
					estatus_aliado: $("#estatus_aliado").val(),
					dias: $("#dias").val(),
					caja_t: $("#caja_t").val(),
					caja_p: $("#caja_p").val(),
					caja_o: $("#caja_o").val(),
					despacho: $("#despacho").val(),
					descuento: $("#descuento").val(),
					seca: $("#seca").val(),
					rf_competencia: $("#rf_competencia").val(),
					ls_competencia: $("#ls_competencia").val(),

					toldo: $("#toldo").val(),
					aviso: $("#aviso").val(),
					fachada: $("#fachada").val(),
					activo: $("#activo").val(),
					observacion: $("#observacion").val(),
					distribuidora: $("#distribuidora").val(),
					region: $("#region").val()

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					switch(parsedJson.deslizador){

						case "1":
							$('.base').unslider('animate:0');
							tick=0;
							document.getElementById('izquierda').disabled = true;
							document.getElementById('derecha').disabled = false;
						break;

						case "2":
							$('.base').unslider('animate:1');
							tick=1;
							document.getElementById('izquierda').disabled = false;
							document.getElementById('derecha').disabled = false;
						break;

					}

					if(parsedJson.resultado != 'error'){

								$.post( "../../controllers/mactivos_controller", { action: "definitivo",recordado:$("#cedula").val(),l_recordado:$("#l_cedula").val(), l_orbis:$("#orbis").val(),l_record:<?php echo intval($_GET["record"]); ?>}).done(function( data ) {

								});

						$('.base').unslider('animate:0');

					    	setTimeout(function(){

					                  $(location).attr('href','../aliados/');
					                  //$('#orbis').focus();

					        }, 3000);

					}/*else{

						$('.base').unslider('animate:0');
						tick=0;
						document.getElementById('izquierda').disabled = true;
						document.getElementById('derecha').disabled = false;

					    	setTimeout(function(){

					                  $('#orbis').focus();

					              }, 300);

					}*/

				},"json");

		});//end save

		$("#savetemporal" ).click(function() {

				$.post( "../../controllers/maliados_controller", {

					action: "add_temp1",
					orbis: $("#orbis").val(),
					nombre: $("#nombre").val(),
					razon: $("#razon").val(),
					segmento: $("#segmento").val(),
					cedula: $("#cedula").val(),
					l_cedula: $("#l_cedula").val(),
					fecha1: $("#fecha1").val(),
					fecha2: $("#fecha2").val(),
					estado: $("#estado").val(),
					municipio: $("#municipio").val(),
					ciudad: $("#ciudad").val(),
					sector: $("#sector").val(),
					parroquia: $("#parroquia").val(),
					a_principal: $("#a_principal").val(),
					acceso1: $("#acceso1").val(),
					a_secundario: $("#a_secundario").val(),
					acceso2: $("#acceso2").val(),
					referencia: $("#referencia").val(),
					zona: $("#zona").val(),
					territorio: $("#territorio").val(),
					territorio_g: $("#territorio_g").val(),
					latitud: $("#latitud").val(),
					longitud: $("#longitud").val(),

				}).done(function(data){

					var parsedJson = $.parseJSON(data);
					$(".message").html(parsedJson.mensaje);

					switch(parsedJson.deslizador){

						case "1":
							$('.base').unslider('animate:0');
							tick=0;
							document.getElementById('izquierda').disabled = true;
							document.getElementById('derecha').disabled = false;
						break;

						case "2":
							$('.base').unslider('animate:1');
							tick=1;
							document.getElementById('izquierda').disabled = false;
							document.getElementById('derecha').disabled = false;
						break;

					}

					if(parsedJson.resultado != 'error'){

						$('.base').unslider('animate:0');

					    	setTimeout(function(){

					                  $(location).attr('href','../aliados/frm_registrar');
					                  $('#orbis').focus();

					              }, 3000);

					}

				},"json");

		});//end save




	});




//################################  VALIDACIONES############################################



//############################################################################

function cajas_obj(){

	var totales=document.getElementById('caja_t').value;
	var propias=document.getElementById('caja_p').value;
	var objetivo= totales-propias;

	document.getElementById('caja_o').value=objetivo;
}


function menor(){
	var totales2=document.getElementById('caja_t').value;
	var propias2=document.getElementById('caja_p').value;

		if(propias2 <= totales2){


		}else{

			document.getElementById('ms_caja_p').innerHTML = 'Debe ser menor o igual a "Total de Cajas"';

		}
}
//################################  VALIDACIONES############################################

          //****longitud de campos********************************************

	$(function(){

	              $('#orbis').maxLength(17);$('#nombre').maxLength(99);$('#razon').maxLength(99);$('#cedula').maxLength(11);
	              $('#acceso1').maxLength(99);$('#acceso2').maxLength(99);$('#referencia').maxLength(99);$('#propietario').maxLength(50);
	              $('#latitud').maxLength(10);$('#longitud').maxLength(10);$('#tele2').maxLength(15);$('#tele1').maxLength(15);
	              $('#correo1').maxLength(99);$('#caja_t').maxLength(7);$('#caja_p').maxLength(7);
	              $('#seca').maxLength(99);$('#rf_competencia').maxLength(99);$('#ls_competencia').maxLength(99);$('#observacion').maxLength(99);
	              $('#a_modelo').maxLength(20);$('#a_serial').maxLength(20);$('#a_activo_f').maxLength(12);$('#a_comodato').maxLength(20);
	});
  
            function alsaliro4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 4){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 4 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsaliro(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 5){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 5 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 6){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 6 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalira3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 9){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 9 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function alsalir2(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 12){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 12 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

             function alsalir3(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 13){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 13 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

              function alsalir4(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 1){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 1 número';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

function esorbis(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_orbis').style.display = 'block';
                       	document.getElementById("ms_orbis").innerHTML = 'Utilice solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_orbis").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esnombre(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_nombre').style.display = 'block';
                       	document.getElementById("ms_nombre").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_nombre").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esrazon(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_razon').style.display = 'block';
                       	document.getElementById("ms_razon").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_razon").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escedula(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_cedula').style.display = 'block';
                       	document.getElementById("ms_cedula").innerHTML = 'El RIF/CEDULA inicia con "J","P","V","E" o "G"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_cedula").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esacceso(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso1').style.display = 'block';
                       	document.getElementById("ms_acceso1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso1").innerHTML = '';
                       	return patron.test(n);

                    }

}


function esacceso1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_acceso2').style.display = 'block';
                       	document.getElementById("ms_acceso2").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_acceso2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esreferencia(e) {

	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);
	k = (document.all) ? e.keyCode : e.which;

                    if(patron.test(n)==''){

                    	document.getElementById('ms_referencia').style.display = 'block';
                       	document.getElementById("ms_referencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_referencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslatitud(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_latitud').style.display = 'block';
                       	document.getElementById("ms_latitud").innerHTML = 'Utilice el formato "00.000000"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_latitud").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslongitud(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_longitud').style.display = 'block';
                       	document.getElementById("ms_longitud").innerHTML = 'Utilice el formato "-00.000000"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_longitud").innerHTML = '';
                       	return patron.test(n);

                    }

}

function espropietario(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-\']$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_propietario').style.display = 'block';
                       	document.getElementById("ms_propietario").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_propietario").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele1(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele1').style.display = 'block';
                       	document.getElementById("ms_tele1").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele1").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele2').style.display = 'block';
                       	document.getElementById("ms_tele2").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function estele2(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9\-\(\)]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_tele2').style.display = 'block';
                       	document.getElementById("ms_tele2").innerHTML = 'Use solo números y "-"';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_tele2").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escorreo(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[A-ZÑ0-9\_\-\.\+\@\ ]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_correo1').style.display = 'block';
                       	document.getElementById("ms_correo1").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_correo1").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escajat(e) {


	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_caja_t').style.display = 'block';
                       	document.getElementById("ms_caja_t").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_caja_t").innerHTML = '';
                       	return patron.test(n);

                    }

}

function escajap(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /[0-9]/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_caja_p').style.display = 'block';
                       	document.getElementById("ms_caja_p").innerHTML = 'Use solo números';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_caja_p").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslineaseca(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_seca').style.display = 'block';
                       	document.getElementById("ms_seca").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_seca").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esrefcomp(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_rf_competencia').style.display = 'block';
                       	document.getElementById("ms_rf_competencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_rf_competencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function eslineasecomp(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_ls_competencia').style.display = 'block';
                       	document.getElementById("ms_ls_competencia").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_ls_competencia").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esobservacion(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\ \.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_observacion').style.display = 'block';
                       	document.getElementById("ms_observacion").innerHTML = 'Use mayusculas y no incluya caractéres especiales';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_observacion").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_modelo(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_modelo').style.display = 'block';
                       	document.getElementById("ms_a_modelo").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_modelo").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_serial(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[A-ZÑ0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_serial').style.display = 'block';
                       	document.getElementById("ms_a_serial").innerHTML = 'Use mayusculas y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_serial").innerHTML = '';
                       	return patron.test(n);

                    }

}

function esa_comodato(e) {

	k = (document.all) ? e.keyCode : e.which;
	if (k==8 || k==0 || k==13) return true;
	patron = /^[0-9\.\-]$/;
	n = String.fromCharCode(k);

                    if(patron.test(n)==''){

                    	document.getElementById('ms_a_comodato').style.display = 'block';
                       	document.getElementById("ms_a_comodato").innerHTML = 'Use solo números y no incluya caractéres especiales ni espacios';
                        	return patron.test(n);

                    }else{

                       	document.getElementById("ms_a_comodato").innerHTML = '';
                       	return patron.test(n);

                    }

}

//^[\0\d]{4}[-]([\d]{3}[-])[\d]{4}$
            
     /*   function ocultar(){
        	
            var vuelta=document.getElementById("orbis");
            var ms_vuelta=document.getElementById("ms_orbis");
            var elemi=document.getElementById("potencia");
                      
            document.getElementById("lbl_potencia").innerHTML = elemi.checked ? "Activo" : "Potencial";
                
                if (elemi.checked) {
                  	
                  	vuelta.style.display = 'block';
                  	ms_vuelta.style.display = 'block';
					
					if(vuelta.classList.contains("bbb")){
						vuelta.classList.remove("bbb");
					}else{
						vuelta.classList.add("bbb");
					}
					
                }else{
                    
                    vuelta.style.display = 'none';
                    vuelta.value = '';
                  	ms_vuelta.style.display = 'none';
					//vuelta.classList.remove("bbb");
					if(vuelta.classList.contains("bbb")){
						vuelta.classList.remove("bbb");
					}else{
						vuelta.classList.add("bbb");
					}					
                }
        }*/

function sig_1(){

	var vuelta=document.getElementById("caja_p");
	vuelta.focus();

}

function sig_2(){

	var vuelta33=document.getElementById("aviso");
	vuelta33.focus();

}

//************************************************************************/

	        function esnombre2(v) {
              var caso2=document.getElementById('propietario').value;
             if(caso2.length < 6){
            	document.getElementById('ms_propietario').innerHTML = 'Debe escribir al menos 6 caractéres';
             }else{
                 var texto2 = v.split(" ");
                 var n_palabras = texto2.length;
                 if(n_palabras >= 2 && n_palabras  <= 5 ){
                    document.getElementById("ms_propietario").innerHTML = '';
                    
                 }else{
                 	document.getElementById("ms_propietario").innerHTML = '¡Ingrese NOMBRE(S) y APELLIDO(S)';
                 	
                 }
             }//end else
			}

//************************************************************************/
 </script>
 <?php include_once("../layouts/pie.php") ?>
