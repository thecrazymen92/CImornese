<?php 
  if(isset($lista_incidencias)){
    //var_dump($usuario);
  }
?>
    <div class="content-wrapper graficos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 chart-col">
                        <h3>Incidencia de headsets</h3><i class="glyphicon glyphicon-wrench"></i>
                        <div id="chart1" class="chart-box"></div>
                    </div>
                    <div class="col-md-3 chart-col">
                        <h3>Incidencias por Area</h3><i class="glyphicon glyphicon-wrench"></i>
                        <div id="chart2" class="chart-box"></div>
                    </div>
                    <div class="col-md-3 chart-col">
                        <h3>Motivos de incidencias</h3><i class="glyphicon glyphicon-wrench"></i>
                        <div id="chart3" class="chart-box"></div>
                    </div>
                    <div class="col-md-3 chart-col">
                        <h3>Incidencia x area x mes</h3><i class="glyphicon glyphicon-wrench"></i>
                        <div id="chart4" class="chart-box"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 opciones">
              <div class="left ilb">
                <button class="btn btn-warning nincidencia">nueva incidencia</button>
                <button class="btn btn-warning nmotivo">nuevo motivo</button>
                <button class="btn btn-success ndispositivo">nuevo dispositivo</button>
                <!-- <button class="btn btn-success nmodelo">nuevo modelo</button>
                <button class="btn btn-success nmarca">nueva marca</button> -->
              </div>
            </div>
<?php 
  if(isset($lista_incidencias)){
?>
            <div class="row">
                <div class="col-md-12">
                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Etiqueta</th>
                                            <th>Modelo</th>
                                            <!--<th>Campaña</th>-->
                                            <th>Posición</th>
                                            <th>Motivo</th>
                                            <th>Fecha </th>
                                            <th>Ticket</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                      while ($una_incidencia=$lista_incidencias->unbuffered_row()){
                                        
                                      ?>
                                        <tr incidencia-id="<?php echo $una_incidencia->id_incidencia; ?>">
                                        <td><?php echo "Mornese - ".$una_incidencia->etiqueta; ?></td>
                                        <td><?php echo $una_incidencia->modelo; ?></td>
                                        <td><?php echo $una_incidencia->posicion; ?></td>
                                        <td><?php echo $una_incidencia->descripcion; ?></td>
                                        <td><?php echo $una_incidencia->fecha; ?></td>
                                        <td><?php echo $una_incidencia->ticket; ?></td>
                                        <td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
                                        </tr>

                                      <?php 
                                      }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                </div>

            </div>

            <?php 
  }
?>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container copyright">
            <div class="row">
                <div class="col-md-12"><?= date('Y') ?> Mornese</div>

            </div>
        </div>
    </footer>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="/login/assets/js/datepick.js"></script>


<style>/* popupform */

  #popup-form {
    overflow-y: scroll;
  }

  #popup-form::-webkit-scrollbar {
      display: none;
  }
  #popup-form .head {
      text-align:  center;
      color:  #fff;
      background: #E52422;
  }

  .nopadding {
      padding: 0;
  }

  div#popup-form {
      width: 80vw;
      height: 80vh;
      top: 10vh;
      left: 10vw;
      position: fixed;
      background: #101010;
      border-radius: 20px;
      overflow:  hidden;
      box-shadow: 0px 0px 1vw 0vw #ffffff50;
  }

  #popup-form .head {
      /* border-radius: 20px; */
  }

  #popup-form .head h2 {
      text-decoration:  underline;
      margin: 15px;
  }

  .col-md-12.body {}

  #popup-form .body {
      padding: 3% 3% 0% 3%;
  }

  #popup-form .footer {
      padding:  3% 3% 3% 3%;
      display:  flex;
      flex-direction: row-reverse;
  }

  #popup-form .footer * {
      float:  right;
      /* display:  inline-block; */
  }

  #popup-form input, #popup-form select, #popup-form label {
      height:  30px;
      margin: 5px;
  }

  #popup-form label {
      width: calc((100% / 3) - 10px);
      padding: 0;
      color:  #ffffff;
  }

  #popup-form input, #popup-form select.col-md-8 {
      width: calc((200% / 3) - 10px);
  }

  #popup-form .footer button {
      width: 100%;
  }

  select:disabled, input:disabled, textarea:disabled {
      background: #ddd;
  }

  label.col-md-12 {}

  #popup-form label[for="popup-form-area"] {
      width: 100%;
      display:  inline-block;
      float:  left;
  }

