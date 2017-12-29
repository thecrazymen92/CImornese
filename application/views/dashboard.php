<?php 
  if(isset($usuario)){
    //var_dump($usuario);
  }
?>
    <div class="content-wrapper graficos">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <h3>Incidencia de headsets</h3>
                        <div id="chart1" class="chart-box"></div>
                    </div>
                    <div class="col-md-3">
                        <h3>Incidencias por Area</h3>
                        <div id="chart2" class="chart-box"></div>
                    </div>
                    <div class="col-md-3">
                        <h3>Motivos de incidencias</h3>
                        <div id="chart3" class="chart-box"></div>
                    </div>
                    <div class="col-md-3">
                        <h3>Incidencia x area x mes</h3>
                        <div id="chart4" class="chart-box"></div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                     <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Campaña</th>
                                            <th>Posición</th>
                                            <th>Fecha </th>
                                            <th>Motivo</th>
                                            <th>Ticket</th>
                                            <th>botones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td># 2501</td>
                                            <td>01/22/2015 </td>
                                            <td>
                                                <label class="label label-info">300 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                             <td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
                                        </tr>
                                        <tr>
                                            <td># 15091</td>
                                            <td>12/12/2014 </td>
                                            <td>
                                                <label class="label label-danger">7000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                            <td>
                                                <label class="label label-warning">Shipped</label></td>
                                            <td>N/A</td>
                                             <td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
                                        </tr>
                                        <tr>
                                            <td># 11291</td>
                                            <td>12/03/2014 </td>
                                            <td>
                                                <label class="label label-warning">7000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/23/2015</td>
                                             <td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
                                        </tr>
                                        <tr>
                                            <td># 1808</td>
                                            <td>11/10/2014 </td>
                                            <td>
                                                <label class="label label-success">2000 USD </label>
                                            </td>
                                            <td>
                                                <label class="label label-success">Delivered</label></td>
                                            <td>01/25/2015</td>
                                            <td>
                                                <label class="label label-info">Returned</label></td>
                                            <td>N/A</td>
                                             <td> <button class="btn btn-xs btn-danger editar">Editar</button> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                </div>

            </div>
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
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
//        title: "Density of Precious Metals, in g/cm^3",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chart1"));
      chart.draw(view, options);

        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

//        var options = {title: 'My Daily Activities'};

        var chart2 = new google.visualization.PieChart(document.getElementById('chart2'));

        chart2.draw(data2, options);

        var data3 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
//          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart3 = new google.visualization.PieChart(document.getElementById('chart3'));
        chart3.draw(data3, options);

        var data4 = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
//          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart4 = new google.visualization.AreaChart(document.getElementById('chart4'));
        chart4.draw(data4, options);
  }

  </script>

  <div id="popup-form" style="display: none;">
    <div class="col-md-12 nopadding">
    <div class="col-md-12 head">
        <h2 class="col-md-12">Edit/Register(ticket)</h2>
    </div>
    <div class="col-md-12 body">
    


<div class="col-md-6">
    
        <label for="input1" class="col-md-4">Dispositivo</label>
        <select for="input1" class="col-md-8">
            <option value="value1">MORNESE 1391</option>
            <option value="value2">MORNESE 1500</option>


        </select>
    </div>

<div class="col-md-6">
    
        <label for="input2" class="col-md-4">Modelo</label>
        <input value="326" for="input2" class="col-md-8" disabled="">
    </div><div class="col-md-6">
    
        <label for="input3" class="col-md-4">Marca</label>
        <input value="Plantronics" for="input3" class="col-md-8" disabled="">
    </div>

<div class="col-md-6">
    
        <label for="input4" class="col-md-4">Posicion</label>
        <select for="input4" class="col-md-8">
            <option value="value1">Ocoña1 - 012</option>
            
<option value="value2">Ocoña5 - 036</option>
<option value="value2">camana5 - 036</option><option value="value2">camana6 - 036</option>
        </select>
    </div><div class="col-md-6">
    
        <label for="input5" class="col-md-4">Tipo incidencia</label>
        <select for="input5" class="col-md-8">
            <option value="value1">Fallo de uno de los auriculares</option>
            <option value="value2">Auriculares entrecortados </option>
<option value="value3">Roto</option>
<option value="value4">Reemplazo por nuevo modelo</option>
<option value="value5">Micrófono averiado</option>
<option value="value6">Cable roto de auricular</option>


        </select>
    </div><div class="col-md-6">
    
        <label for="input6" class="col-md-4">Ticket</label>
        <input for="input6" class="col-md-8">
    </div>

    </div>
<div class="col-md-12 footer">
    
<div class="col-md-2"><label></label><button id="popup-submit" class="btn btn-lg btn-danger">Guardar</button></div><div class="col-md-2"><label></label><button id="popup-cancel" class="btn btn-lg btn-danger">Cancelar</button></div><div class="col-md-8">
    <label for="popup-form-area" class="col-md-12">Descripcion</label><textarea id="popup-form-area" class="col-md-12"></textarea>
</div>
    
</div>
    </div>
</div>
<style>
#popup-form {}

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
    position: absolute;
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

#popup-form input, #popup-form select {
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
</style>
<script type="text/javascript">
    $('select[for="input1"]').change(function(){
        $('input[for="input2"]').val(($(this).val()=="value1"?"326":"BIZ 2300"));
        $('input[for="input3"]').val(($(this).val()=="value1"?"Plantronics":"Jabra"));
    });
    $('#popup-form .footer button').click(function(){
        $(this).parent().parent().parent().parent().hide();
    });
    $("button.editar").click(function(){
      $('#popup-form').show();
    });
</script>