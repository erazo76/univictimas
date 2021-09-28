<?php

include("../../lib/validar_session.php");

ValidaSession("../login");
//VerificarAdmin($_SESSION['rolx']);
$control_total=false;

?>
<?php include("../layouts/constantes.php") ?>
<?php include_once("../layouts/cabezera.php") ?>

<div class="message"></div>
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4 style="font-size: 34px" id="restan"><sup style="font-size: 20px">$</sup></h4>
                  <p>PRESUPUESTO NACIONAL</p>
                </div>
                <div class="icon">
                  <i class="fa fa-bank"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Restante <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4 style="font-size: 34px" id="sub_part_cos"><sup style="font-size: 20px">$</sup></h4>
                  <p>SUBDIRECCIÓN  DE PARTICIPACIÓN</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h4 style="font-size: 34px" id="dir_ges_cos"><sup style="font-size: 20px">$</sup></h4>
                  <p>DIRECCIÓN DE GESTIÓN INTERINSTITUCIONAL</p>
                </div>
                <div class="icon">
                <i class="ion-ios-color-filter-outline"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h4 style="font-size: 34px" id="dir_cord_cos"><sup style="font-size: 20px">$</sup></h4>
                  <p>SUBDIRECCIÓN COORDINACIÓN SNARIV</p>
                </div>
                <div class="icon">
                  <i class="ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->


            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <h4 style="font-size: 34px" id="dir_cord_nac_cos"><sup style="font-size: 20px">$</sup></h4>
                  <p>SUBDIRECCIÓN COORDINACIÓN NACIÓN TERRITORIO</p>
                </div>
                <div class="icon">
                  <i class="ion-home"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h4 style="font-size: 34px" id="grup_proy"><sup style="font-size: 20px">$</sup></h4>
                  <p>GRUPO DE GESTIÓN DE PROYECTOS</p>
                </div>
                <div class="icon">
                  <i class="ion-clipboard"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h4 style="font-size: 34px" id="vict_ext_cos"><sup style="font-size: 20px">$</sup></h4>
                  <p>VICTIMAS EN EL EXTERIOR</p>
                </div>
                <div class="icon">
                  <i class="ion-person-stalker"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ejecutados <i class="fa fa-check"></i>
                </a>
              </div>
            </div><!-- ./col -->



          </div><!-- /.row -->

