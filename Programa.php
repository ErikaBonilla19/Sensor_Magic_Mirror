<?php

$conectar = mysqli_connect("localhost", "root", "", "prueba");

if (isset($_POST["option"])) {
    
    $Cedula = $_POST["Cedula"];
    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $option = $_POST["option"];

    switch ($option) {
        case 1: // operación de inserción
            $insertar = "INSERT INTO datos (Cedula, Nombre, Apellido) VALUES ('$Cedula', '$Nombre', '$Apellido')";
            mysqli_query($conectar, $insertar);
            break;

        case 2: // Consulta
            $consultar = "SELECT * FROM datos";
            $resultado = mysqli_query($conectar, $consultar);
            break;

        case 3: //Eliminar
            $str = "DELETE FROM datos where Cedula = '$Cedula'";
            mysqli_query($conectar, $str);
            break;

        case 4: // Actualizar
            $actualizar = "UPDATE datos SET Nombre='$Nombre', Apellido='$Apellido' WHERE Cedula='$Cedula'";
            mysqli_query($conectar, $actualizar);
            break;
    }
}

$consultar = "SELECT * FROM datos";
$resultado = mysqli_query($conectar, $consultar);
$datos = array(); 

while ($resul = mysqli_fetch_assoc($resultado)) {
    $datos[] = $resul; 
}

                echo "<table border='1'>";
                echo "<tr>";
                echo "<th> Cedula </th>";
                echo "<th> Nombre </th>";
                echo "<th> Apellido </th>";
                echo "</tr>";

foreach ($datos as $fila) {
                echo "<tr>";
                echo "<td>" . $fila["Cedula"] . "</td>";
                echo "<td>" . $fila["Nombre"] . "</td>";
                echo "<td>" . $fila["Apellido"] . "</td>";
                echo "</tr>";
}

echo "</table>";

mysqli_close($conectar);
?>


