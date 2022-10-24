<?php
if (isset($_POST['name'])) {
    //print_r($_FILES);
    // Recorrer subida de archivos múltiple
    // $fotos = $_FILES['fotos'];
    // for($i=0; $i < sizeof($fotos["name"]); $i++) {
    //     print_r($fotos["name"][$i] . " -> " . $fotos["tmp_name"][$i]);
    //     print_r("<br>");
    // }
    // exit(0);

    require("conecta.php");

    // recupera los datos del formulario
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];

    // copia el archivo temporal en fotos con su nombre original

    // inyectable
    //$sql = "INSERT INTO usuario (nombre, edad, foto) values ('$nombre', $edad, '$foto')";

    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "INSERT INTO users (name,pwd) values (:name,:pwd)";

    // asocia valores a esos nombres
    $data = array(
        "name" => $name, "pwd" => $pwd
    );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if ($stmt->execute($data) != 1) {
        print("Couldn't register");
        exit(0);
    }
    header("Location: index.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <label for="pwd">Password: </label>
        <input type="password" name="pwd" id="pwd">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>