//
/* POPUP GRAFICOS */

  #popup-form .graficos label {
      width:  100%;
  }

  #popup-form input, #popup-form select {
      width:  100%;
  }

  div#popup-form {
      z-index: 1;
  }
  table.table-condensed {
      color: #fff;
      background: #222;
      border-radius: 10px;
      padding: 10px !important;
  }

  table.table-condensed .day.old, table.table-condensed .day.new {
      color: #888;
  }

  table.table-condensed .dow {
      color: #E52422;
  }

  th.dow, th.day, th.switch {
      padding:  0px !important;
      text-align:  center !important;
  }

  th.prev i:before, th.next i:before {
      content: "<";
  }

  th.next {
      transform: rotateY(180deg);
  }

  th.prev, th.next {
      text-align:  center;
      font-family:  sans-serif;
  }
  .datetimepicker-minutes, .datetimepicker-hours {
  //    display:  none !important;
  }

  .datetimepicker-days {
  //    display:  block !important;
  }
  #popup-form input.col-md-3, #popup-form select.col-md-3 {
    width: calc( 25% - 25px);
  }

  #popup-form .graficos label.col-md-10 {
      width: calc((100% - (50% / 3)) - 10px);
  }

  #popup-form input.col-md-6, #popup-form label.col-md-6 {
      width: calc(50% - 10px);
  }

  #popup-form input.col-md-4, #popup-form label.col-md-4 {
      width: calc(33% - 10px);
  }

  #popup-form input.col-md-8, #popup-form label.col-md-8 {
      width: calc(66% - 10px);
  }

  #popup-form input.col-md-9, #popup-form label.col-md-9 {
      width: calc(75% - 10px);
  }

  #popup-form input.col-md-2, #popup-form label.col-md-2 {
      width: calc(25% - 10px);
  }

  input[type=radio], input[type=checkbox] {
      max-height: 15px;
      position:  relative;
      display:  inline-flex;
  }

  #popup-form input.col-md-2, #popup-form label.col-md-2 {
      width: calc(50% / 3 - 10px);
  }

  .flex-margins {
      display:  flex;
  }

  .flex-margins * {
      margin:  auto !important;
  }

  #popup-form .graficos label.col-md-3 {
      width: calc(25% - 10px);
  }

  #popup-form .footer.graficos * {
      float:  none;
      display: inline-flex;
      /* margin:  auto; */
  }

  #popup-form .footer.graficos {
      text-align:  center;
      padding: 5% 15% 5% 5%;
  }
  label.col-md-12 {
    width: 100% !important;
  }

  .center {
      text-align:  center;
  }

/* estilos de tabla */
  .table-responsive th {
      width: calc((100% - 17px) / 7);
  }

  .table-responsive td {
      width: calc(100% / 6);
  }

  .table-responsive thead {
      width: 100%;
  }

  .table-responsive tbody {
      overflow: scroll;
      width: 100%;
      max-height: 500px;
      display: inline-block;
  }

  .table-responsive tr {
      display: flex;
      width: 100%;
  }

/* graficos y cosas */
  .glyphicon.glyphicon-wrench{
    position: absolute;
    top: 29px;
    right: 0px;
    color: #888;
    cursor: pointer;
  }
  .glyphicon.glyphicon-wrench:before{
    font-size: 15px;
  }
  .left.ilb{float: left;}
  .multi-add fieldset {
    padding: .35em .625em .75em !important;
    margin: 0 2px !important;
    border: 1px solid #c0c0c0 !important;
  }

  .multi-add legend {
      width: auto;
      padding: 0 5px;
      margin-bottom: 0;
      font-size: 14px;
      border-bottom:  0;
      color:white;
  }

  .multi-add i.glyphicon.glyphicon-plus {
      margin-right: 5px;
  }

  #popup-form input.col-md-6, #popup-form select.col-md-6 {
      width: calc(50% - 25px);
  }