<div class="row">

            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">EJECUCIÓN PRESUPUESTAL REGIONAL</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="chartdiv" style="width:100%;max-height:300px;height:100vh;">
                  
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">EJECUCIÓN PRESUPUESTAL DEPARTAMENTAL </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div id="chartdiv2" style="width:100%;height:500px;">
                  
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div>

            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">ASIGNACIÓN PRESUPUESTAL GENERAL</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <form id="form" role="form" enctype="multipart/form-data" >

                <div class="box-body">                    
                  <div class="form-group">
                    <label>Número de contrato</label>
                    <input type="text" class="form-control" id="num_contrato" placeholder="Indique el número de contrato"  onpaste="return false" tabindex="10" onkeypress="return esnumint(event);" onblur="alsalir(this.id)" autocomplete="off">
                    <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_num_contrato'><p></p></div>
                    <input type="hidden" id="id_contrato">
                  </div>

                  <label>Asignación presupuestal</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="cos_contrato" placeholder="Indique la asignación presupuestal"  onpaste="return false" tabindex="20" onkeypress="return esnum(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='ms_cos_contrato'><p></p></div>
                </div>                
                </div>

                <div style="background-color:#F39C12;color:#fff;text-align:center" id='vic_ext'><p></p></div>
                  <div class="box-footer">
                    <button id="p_guarda" type="button" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
                    <button id="p_edita" type="button" class="btn btn-success" style="display:none;"><i class="fa fa-fw fa-edit"></i>Editar</button>
                </div>  
                <?php 
						   
							if($_GET["control_total"]){
						   
						   ?>
                   

                <div class="box-header with-border">
                  <h3 class="box-title">ASIGNACIÓN ESPECIFICA</h3>
                  <div class="box-tools pull-right">
                  </div>
                  </div>
                  
                
                <label>Subdireccion de Participacion</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <!-- <input type="text" class="form-control" id="sub_participacion" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_sub_participacion(event);" onblur="alsalir(this.id)" autocomplete="off"> -->
                    <input type="text" class="form-control pesos" id="sub_participacion" placeholder="Indique la asignación "  onpaste="return false"  onkeypress="return esnum_sub_participacion(event);" onblur="monto_alsalir(this.id)" autocomplete="off">

                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='sub_participacion'><p></p></div>
               

                <label>Direccion de Gestion InterInstitucional</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="dir_inter" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_dir_inter(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='dir_inter'><p></p></div>
               
                 
                <label>SUBDIRECCIÓN COORDINACIÓN SNARIV</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="subdir_snariv" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_subdir_snariv(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='subdir_snariv'><p></p></div>
                    
                <label>SUBDIRECCIÓN COORDINACIÓN NACIÓN TERRITORIO</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="subdir_nac" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_subdir_nac(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='subdir_nac'><p></p></div>
               
                  <label>GRUPO DE GESTIÓN DE PROYECTOS</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="grup_proy" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_grup_proy(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div style="background-color:#F39C12;color:#fff;text-align:center" id='grup_proy'><p></p></div>
               
                  <label>VICTIMAS EN EL EXTERIOR</label>
                  <div class="input-group">                            
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="vic_ext" placeholder="Indique la asignación "  onpaste="return false" tabindex="20" onkeypress="return esnum_vic_ext(event);" onblur="alsalir(this.id)" autocomplete="off">
                  </div>
                  <div class="box-footer">
                    <button id="p_asignar" type="button" class="btn btn-success"><i class="fa fa-fw fa-save"></i>Guardar</button>
                    <!-- <button id="p_edita" type="button" class="btn btn-success" style="display:none;"><i class="fa fa-fw fa-edit"></i>Editar</button> -->
                </div> 

             	
              	<?php 
							 }else{
							}
							?>
                </form> 
                <div id="chartdiv3" style="width:100%;height:300px;max-height:300px;">
                </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
</div>


<script type="text/javascript" src="../../plugins/confirma/jquery-confirm.min.js"></script>
<link rel="stylesheet" href="../../plugins/confirma/jquery-confirm.min.css" type="text/css"/>
<script type="text/javascript" src="../../plugins/amcharts4/core.js"></script>
<script type="text/javascript" src="../../plugins/amcharts4/charts.js"></script>
<script type="text/javascript" src="../../plugins/amcharts4/themes/animated.js"></script>

<script type="text/javascript">

$(document).ready(function() {


  $.post( "../../controllers/mcontratos_controller", { action: "search_presupuesto"}).done(function( data ) {
		var parsedJson = $.parseJSON(data);
    
		var num_cont = parsedJson.num_contrato;
    var num_contrato = parsedJson.num_contrato;
    var cos_cont = parsedJson.cos_contrato;
    var id_contrato= parsedJson.id_contrato;

    if(cos_cont!=null){
        cos_cont = formato_numero(cos_cont, 2, ',', '.');
      }        
    var estato = parsedJson.estado;
    if(estato!=null){
      estato = formato_numero(estato, 2, ',', '.');
      }  
    var sub_part_cos = parsedJson.sub_part_cos;  
    if(sub_part_cos!=null){
      sub_part_cos = formato_numero(sub_part_cos, 2, ',', '.');
    }
    var dir_ges_cos = parsedJson.dir_ges_cos;
    if(dir_ges_cos!=null){
      dir_ges_cos = formato_numero(dir_ges_cos, 2, ',', '.');
      }  
    var dir_cord_cos = parsedJson.dir_cord_cos;
    if(dir_cord_cos!=null){
      dir_cord_cos = formato_numero(dir_cord_cos, 2, ',', '.');
      }  
    var dir_cord_nac_cos = parsedJson.dir_cord_nac_cos;
    if(dir_cord_nac_cos!=null){
      dir_cord_nac_cos = formato_numero(dir_cord_nac_cos, 2, ',', '.');;
      }


    var vict_ext_cos = parsedJson.vict_ext_cos;
    if(vict_ext_cos!=null){
      vict_ext_cos = formato_numero(vict_ext_cos, 2, ',', '.');;
      } 
    var grup_proy = parsedJson.grup_proy;
    if(grup_proy!=null){
      grup_proy = formato_numero(grup_proy, 2, ',', '.');
      }     
    var restan = parsedJson.restan;
    if(restan!=null){
      restan = formato_numero(restan, 2, ',', '.');
      } 
        
		$("#num_contrato").val( num_cont );       
		$("#cos_contrato").val( cos_cont );
    $("#restan").html( restan +'<sup style="font-size: 20px">$</sup>' );
    $("#sub_part_cos").html( sub_part_cos +'<sup style="font-size: 20px">$</sup>' );  
    $("#dir_ges_cos").html( dir_ges_cos +'<sup style="font-size: 20px">$</sup>' );
    $("#dir_cord_cos").html( dir_cord_cos +'<sup style="font-size: 20px">$</sup>' );
    $("#dir_cord_nac_cos").html( dir_cord_nac_cos +'<sup style="font-size: 20px">$</sup>' );
    $("#vict_ext_cos").html( vict_ext_cos +'<sup style="font-size: 20px">$</sup>' );
    $("#grup_proy").html( grup_proy +'<sup style="font-size: 20px">$</sup>' );
    $("#id_contrato").val( id_contrato );
    //  $("#cole").html( dir_cord_cos +'<sup style="font-size: 20px">$</sup>');
        if(estato!="si"){
            $("#p_guarda").css("display", "none");
            $("#p_edita").css("display", "block");
        }
	},"json");

	// $.post( "../../controllers/mcontratos_controller", { action: "search_presupuesto_asignado",num_contrato}).done(function( data ) {
	// 	var parsedJson = $.parseJSON(data);
    
	// 	var num_cont = parsedJson.num_contrato;
  //   var num_contrato = parsedJson.num_contrato;
  //   var cos_cont = parsedJson.cos_contrato;

  //   if(cos_cont!=null){
  //       cos_cont = formato_numero(cos_cont, 2, ',', '.');
  //     }        
  //   var estato = parsedJson.estado;
  //   if(estato!=null){
  //     estato = formato_numero(estato, 2, ',', '.');
  //     }  
  //   var sub_part_cos = parsedJson.sub_part_cos;  
  //   if(sub_part_cos!=null){
  //     sub_part_cos = formato_numero(sub_part_cos, 2, ',', '.');
  //   }
  //   var dir_ges_cos = parsedJson.dir_ges_cos;
  //   if(dir_ges_cos!=null){
  //     dir_ges_cos = formato_numero(dir_ges_cos, 2, ',', '.');
  //     }  
  //   var dir_cord_cos = parsedJson.dir_cord_cos;
  //   if(dir_cord_cos!=null){
  //     dir_cord_cos = formato_numero(dir_cord_cos, 2, ',', '.');
  //     }  
  //   var dir_cord_nac_cos = parsedJson.dir_cord_nac_cos;
  //   if(dir_cord_nac_cos!=null){
  //     dir_cord_nac_cos = formato_numero(dir_cord_nac_cos, 2, ',', '.');;
  //     }




  //   var vict_ext_cos = parsedJson.vict_ext_cos;
  //   if(vict_ext_cos!=null){
  //     vict_ext_cos = formato_numero(vict_ext_cos, 2, ',', '.');;
  //     } 
  //   var grup_proy = parsedJson.grup_proy;
  //   if(grup_proy!=null){
  //     grup_proy = formato_numero(grup_proy, 2, ',', '.');
  //     }     
  //   var restan = parsedJson.restan;
  //   if(restan!=null){
  //     restan = formato_numero(restan, 2, ',', '.');
  //     } 
        
	// 	$("#num_contrato").val( num_cont );       
	// 	$("#cos_contrato").val( cos_cont );
  //   $("#restan").html( restan +'<sup style="font-size: 20px">$</sup>' );
  //   $("#sub_part_cos").html( sub_part_cos +'<sup style="font-size: 20px">$</sup>' );  
  //   $("#dir_ges_cos").html( dir_ges_cos +'<sup style="font-size: 20px">$</sup>' );
  //   $("#dir_cord_cos").html( dir_cord_cos +'<sup style="font-size: 20px">$</sup>' );
  //   $("#dir_cord_nac_cos").html( dir_cord_nac_cos +'<sup style="font-size: 20px">$</sup>' );
  //   $("#vict_ext_cos").html( vict_ext_cos +'<sup style="font-size: 20px">$</sup>' );
  //   $("#grup_proy").html( grup_proy +'<sup style="font-size: 20px">$</sup>' );
  //   //  $("#cole").html( dir_cord_cos +'<sup style="font-size: 20px">$</sup>');
  //       if(estato=="si"){
  //           $("#p_guarda").css("display", "none");
  //           $("#p_edita").css("display", "block");
  //       }
	// },"json");




});


// $.post( "../../controllers/mcontratos_controller", { action: "search_asig_presupuesto"}).done(function( data ) {
// 	var parsedJson = $.parseJSON(data);

// 			$("#sub_participacion").val(parsedJson.sub_participacion);
//       $("#dir_inter").val(parsedJson.dir_inter);
// 			$("#subdir_snariv").val(parsedJson.subdir_snariv);
// 			$("#subdir_snariv").val(parsedJson.subdir_snariv);
// 			$("#subdir_nac").val(parsedJson.subdir_nac);
// 			$("#grup_proy").val(parsedJson.grup_proy);
//       $("#vic_ext").val(parsedJson.vic_ext);
     


// 	});

am4core.ready(function() {




//############################################################################
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.PieChart3D);
// Add data
var datum = [];

$.post( "../../data_json/data_dashboard1.php").done(function( data ) {
      var parsedJson = $.parseJSON(data);
      datum=parsedJson;
      datum.pop();
});



setTimeout(function() {	

     // chart.legend = new am4charts.Legend();

      chart.data = datum;
     // chart.legend.maxHeight = 100;
     // chart.legend.scrollable = true;
      //chart.innerRadius = am4core.percent(50);
      var title = chart.titles.create();
      title.text = "Presupuesto ejecutado ($)";
      title.fontSize = 16;
      title.marginBottom = 30;

      // Add and configure Series
      var pieSeries = chart.series.push(new am4charts.PieSeries3D());
      pieSeries.dataFields.value = "valor";
      pieSeries.dataFields.category = "region";
      pieSeries.slices.template.stroke = am4core.color("#fff");
      pieSeries.slices.template.strokeOpacity = 1;
      pieSeries.labels.template.maxWidth = 120;
      pieSeries.labels.template.wrap = true;

      pieSeries.colors.list = [
        am4core.color("#ffff80"),
        am4core.color("#93b980"),
        am4core.color("#81a6b9"),
        am4core.color("#80c3d3"),
        am4core.color("#e2eed0"),
        am4core.color("#ffaa81")
      ];
      // This creates initial animation
    //  pieSeries.labels.template.maxWidth = 90;
    //  pieSeries.labels.template.wrap = true;
      pieSeries.labels.template.text = "[bold font-size: 10px]{category} -> {value.percent.formatNumber('#.0')}%";
      pieSeries.hiddenState.properties.opacity = 1;
      pieSeries.hiddenState.properties.endAngle = -90;
      pieSeries.hiddenState.properties.startAngle = -90;
      pieSeries.slices.template.tooltipText = "{category}: [bold font-size: 12px]{value.value}($)";     

      chart.hiddenState.properties.radius = am4core.percent(0);
}, 500);

//#######################################################################################

var chart2 = am4core.create("chartdiv2", am4charts.XYChart3D);

var datum2 = [];

$.post( "../../data_json/data_dashboard2.php").done(function( data ) {
      var parsedJson2 = $.parseJSON(data);
      datum2=parsedJson2;
     // datum2.pop();
});


setTimeout(function() {	

    chart2.data = datum2;
    chart2.legend = new am4charts.Legend();
// Create axes
    let categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    categoryAxis.renderer.labels.template.rotation = 270;          
    categoryAxis.renderer.labels.template.hideOversized = false;
    categoryAxis.renderer.labels.template.disabled = false; 
    categoryAxis.renderer.labels.template.truncate = true;  
    categoryAxis.renderer.labels.template.maxWidth = 120;      
    categoryAxis.renderer.minGridDistance = 10;
    categoryAxis.renderer.labels.template.fontSize = 10;    
    categoryAxis.renderer.labels.template.horizontalCenter = "right";
    categoryAxis.renderer.labels.template.verticalCenter = "middle";
    categoryAxis.tooltip.label.rotation = 270;
    categoryAxis.tooltip.label.horizontalCenter = "right";
    categoryAxis.tooltip.label.verticalCenter = "middle";

    let valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "Presupuesto ejecutado ($)";
    valueAxis.title.fontWeight = "bold";

    // Create series
    var series = chart2.series.push(new am4charts.ColumnSeries3D());
    series.dataFields.valueY = "valor";
    series.dataFields.categoryX = "departamento";
    series.name = "Departamentos";
    series.tooltipText = "{categoryX}: [bold font-size: 12px]{valueY}[/]($)";
    series.columns.template.fillOpacity = .8;    
    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;
    columnTemplate.stroke = am4core.color("#FFFFFF");

    columnTemplate.adapter.add("fill", function(fill, target) {
    return chart2.colors.getIndex(target.dataItem.index);
    })

    columnTemplate.adapter.add("stroke", function(stroke, target) {
    return chart2.colors.getIndex(target.dataItem.index);
    })

    chart2.cursor = new am4charts.XYCursor();
    chart2.cursor.lineX.strokeOpacity = 0;
    chart2.cursor.lineY.strokeOpacity = 0;
}, 2000);

//############################################################################

// Create chart instance
var chart3 = am4core.create("chartdiv3", am4charts.PieChart3D);
// Add data
var datum3 = [];

// $.post( "../../controllers/mcontratos_controller", { action: "search_act"}).done(function( data ) {
//       var parsedJson3 = $.parseJSON(data);
//       var individual = parsedJson3.sub_part_cos1;
//       var reubicado = parsedJson3.dir_ges_cos1;
//       var colectivo = parsedJson3.dir_cord_cos1;
      
//      datum3 = [{
//                 "nombre": "Individual",
//                 "valor": individual
//               }, {
//                 "nombre": "Retornos y Reubicaciones",
//                 "valor": reubicado
//               }, {
//                 "nombre": "Colectivos",
//                 "valor": colectivo
//      }];

// },"json");

     setTimeout(function() {	


 chart3.data = datum3;

//  var title3 = chart3.titles.create();
//  title3.text = "Presupuesto  ejecutado por tipo de evento ($)";
//  title3.fontSize = 16;
//  title3.marginBottom = 30;

 // Add and configure Series
//  var pieSeries2 = chart3.series.push(new am4charts.PieSeries3D());
//  pieSeries2.dataFields.value = "valor";
//  pieSeries2.dataFields.category = "nombre";
//  pieSeries2.slices.template.stroke = am4core.color("#fff");
//  pieSeries2.slices.template.strokeOpacity = 1;
//  pieSeries2.labels.template.maxWidth = 120;
//  pieSeries2.labels.template.wrap = true;

//  pieSeries2.colors.list = [
//    am4core.color("#00a65a"),
//    am4core.color("#f39c12"),
//    am4core.color("#dd4b39")
//  ];
 // This creates initial animation
//  pieSeries.labels.template.maxWidth = 90;
//  pieSeries.labels.template.wrap = true;
//    

 chart3.hiddenState.properties.radius = am4core.percent(0);
}, 1500);




}); // end am4core.ready()

            function alsalir(e){
               var caso1=document.getElementById(e).value;
                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }
            }

            function monto_alsalir(e){
               var monto=document.getElementById(e).value;

                if(caso1.length < 2){
                   	document.getElementById('ms_'+ e).innerHTML = 'Debe escribir al menos 2 caractéres';
                }else{
                   document.getElementById('ms_'+ e).innerHTML = '';
                }

                // $("#sub_participacion").val(formato_numero(monto,'2','.',','));
                document.getElementById("sub_participacion").innerHTML = formato_numero(monto,'2','.',',');
            }

            function esnumint(e) {

                    k = (document.all) ? e.keyCode : e.which;
                    if (k==8 || k==0 || k==13) return true;
                    patron = /[0-9]/;
                    n = String.fromCharCode(k);

                                    if(patron.test(n)==''){

                                        document.getElementById('ms_num_contrato').style.display = 'block';
                                        document.getElementById("ms_num_contrato").innerHTML = 'Use solo números';
                                            return patron.test(n);

                                    }else{

                                        document.getElementById("ms_num_contrato").innerHTML = '';
                                        return patron.test(n);

                                    }

            }

            function esnum(e) {

                    k = (document.all) ? e.keyCode : e.which;
                    if (k==8 || k==0 || k==13) return true;
                    patron = /[0-9\.]/;
                    n = String.fromCharCode(k);

                                    if(patron.test(n)==''){

                                        document.getElementById('ms_cos_contrato').style.display = 'block';
                                        document.getElementById("ms_cos_contrato").innerHTML = 'Use solo números y punto decimal';
                                            return patron.test(n);

                                    }else{

                                        document.getElementById("ms_cos_contrato").innerHTML = '';
                                        return patron.test(n);

                                    }

            }        
////******************************************* */

            function esnum_vic_ext(e) {

                    k = (document.all) ? e.keyCode : e.which;
                    if (k==8 || k==0 || k==13) return true;
                    patron = /[0-9\.]/;
                    n = String.fromCharCode(k);

                                    if(patron.test(n)==''){

                                        document.getElementById('ms_vic_ext').style.display = 'block';
                                        document.getElementById("ms_vic_ext").innerHTML = 'Use solo números y punto decimal';
                                            return patron.test(n);

                                    }else{

                                        document.getElementById("ms_vic_ext").innerHTML = '';
                                        return patron.test(n);

                                    }

            }   
          
          
   function esnum_sub_participacion(e) {

                  k = (document.all) ? e.keyCode : e.which;
                  if (k==8 || k==0 || k==13) return true;
                  patron = /[0-9\.]/;
                  n = String.fromCharCode(k);

                      if(patron.test(n)==''){

                          document.getElementById('ms_sub_participacion').style.display = 'block';
                          document.getElementById("ms_sub_participacion").innerHTML = 'Use solo números y punto decimal';
                              return patron.test(n);

                      }else{

                          document.getElementById("ms_sub_participacion").innerHTML = '';
                          return patron.test(n);

                      }

      } 


              function esnum_dir_inter(e) {

            k = (document.all) ? e.keyCode : e.which;
            if (k==8 || k==0 || k==13) return true;
            patron = /[0-9\.]/;
            n = String.fromCharCode(k);

                if(patron.test(n)==''){

                    document.getElementById('ms_dir_inter').style.display = 'block';
                    document.getElementById("ms_dir_inter").innerHTML = 'Use solo números y punto decimal';
                        return patron.test(n);

                }else{

                    document.getElementById("ms_dir_inter").innerHTML = '';
                    return patron.test(n);

                }

            } 


function esnum_subdir_snariv(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9\.]/;
n = String.fromCharCode(k);

    if(patron.test(n)==''){

        document.getElementById('ms_subdir_snariv').style.display = 'block';
        document.getElementById("ms_subdir_snariv").innerHTML = 'Use solo números y punto decimal';
            return patron.test(n);

    }else{

        document.getElementById("ms_subdir_snariv").innerHTML = '';
        return patron.test(n);

    }

} 

function esnum_subdir_nac(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9\.]/;
n = String.fromCharCode(k);

    if(patron.test(n)==''){

        document.getElementById('ms_subdir_nac').style.display = 'block';
        document.getElementById("ms_subdir_nac").innerHTML = 'Use solo números y punto decimal';
            return patron.test(n);

    }else{

        document.getElementById("ms_subdir_nac").innerHTML = '';
        return patron.test(n);

    }

} 

