<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/loginXD.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body style="background:#131d39">
<div class="cont1"> 
<img class="avatar" src="<?php echo base_url('/img/cerveza.png'); ?>" >
    <h1>Iniciar Sesión</h1>
    <h2>BREWERY</h2><br>
    <form id="formulario" method="POST" action="<?php echo base_url('/login/inicio'); ?>"  autocomplete="off">
        <label for="username">N° Documento</label>
        <input type="text" maxlength="15" pattern="[0-9]*" placeholder="Ingresar documento" name="docu" id="docu" required>

        <label for="password">Contraseña</label>    
        <input type="password" placeholder="Ingresar contraseña" name="contra" id="contra" required>

    <input type="submit" value="Ingresar">

        
        <a href="#">¿Olvidaste tu contraseña?</a><br>
    </form>
</div>

<!-- <script>
    console.log("Funciona xd")
    function iniciar_sesion(rs){
        var documento = document.getElementById('docu');
        var contraseñax = document.getElementById('contra');
        console.log(documento.value);
        console.log(contraseñax.value);

    var usuario = "1043663815"
    var contraseña = "daniel123"
        
        if(documento.value == usuario || contraseñax.value == contraseña){
            alert("SE LOGEA");
            
        }else{
            alert("USUARIO NO ES EL SUPERADMINISTRADOR")
        }
    }
    onsubmit="return iniciar_sesion()"
</script>  -->

</body>     