<html>

<head>
  <title>MODIFICAR EMAIL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>

    

    section{
      margin-top: 5%;
      margin-left: 40%;
      margin-right: 40%;
      border: solid black 2px;
      border-radius: 10px;
      padding: 2%;
      text-align: center; 
    }
    
    section form input{
    width: 80%;
    }
    
    section form select{
    width: 80%;
    }

  </style>
</head>

<body class="w3-teal">

<div class="w3-bar w3-border w3-black">
    <a href="https://www.joseantoniomarquez.me/MenuPrincipal/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Home</a>
    <a href="https://www.joseantoniomarquez.me/MostrarDatos/mostrarDatos.php" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Registro de Clientes</a>
    <a href="https://www.joseantoniomarquez.me/ConsultaClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Consulta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/RegistroClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Alta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/BorrarDatos/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Baja Cliente</a>
    <a href="https://www.joseantoniomarquez.me/UpdateCliente/" class="w3-bar-item w3-button">Modificar Cliente</a>
</div>

  <?php

$nombre = $apellido1 = $apellido2 = $sexo = $direccion = $correo = $telefono = $fecha_nacimiento = $poblacion = $provincia = $contrasena = $dni = $twitter ="";
$nombreErr = $apellido1Err = $apellido2Err = $sexoErr = $direccionErr = $correoErr = $telefonoErr = $fecha_nacimientoErr = $poblacionErr = $provinciaErr = $contrasenaErr = $dniErr = $twitterErr ="";

$detectarError=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["correo"])) {
    $correoErr = "Correo es requerido";
    $detectarError==1;
  } else {
    $correo = test_input($_POST["correo"]);
  }

 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($detectarError==1) {
  
  echo $correoErr;
 

}else {

/*$nombre = $apellido1 = $apellido2 = $sexo = $direccion = $correo = $telefono = $fecha_nacimiento = $poblacion = $provincia = $contrasena = $dni = $twitter*/

  $conexion = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes") or
    die("Problemas con la conexión");
	
    
  $registros = mysqli_query($conexion, "SELECT * FROM `clientes` WHERE CORREO='$correo'") or
    die("Problemas en el select:" . mysqli_error($conexion));
    
 
  if ($reg = mysqli_fetch_array($registros)) {
      ?>
      <section>
      <form action="actualizacionCliente.php" method="POST">
      Ingrese nuevo nombre:<br>
      <input type="text" name="nombrenuevo"  required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['NOMBRE'] ?>"><br>
      <input type="hidden" name="nombreviejo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['NOMBRE'] ?>"><br>
      Ingrese nuevo apellido 1:<br>
      <input type="text" name="apellido1nuevo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['APELLIDO_1'] ?>"><br>
      <input type="hidden" name="apellido2viejo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['APELLIDO_1'] ?>"><br>
      Ingrese nuevo apellido 2:<br>
      <input type="text" name="apellido2nuevo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['APELLIDO_2'] ?>"><br>
      <input type="hidden" name="apellido2viejo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['APELLIDO_2'] ?>"><br>
      Ingrese nuevo sexo:<br>
      <select name="sexo" required disabled>
        <option value="MASC">MASCULINO</option>
        <option value="FEM">FEMENINO</option>
        <option value="OTRO">OTRO</option>
      </select>
      <br>
      Ingrese nueva Direccion:<br>
      <input type="text" name="direccionnuevo"  value="<?php echo $reg['DIRECCION'] ?>"><br>
      <input type="hidden" name="direccionviejo"  value="<?php echo $reg['DIRECCION'] ?>"><br>
      Ingrese nuevo mail:
      <input type="email" name="mailnuevo" required  value="<?php echo $reg['CORREO'] ?>">
        <br><br>
      <input type="hidden" name="mailviejo" value="<?php echo $reg['CORREO'] ?>">
      Ingrese nuevo Telefono:<br>
      <input type="number" name="telefononuevo" required minlength="1" maxlength="9" pattern="^-?[0-9]+$" value="<?php echo $reg['TELEFONO'] ?>"><br>
      <input type="hidden" name="telefonoviejo" required pattern="^([A-Z]{1}[a-z]+[ ]?){1,2}$" value="<?php echo $reg['TELEFONO'] ?>"><br>
      Ingrese nuevo Fecha Nacimiento:<br>
      <input type="date" name="fecha" required disabled ><br>
      Ingrese nueva Poblacion:<br>
      <input type="text" name="poblacionnuevo"  value="<?php echo $reg['POBLACION'] ?>"><br>
      <input type="hidden" name="poblacionviejo"  value="<?php echo $reg['POBLACION'] ?>"><br>
      Ingrese nueva Provincia:<br>
      <input type="text" name="provincianuevo"  value="<?php echo $reg['PROVINCIA'] ?>"><br>
      <input type="hidden" name="provinciaviejo"  value="<?php echo $reg['PROVINCIA'] ?>"><br>
      Ingrese nueva Contraseña:<br>
      <input type="password" name="contrasenanuevo"  value="<?php echo $reg['CONTRASENA'] ?>"><br>
      <input type="hidden" name="contrasenaviejo"  value="<?php echo $reg['CONTRASENA'] ?>"><br>
      Ingrese nueva DNI:<br>
      <input type="text" name="dni" required maxlength="9" pattern="^[0-9]{8}[T|R|W|A|G|M|Y|F|P|D|X|B|N|J|Z|S|Q|V|H|L|C|K|E]$" placeholder="45125489S" disabled><br>
      <br>
      Ingrese Cuenta Twitter:<br>
      <input type="text" name="twitternuevo" required  pattern="^@([A-Za-z0-9]{1,15}$)" value="<?php echo $reg['TWITTER'] ?>"><br>
      <input type="hidden" name="twitterviejo" required  pattern="^@([A-Za-z0-9]{1,15}$)" value="<?php echo $reg['TWITTER'] ?>">
      <br>
      <input type="submit" value="Modificar">
      </form>

    </section>
  <?php
  } else
    echo "No existe cliente con dicho mail";
    }
  ?>
</body>

</html>