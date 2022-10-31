<?php
echo "<img width=50 src='$_GET[url]'><br>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meme Generator</title>
</head>

<body>
    <?php $text_boxes = $_GET['cajas']; ?>
    <form action="meme.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="box_meme" value=<?php echo "$text_boxes"; ?>>
        <?php
        for ($i = 1; $i <= $text_boxes; $i++) {
            print("<input type='text' name='text_meme$i'>");
            print("<input type='color' name='color$i'>");
        }
        ?>
        <input type="submit" value="Crear Meme">
    </form>

</body>

</html>
