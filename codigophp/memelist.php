<?php
 require("testlogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista memes</title>
</head>
<body>
    <?php
    print("<header>Usuario:".$_SESSION["name"]."</header>");
    ?>
<?php
//url for meme list
$url = 'https://api.imgflip.com/get_memes';

//open connection
$ch = curl_init();

//set the url
curl_setopt($ch, CURLOPT_URL, $url);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//receive url content 
$result = curl_exec($ch);

//decode content (assoc array)
$data = json_decode($result, true);

//if success shows images
if ($data["success"]) {
    //iterates over memes array

    foreach ($data["data"]["memes"] as $meme) {
        //show meme image
        echo "<a href='create_meme.php?id=$meme[id]&cajas=$meme[box_count]&url=$meme[url]'> <img width='50px' src='" . $meme["url"] . "'> </a>";
    }
}
?>
</body>
</html>



