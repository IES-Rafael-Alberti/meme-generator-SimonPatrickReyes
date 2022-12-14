<?php
/*CONECTA CON LA BDD*/
require("conecta.php");
require("testlogin.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    $memes = $conn->query("Select * from created_memes");
    if ($memes->rowCount() == 0) {
        print("<p>'NO MEMES'</p>");
    }

    print("<table class='memes'>");
    while ($meme = $memes->fetchObject()) {
        print("<tr>");
        print("<td>");
        print("<a href='delete_meme.php?route=".$meme->route."'><i class='fa-solid fa-trash-can'></i></a>");
        print("</td>");
        print("<td>");
        print("<img src='".$meme->route."'>");
        print("</td>");
        print("</tr>");
    }

    ?>
    <a href="memelist.php">List of memes</a>
    <a href="logout.php">Close session</a>
</body>

</html>