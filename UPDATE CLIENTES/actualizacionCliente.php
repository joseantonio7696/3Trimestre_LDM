<html>

<head>
    <title>Actualizacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
$detectarError==0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nombreviejo"])) {
    $nombreErr = "Nombre es requerido";
    $detectarError==1;
  } else {
    $nombre = test_input($_POST["nombrenuevo"]);
  }

  if (empty($_POST["apellido1viejo"])) {
    $apellido1Err = "Apellido 1 es requerido";
    $detectarError==1;
  } else {
    $apellido1 = test_input($_POST["apellido1nuevo"]);
  }

  if (empty($_POST["apellido2viejo"])) {
    $apellido2Err = "Apellido 2 es requerido";
    $detectarError==1;
  } else {
    $apellido2 = test_input($_POST["apellido2nuevo"]);
  }

  if (empty($_POST["direccionviejo"])) {
    $direccionErr = "Direccion es requerida";
    $detectarError==1;
  } else {
    $direccion = test_input($_POST["direccionnuevo"]);
  }

  if (empty($_POST["correoviejo"])) {
    $correoErr = "Correo es requerido";
    $detectarError==1;
  } else {
    $correo = test_input($_POST["correonuevo"]);
  }

  if (empty($_POST["telefonoviejo"])) {
    $telefonoErr = "Telefono es requerido";
    $detectarError==1;
  } else {
    $telefono = test_input($_POST["telefononuevo"]);
  }


  if (empty($_POST["poblacionviejo"])) {
    $poblacionErr = "Poblacion es requerida";
    $detectarError==1;
  } else {
    $poblacion = test_input($_POST["poblacionnuevo"]);
  }

  if (empty($_POST["provinciaviejo"])) {
    $provinciaErr = "Provincia es requerida";
    $detectarError==1;
  } else {
    $provincia = test_input($_POST["provincianuevo"]);
  }

  if (empty($_POST["contrasenaviejo"])) {
    $contrasenaErr = "Contraseña es requerida";
    $detectarError==1;
  } else {
    $contrasena = test_input($_POST["contrasenanuevo"]);
  }

  if (empty($_POST["dniviejo"])) {
    $dniErr = "DNI es requerido";
    $detectarError==1;
  } else {
    $dni = test_input($_POST["dninuevo"]);
  }
  
  if (empty($_POST["twitterviejo"])) {
    $twitterErr = "Twitter es requerido";
    $detectarError==1;
  } else {
    $twitter = test_input($_POST["twitternuevo"]);
  }
 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    if ($detectarError==1) {
      echo $nombreErr;
      echo $apellido1Err;
      echo $apellido2Err;
      echo $sexoErr;
      echo $direccionErr;
      echo $correoErr;
      echo $telefonoErr;
      echo $fecha_nacimientoErr;
      echo $poblacionErr;
      echo $provinciaErr;
      echo $contrasenaErr;
      echo $dniErr;
      echo $twitterErr;

    }else {

/*$nombre = $apellido1 = $apellido2 = $direccion = $correo = $telefono  = $poblacion = $provincia = $contrasena = $dni = $twitter*/

    $conexion = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes") or
        die("Problemas con la conexión");

    mysqli_query($conexion, "update clientes
                          set NOMBRE='$nombre',APELLIDO_1='$apellido1',APELLIDO_2='$apellido2',DIRECCION='$direccion',CORREO='$correo',TELEFONO='$telefono',POBLACION='$poblacion',PROVINCIA='$provincia',CONTRASENA='$contrasena',TWITTER='$twitter' 
                        where CORREO='$_REQUEST[mailviejo]'") or
        die("Problemas en el select:" . mysqli_error($conexion));
    echo "El cliente fue modificado con exito";
    
    }
    ?>
</body>

</html>