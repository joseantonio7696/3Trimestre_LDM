<html>

<head>
  <title>DELETE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-teal">

<div class="w3-container w3-teal">
    <h1>BORRAR CLIENTE</h1>
    </div>
<div class="w3-bar w3-border w3-black">
    <a href="https://www.joseantoniomarquez.me/MenuPrincipal/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Home</a>
    <a href="https://www.joseantoniomarquez.me/MostrarDatos/mostrarDatos.php" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Mostrar Registro Clientes</a>
    <a href="https://www.joseantoniomarquez.me/ConsultaClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Consulta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/RegistroClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Alta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/BorrarDatos/" class="w3-bar-item w3-button">Baja Cliente</a>
    <a href="https://www.joseantoniomarquez.me/UpdateCliente/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Modificar Cliente</a>
</div>
  <?php

$nombre = $apellido1 = $apellido2 = $sexo = $direccion = $correo = $telefono = $fecha_nacimiento = $poblacion = $provincia = $contrasena = $dni = $twitter ="";
$nombreErr = $apellido1Err = $apellido2Err = $sexoErr = $direccionErr = $correoErr = $telefonoErr = $fecha_nacimientoErr = $poblacionErr = $provinciaErr = $contrasenaErr = $dniErr = $twitterErr ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["correo"])) {
    $correoErr = "Correo es requerido";
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
	/*
	$correo = ($_GET["correo"]);
	echo "correo = " . $_GET['correo'];*/

  $conexion = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes") or
    die("Problemas con la conexión");

  $registros = mysqli_query($conexion, "select correo from clientes
                        where correo='$correo'") or
    die("Problemas en el select:" . mysqli_error($conexion));
  if ($reg = mysqli_fetch_array($registros)) {
    mysqli_query($conexion, "delete from clientes where correo='$correo'") or
      die("Problemas en el select:" . mysqli_error($conexion));
    echo "Se efectuó el borrado del cliente con dicho mail.";
  } else {
    echo "No existe un cliente con ese mail.";
  }
  mysqli_close($conexion);
  ?>
</body>

</html>