<?php
require("conecta.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar meme</title>
</head>
<body>
    <?php
    $route = $_GET["route"];
    if (unlink($route)) {
    print("Meme borrado");
    $sql = "DELETE FROM created_memes WHERE route = :route";
    // asocia valores a esos nombres
    $datos = array("route" => $route
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    $stmt->execute($datos);
    } else {
        print("No se ha podido eliminar");
    }
    print("<a href='index.php'>Volver a inicio</a>")
    ?>
</body>