function esnum_grup_proy(e) {

k = (document.all) ? e.keyCode : e.which;
if (k==8 || k==0 || k==13) return true;
patron = /[0-9\.]/;
n = String.fromCharCode(k);

    if(patron.test(n)==''){

        document.getElementById('ms_grup_proy').style.display = 'block';
        document.getElementById("ms_grup_proy").innerHTML = 'Use solo números y punto decimal';
            return patron.test(n);

    }else{

        document.getElementById("ms_grup_proy").innerHTML = '';
        return patron.test(n);

    }

}

//// **********************************************

$("#p_guarda" ).click(function() {

$.post( "../../controllers/mcontratos_controller", {

    action: "add",

    num_contrato: $("#num_contrato").val(),
    cos_contrato: $("#cos_contrato").val(),
    // sub_participacion: $("#sub_participacion").val(),
    // dir_inter: $("#dir_inter").val(),
    // cos_contrato: $("#cos_contrato").val(),
    // subdir_snariv: $("#subdir_snariv").val(),
    // subdir_nac: $("#subdir_nac").val(),
    // grup_proy: $("#grup_proy").val(),
    // vic_ext: $("#vic_ext").val()


    }).done(function(data){

        var parsedJson = $.parseJSON(data);
        $(".message").html(parsedJson.mensaje);

        if(parsedJson.resultado != 'error'){

            setTimeout(function(){

                    $(location).attr('href','dashboard');

            }, 1500);

        }

    },"json");

});  

