<html>

<head>
  <title>ALTA DE CLIENTES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<div class="w3-container w3-teal">
    <h1>ALTA DE CLIENTES</h1>
    </div>

<div class="w3-bar w3-border w3-black">
    <a href="https://www.joseantoniomarquez.me/MenuPrincipal/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Home</a>
    <a href="https://www.joseantoniomarquez.me/MostrarDatos/mostrarDatos.php" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Registro de Clientes</a>
    <a href="https://www.joseantoniomarquez.me/ConsultaClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Consulta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/RegistroClientes/" class="w3-bar-item w3-button">Alta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/BorrarDatos/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Baja Cliente</a>
    <a href="https://www.joseantoniomarquez.me/UpdateCliente/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Modificar Cliente</a>
</div>
  <?php

$nombre = $apellido1 = $apellido2 = $sexo = $direccion = $correo = $telefono = $fecha_nacimiento = $poblacion = $provincia = $contrasena = $dni = $twitter ="";
$nombreErr = $apellido1Err = $apellido2Err = $sexoErr = $direccionErr = $correoErr = $telefonoErr = $fecha_nacimientoErr = $poblacionErr = $provinciaErr = $contrasenaErr = $dniErr = $twitterErr ="";

$detectarError=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nombre"])) {
    $nombreErr = "Nombre es requerido";
    $detectarError=1;
  } else {
    $nombre = test_input($_POST["nombre"]);
  }

  if (empty($_POST["apellido1"])) {
    $apellido1Err = "Apellido 1 es requerido";
    $detectarError=1;
  } else {
    $apellido1 = test_input($_POST["apellido1"]);
  }

  if (empty($_POST["apellido2"])) {
    $apellido2Err = "Apellido 2 es requerido";
    $detectarError=1;
  } else {
    $apellido2 = test_input($_POST["apellido2"]);
  }

  if (empty($_POST["sexo"])) {
    $sexoErr = "Sexo es requerido";
    $detectarError=1;
  } else {
    $sexo = test_input($_POST["sexo"]);
  }

  if (empty($_POST["direccion"])) {
    $direccionErr = "Direccion es requerida";
    $detectarError=1;
  } else {
    $direccion = test_input($_POST["direccion"]);
  }

  if (empty($_POST["correo"])) {
    $correoErr = "Correo es requerido";
    $detectarError=1;
  } else {
    $correo = test_input($_POST["correo"]);
  }

  if (empty($_POST["telefono"])) {
    $telefonoErr = "Telefono es requerido";
    $detectarError=1;
  } else {
    $telefono = test_input($_POST["telefono"]);
  }

  if (empty($_POST["fecha"])) {
    $fecha_nacimientoErr = "Fecha de Nacimiento es requerida";
    $detectarError=1;
  } else {
    $fecha_nacimiento = test_input($_POST["fecha"]);
  }

  if (empty($_POST["poblacion"])) {
    $poblacionErr = "Poblacion es requerida";
    $detectarError=1;
  } else {
    $poblacion = test_input($_POST["poblacion"]);
  }

  if (empty($_POST["provincia"])) {
    $provinciaErr = "Provincia es requerida";
    $detectarError=1;
  } else {
    $provincia = test_input($_POST["provincia"]);
  }

  if (empty($_POST["contrasena"])) {
    $contrasenaErr = "Contraseña es requerida";
    $detectarError=1;
  } else {
    $contrasena = test_input($_POST["contrasena"]);
  }

  if (empty($_POST["dni"])) {
    $dniErr = "DNI es requerido";
    $detectarError=1;
  } else {
    $dni = test_input($_POST["dni"]);
  }
  
  if (empty($_POST["twitter"])) {
    $twitterErr = "Twitter es requerido";
    $detectarError=1;
  } else {
    $twitter = test_input($_POST["twitter"]);
  }
 
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


/*$nombre = $apellido1 = $apellido2 = $sexo = $direccion = $correo = $telefono = $fecha_nacimiento = $poblacion = $provincia = $contrasena = $dni = $twitter*/

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
  
  $conexion = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes") or
    die("Problemas con la conexión");

  mysqli_query($conexion, "insert into clientes(nombre,apellido_1,apellido_2,sexo,direccion,correo,telefono,fecha_nacimiento,poblacion,provincia,contrasena,dni,twitter) values 
                       ('$nombre','$apellido1','$apellido2','$sexo','$direccion','$correo','$telefono','$fecha_nacimiento','$poblacion','$provincia','$contrasena','$dni','$twitter')")
    or die("Problemas en el select " . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "El cliente fue dado de alta.";
}
  ?>

</body>

</html>