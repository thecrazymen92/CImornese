<div id="popup-form" style="">
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
        <input for="input2" class="col-md-8" disabled="">
    </div><div class="col-md-6">
    
        <label for="input3" class="col-md-4">Marca</label>
        <input for="input3" class="col-md-8" disabled="">
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
</script>