//// **********************************************

            $("#p_asignar" ).click(function() {

                    $.post( "../../controllers/mcontratos_controller", {

                        action: "asignar",

                        id_contrato: $("#id_contrato").val(),
                        sub_participacion: $("#sub_participacion").val(),
                        dir_inter: $("#dir_inter").val(),
                        cos_contrato: $("#cos_contrato").val(),
                        subdir_snariv: $("#subdir_snariv").val(),
                        subdir_nac: $("#subdir_nac").val(),
                        grup_proy: $("#grup_proy").val(),
                        vic_ext: $("#vic_ext").val()


                        }).done(function(data){

                            var parsedJson = $.parseJSON(data);
                            $(".message").html(parsedJson.mensaje);

                            if(parsedJson.resultado != 'error'){

                                setTimeout(function(){
                                  

                                        $(location).attr('href','dashboard');

                                }, 1500);

                            }

                        },"json");

            });  
            
 
           
              $("#p_edita" ).click(function() {
           
                $.post( "../../controllers/mcontratos_controller", {

                    action: "edit",

                    num_contrato: $("#num_contrato").val(),
                    cos_contrato: $("#cos_contrato").val(),
                    id_contrato: $("#id_contrato").val()


                    }).done(function(data){

                        var parsedJson = $.parseJSON(data);
                        $(".message").html(parsedJson.mensaje);

                        if(parsedJson.resultado != 'error'){
                             
                            setTimeout(function(){
                              var value=true;
                              
                              $(location).attr('href','dashboard?control_total='+value);
                             

                            }, 1500);
                              
                        }

                    },"json");

            });   

  function formato_numero(numero, decimales, separador_decimal, separador_miles) {
		numero = parseFloat(numero);
		if (isNaN(numero)) {
			return "";
		}

		if (decimales !== undefined) {
			// Redondeamos
			numero = numero.toFixed(decimales);
		}

		// Convertimos el punto en separador_decimal
		numero = numero.toString().replace(".", separador_decimal !== undefined ? separador_decimal : ",");

		if (separador_miles) {
			// Añadimos los separadores de miles
			var miles = new RegExp("(-?[0-9]+)([0-9]{3})");
			while (miles.test(numero)) {
				numero = numero.replace(miles, "$1" + separador_miles + "$2");
			}
		}

		return numero;
	}


</script>

<?php include_once("../layouts/pie.php") ?>
