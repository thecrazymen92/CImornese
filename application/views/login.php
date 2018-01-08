<link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
<div id="login-form">
    <h1>Login</h1>
    <fieldset>
        <form action="<?php echo base_url();?>login/loginparams/" method="post">
            <input value="" id="usuario" name="usuario" type="text" required placeholder="">
            <input value="" id="clave" name="clave" type="password" required placeholder="">
            <input type="submit" value="Login">
        </form>
    </fieldset>
</div> 
<script>

    $("#login").click(function(){
        
        
        var usuario = $("#usuario").val();
        var clave = $("#clave").val();
        
        if(usuario == "" && clave==""){
            alert('llenar campos');
            return false;
        } else {
            
            $("#notification_div").html('<div class="alert alert-info" role="alert">Please wait...</div>');
            var dataString  = { usuario  : usuario , clave : clave };

                $.ajax({
    
                    type: "POST",
                    url: "<?php echo base_url();?>login/loginparams/",
                    data: dataString,
                    dataType: "json",
                    cache       : false,
                    success: function(data){

                        $("#notification_div").html('<div class="alert alert-success" role="alert">Success add to cart...</div>');
                        //$("#update_cart").html(data.update_cart);
              
                    } ,error: function(xhr, status, error) {
                        console.log(status);
                    },
                });
                
        }
        
    });
</script>