</style>
<script type="text/javascript">
    $('select[for="input1"]').change(function(){
        $('input[for="input2"]').val(($(this).val()=="value1"?"326":"BIZ 2300"));
        $('input[for="input3"]').val(($(this).val()=="value1"?"Plantronics":"Jabra"));
    });
    $('#popup-form .footer button').click(function(){
        $(this).parent().parent().parent().parent().hide();
    });
    /*$("button.editar").click(function(){
      $('#popup-form').show();
    });
    $(function () {
            $('#date1').datetimepicker({
                //altFormat: "yy-mm-dd",
                format: 'MM/YYYY',
                //viewMode:"years",
                //disabledTimeIntervals:true,
                //disabledHours:true,
                //debug:true,
                //inline: true,
                //sideBySide: false,
                //pickTime: false
            });
        });
    $(function () {
            $('#date2').datetimepicker({
                //altFormat: "yy-mm-dd",
                //format: 'DD/MM/YYYY',
                //disabledTimeIntervals:true,
                //disabledHours:true,
                //debug:true,
                inline: false,
                sideBySide: false,
                pickTime: false
            });
        });*/
    selectedincidencia=1;
    $("button.nmotivo").click(function(){
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>nuevo_motivo",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#cancel").click(function(){$("#popup-form").remove();});
          $("#popup-submit").click(function(){
          var dataString  = {
            motivo : $('#tipo_incidencia').val()
          };
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>add_motivo",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $("#popup-form").remove();
          });
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });
    /*$("button.nmarca").click(function(){
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>nueva_marca",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#cancel").click(function(){$("#popup-form").remove();});
          $("#popup-submit").click(function(){
          var dataString  = {
            marca : $('#marca').val()
          };
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>add_marca",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $("#popup-form").remove();
          });
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });*/
    /*$("button.nmodelo").click(function(){
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>nuevo_modelo",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#cancel").click(function(){$("#popup-form").remove();});
          $("#popup-submit").click(function(){
          var dataString  = { 
            marca : $('#marca').val(),  
            modelo : $('#modelo').val()
          };
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>add_modelo",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $("#popup-form").remove();
          });
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });*/
    $("button.ndispositivo").click(function(){
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>nuevo_dispositivo",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#cancel").click(function(){$("#popup-form").remove();});
          $(".dispositivo .btn.btn-success").click(function(){
            var dataString  = { 
              etiqueta : $('#dispositivo').val(), 
              modelo : $('#keymodelo').val()
            };
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>add_dispositivo",
              dataType: "html",
              data:dataString,
              cache   : false,
              success: function(data){
                console.log(data);
              } ,error: function(xhr, status, error) {
                console.log(status);
              },
            });
            //$("#popup-form").remove();
          });

          $(".modelo .btn.btn-success").click(function(){
            var dataString  = { 
              marca : $('#keymarca').val(),  
              modelo : $('#modelo').val()
            };
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>add_modelo",
              dataType: "html",
              data:dataString,
              cache   : false,
              success: function(data){
                console.log(data);
              } ,error: function(xhr, status, error) {
                console.log(status);
              },
            });
            //$("#popup-form").remove();
          });

          $(".marca .btn.btn-success").click(function(){
            var dataString  = {
              marca : $('#marca').val()
            };
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>add_marca",
              dataType: "html",
              data:dataString,
              cache   : false,
              success: function(data){
                console.log(data);
              } ,error: function(xhr, status, error) {
                console.log(status);
              },
              });
              //$("#popup-form").remove();
          });
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
    }
    });
    $("button.nincidencia").click(function(){
      selectedincidencia=$(this).parent().parent().attr("incidencia-id");
      console.log(selectedincidencia);
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>nueva_incidencia",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#popup-submit").click(function(){
        var dataString  = { dispositivo : $('#dispositivo option:checked').val(), 
                            espacio : $('#espacio').val(), 
                            posicion : $('#posicion').val(),
                            tipo_incidencia : $('#tipo_incidencia option:checked').val(),
                            ticket : $('#ticket').val(),
                            descripcion : $('#popup-form-area').val() };
        console.log(dataString.dispositivo);
        if (dataString.dispositivo=="--" | dataString.ticket=="") {alert("faltan campos por llenar: "+(dataString.dispositivo=="--"?"elegir dispositivo, ":"")+(dataString.ticket=="--"?"llenar ticket dispositivo, ":(dataString.ticket.length<16?"ticket invalido, revisar ticket, ":"")));}
        else{
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>add_incidencia",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });$("#popup-form").remove();
        }
          });
          $("#cancel").click(function(){$("#popup-form").remove();});
          //console.log(data);
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });

    $('.table-responsive .editar').click(function(){
      selectedincidencia=$(this).parent().parent().attr("incidencia-id");
      console.log(selectedincidencia);
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>editar",
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
              $("#dispositivo").val(selectedincidencia).trigger('change');
              espaciox=$("[incidencia-id="+selectedincidencia+"] td:nth-child(3)").text();
              $("#espacio option:contains('"+(espaciox.substring(0,1)=="C"?"camana":"ocoña")+espaciox.substring(2,3)+"')").each(function(){$(this).parent().val($(this).val());});
              $("#tipo_incidencia").each(function(){$(this).val($(this).find("option:contains('"+$("[incidencia-id="+selectedincidencia+"] td:nth-child(4)").val()+"')").val());});
              $("#ticket").val($("[incidencia-id="+selectedincidencia+"] td:nth-child(6)").text());
              $("#popup-form-area").val($("[incidencia-id="+selectedincidencia+"] td:nth-child(4)").text());
              // $('#espacio option:checked').val()
              // $('#posicion option:checked').text()
              // $('#tipo_incidencia option:checked').val()
              // $('#ticket').val()
              $('#popup-form-area').val()
          $("#popup-submit").click(function(){
        var dataString  = { id_incidencia : selectedincidencia, 
                            dispositivo : $('#dispositivo option:checked').val(), 
                            espacio : $('#espacio option:checked').val(), 
                            posicion : $('#posicion option:checked').text(),
                            tipo_incidencia : $('#tipo_incidencia option:checked').val(),
                            ticket : $('#ticket').val(),
                            descripcion : $('#popup-form-area').val() };
        console.log(dataString.dispositivo);
        if (dataString.dispositivo=="--" | dataString.ticket=="") {alert("faltan campos por llenar: "+(dataString.dispositivo=="--"?"elegir dispositivo, ":"")+(dataString.ticket=="--"?"llenar ticket dispositivo, ":(dataString.ticket.length<16?"ticket invalido, revisar ticket, ":"")));}
        else{
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>edit",
            dataType: "html",
            data:dataString,
            cache   : false,
            success: function(data){
              console.log(data);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });$("#popup-form").remove();
        }
          });
          $("#cancel").click(function(){$("#popup-form").remove();});
          //console.log(data);
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });
    lastchart=0;
    $('.chart-col .glyphicon.glyphicon-wrench').click(function(){
      chartid=$(this).next().attr('id');
      lastchart=chartid.substring(chartid.length-1,chartid.length);
        opciones=lastchart;
      if ($("#popup-form").length==0){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>graficos/"+opciones,
        dataType: "html",
        cache   : false,
        success: function(data){
          $(data).insertBefore("#allcontent");
          $("#cancel").click(function(){$("#popup-form").remove();});
          $("#popup-submit").click(function(){
            //console.log(lastchart);
            if($("[name=escala]:checked").val()!=undefined){
              eval('dateformat'+lastchart+'="'+$("[name=escala]:checked").val()+'";');
              console.log(dateformat1);
            }
            eval('fechaini'+lastchart+'="'+$('input[for=input2]').val()+'";');
            eval('fechafin'+lastchart+'="'+$('input[for=input3]').val()+'";');
            eval('console.log(fechaini'+lastchart+');console.log(fechafin'+lastchart+');');
            clasificacion="";
            $("[name=clasificacion]:checked").each(function(){clasificacion+=(clasificacion==""?"":"_")+$(this).attr("data-id");});
            clasificacion=(clasificacion==""?"0":clasificacion);
            eval('clasificacion'+lastchart+'=clasificacion;console.log(clasificacion'+lastchart+');');
            drawChart();
            $("#popup-form").remove();
          });
          //console.log(data);
        } ,error: function(xhr, status, error) {
          console.log(status);
        },
      });
      }
    });

    var d = new Date();
    var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
    var strDateOLD = (d.getMonth()==0?(d.getFullYear()-1)+"/"+"12":d.getFullYear() + "/" + (d.getMonth()+1)) + "/" + d.getDate();
