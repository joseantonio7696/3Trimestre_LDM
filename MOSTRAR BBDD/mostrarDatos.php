<html>

<head>
  <title>ALTA DE CLIENTES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
   <style>

  th{
    background-color: grey;
    border: solid black 2px;
    width: 6%;
  }
  
  td{
    background-color: cadetblue;
    border: solid black 2px;
    width: 6%;
  }
  .table{
  	width:100%;
    text-align: center;
    
  }
  
  </style>
</head>

<body>

<div class="w3-container w3-teal">
    <h1>LISTA CLIENTES</h1>
    </div>

<div class="w3-bar w3-border w3-black">
    <a href="https://www.joseantoniomarquez.me/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Home</a>
    <a href="https://www.joseantoniomarquez.me/MostrarDatos/mostrarDatos.php" class="w3-bar-item w3-button">Registro de Clientes</a>
    <a href="https://www.joseantoniomarquez.me/ConsultaClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Consulta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/RegistroClientes/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Alta Cliente</a>
    <a href="https://www.joseantoniomarquez.me/BorrarDatos/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Baja Cliente</a>
    <a href="https://www.joseantoniomarquez.me/UpdateCliente/" class="w3-bar-item w3-button w3-hover-none w3-text-grey w3-hover-text-white">Modificar Cliente</a>
</div>

<?php

function mostrardatos()
{
    $con = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes");
    //servername,username,password,bddname
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    $sql = "SELECT * FROM clientes";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table'>
        <tr>
        <th> ID </th>
        <th> NOMBRE </th>
        <th> APELLIDO_1 </th>
        <th> APELLIDO_2 </th>
        <th> SEXO </th>
        <th> DIRECCION </th>
        <th> CORREO </th>
        <th> TELEFONO </th>
        <th> FECHA_NACIMIENTO </th>
        <th> POBLACION </th>
        <th> PROVINCIA </th>
        <th> CONTRASENA </th>
        <th> DNI </th>
        <th> TWITTER </th>
        </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
        
        /*<td> <a href='https://www.joseantoniomarquez.me/BorrarDatos/borrarDatos.php?correo=$row[CORREO]'>" . $row["CORREO"] . " </a></td>*/

            echo "<tr>
           	<td> " . $row["ID_CLIENTES"] . " </td> 
            <td> " . $row["NOMBRE"] . "</td>
            <td> " . $row["APELLIDO_1"] . "</td>
            <td> " . $row["APELLIDO_2"] . "</td>
            <td> " . $row["SEXO"] . "</td>
            <td> " . $row["DIRECCION"] . "</td>
            <td> " . $row["CORREO"] . " </td>
            <td> " . $row["TELEFONO"] . "</td>
            <td> " . $row["FECHA_NACIMIENTO"] . "</td>
            <td> " . $row["POBLACION"] . "</td>   
            <td> " . $row["PROVINCIA"] . "</td>  
            <td> " . $row["CONTRASENA"] . "</td>  
            <td> " . $row["DNI"] . "</td>
            <td> " . $row["TWITTER"] . "</td>     
            </tr>";
        }
    } else {
        echo "0 results";
    }

    echo "</table>";
    mysqli_close($con);
}



  $conexion = mysqli_connect("localhost", "fuesdawy", "Nilocamilalinda7", "fuesdawy_Clientes") or
    die("Problemas con la conexión");

  mysqli_close($conexion);

  
  mostrardatos();


  ?>
</body>

</html>