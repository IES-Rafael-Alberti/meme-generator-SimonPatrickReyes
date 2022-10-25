<?php
<<<<<<< HEAD

=======
if(isset($_POST['name'])) {
   require("conecta.php");

    // recupera los datos del formulario
    $name = $_POST["name"];
    $pwd = $_POST["pwd"];
   
    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "SELECT * FROM users WHERE name = :name AND pwd = :pwd";
    // asocia valores a esos nombres
    $datos = array("name" => $name,
                   "pwd" => $pwd
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    $stmt->execute($datos);
    if($stmt->rowCount() == 1) {
        session_start();
        $_SESSION["name"] = $name;
        session_write_close();
        header("Location: index.php");
        exit(0);
    }
    header("Location: login.php");
    exit(0);
}
>>>>>>> 701b0bcecbf291d11f8b5ac698bba3349044b601
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Document</title>
</head>
<body>
    
=======
    <title>Meme Generator - Login</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="name">User Name: </label>
    <input type="text" name="name" id="name">
    <label for="pwd">Password: </label>
    <input type="password" name="pwd" id="pwd">
    <input type="submit" value="Login">
</form>    
>>>>>>> 701b0bcecbf291d11f8b5ac698bba3349044b601
</body>
</html>