</script>
  <script type="text/javascript">
    dateformat1="day";
    fechaini1="0";
    fechafin1="0";
    fechaini2="0";
    fechafin2="0";
    clasificacion2="0";
    fechaini3="0";
    fechafin3="0";
    clasificacion3="0";
    fechaini4="0";
    fechafin4="0";
    clasificacion4="0";
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
          $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>lista_incidencias/"+dateformat1+"/"+fechaini1+"/"+fechafin1,
            dataType: "json",
            cache   : false,
            success: function(data){
              dataget1=Object.values(data.valores);
                var data11 = new google.visualization.DataTable();
                data11.addColumn('string', 'fechas');
                data11.addColumn('number', 'cantidad');
                data11.addRows(dataget1.length);
              for (var i = 0 ; i < dataget1.length; i++) {
                data11.setCell(i, 0, dataget1[i]["fechas"]);
                data11.setCell(i, 1, dataget1[i]["incidencias"]);
              }
                var view11 = new google.visualization.DataView(data11);
                view11.setColumns([0, 1,
                                 { calc: "stringify",
                                   sourceColumn: 1,
                                   type: "string",
                                   role: "annotation" }]);

                var options11 = {
                // title: "Density of Precious Metals, in g/cm^3",
                  bar: {groupWidth: "95%"},
                  legend: { position: "none" },
                  //colors: ['yellow', 'blue', 'orange'],
                };
                var chart11 = new google.visualization.ColumnChart(document.getElementById("chart1"));
                chart11.draw(view11, options11);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>incidencias_area/"+fechaini2+"/"+fechafin2+"/"+clasificacion2,
            dataType: "json",
            cache   : false,
            success: function(data){
              dataget2=Object.values(data.valores);
                var data12 = new google.visualization.DataTable();
                data12.addColumn('string', 'areas');
                data12.addColumn('number', 'incidencias');
                data12.addRows(dataget2.length);
              for (var i = 0 ; i < dataget2.length; i++) {
                data12.setCell(i, 0, dataget2[i]["areas"]);
                data12.setCell(i, 1, dataget2[i]["cantidad"]);
              }
                var view12 = new google.visualization.DataView(data12);
                view12.setColumns([0, 1,
                                 { calc: "stringify",
                                   sourceColumn: 1,
                                   type: "string",
                                   role: "annotation" }]);

                var options12 = {
                  bar: {groupWidth: "95%"},
                  legend: { position: "none" },
                  colors: ['red','blue', 'orange', 'green'],
                };
                var chart12 = new google.visualization.PieChart(document.getElementById("chart2"));
                chart12.draw(view12, options12);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>incidencias_motivos/"+fechaini3+"/"+fechafin3+"/"+clasificacion3,
            dataType: "json",
            cache   : false,
            success: function(data){
              dataget3=Object.values(data.valores);
                var data13 = new google.visualization.DataTable();
                data13.addColumn('string', 'motivos');
                data13.addColumn('number', 'incidencias');
                data13.addRows(dataget3.length);
              for (var i = 0 ; i < dataget3.length; i++) {
                data13.setCell(i, 0, dataget3[i]["motivos"]);
                data13.setCell(i, 1, dataget3[i]["cantidad"]);
              }
                var view13 = new google.visualization.DataView(data13);
                view13.setColumns([0, 1,
                                 { calc: "stringify",
                                   sourceColumn: 1,
                                   type: "string",
                                   role: "annotation" }]);

                var options13 = {
                  bar: {groupWidth: "95%"},
                  legend: { position: "none" },
                  colors: ['red','blue', 'orange', 'green'],
                };
                var chart13 = new google.visualization.PieChart(document.getElementById("chart3"));
                chart13.draw(view13, options13);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
          $.ajax({
            type: "GET",
            url: "<?php echo base_url();?>incidencia_area_mes/"+fechaini4+"/"+fechafin4+"/"+clasificacion4,
            dataType: "json",
            cache   : false,
            success: function(data){
            $("div#allcontent + div").remove();
            $("div#allcontent + div").remove();
            $("div#allcontent + div").remove();
            $("div#allcontent + div").remove();
            $("div#allcontent + div").remove();
            $("div#allcontent + div").remove();
              var arraux4;
              direcciones=Object.values(data.direcciones);
              dataget4=Object.values(data.valores);
              var data14 = new google.visualization.DataTable();
                data14.addColumn('string', 'fecha');
              for (var i = 0 ; i < direcciones.length; i++) {
                data14.addColumn('number', direcciones[i]["direccion"]);
              }
                data14.addRows(dataget4.length/direcciones.length);
              for (var j = 0 ; j < dataget4.length; j=j+direcciones.length) {
                data14.setCell(j/direcciones.length, 0, dataget4[j]["fecha"]);
                for (var k = 1 ; k <= direcciones.length; k++) {
                  data14.setCell(j/direcciones.length, k, dataget4[j+k-1]["cantidad"]);
                }
              }
                var view14 = new google.visualization.DataView(data14);
                var options = {
                  hAxis: {title: '',  titleTextStyle: {color: '#333'}},
                  vAxis: {minValue: 0}
                };

                var chart4 = new google.visualization.AreaChart(document.getElementById('chart4'));
                chart4.draw(data14, options);
            } ,error: function(xhr, status, error) {
              console.log(status);
            },
          });
    }
    //setInterval(function(){ drawChart(); }, 5000);
  </script>