<?php
echo "<img width=50 src='$_GET[url]'><br>";
?>
<form action="meme.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    
    <input type="submit" value="Generar">
</form>