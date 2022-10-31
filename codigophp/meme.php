<?php
require("conecta.php");
//url for meme creation
$url = 'https://api.imgflip.com/caption_image';

//The data you want to send via POST
$meme_id = $_POST["id"];
$boxes = $_POST["box_meme"];
$boxes_array = array();


for ($i = 1; $i <= $boxes; $i++) {
    array_push($boxes_array, array("text" => $_POST["text_meme$i"], "color" => $_POST["color$i"]));
}

$fields = array(
    "template_id" => $meme_id,
    "username" => "fjortegan",
    "password" => "pestillo",
    "boxes" => $boxes_array
);


//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);

//decode response
$data = json_decode($result, true);

//if success show image
if ($data["success"]) {
    $foto= date("dmyHis").".jpeg";

    echo "<img src='" . $data["data"]["url"] . "'>";
    $sql = "INSERT INTO created_memes (route, id_user) values (:route, :id_user)";

    $data = array("route" => "memes/$foto",
                   "id_user" => $_SESSION["id"]
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($data) != 1) {
        print("No se pudo guardar el meme :(");
        exit(0);
    }
    file_put_contents("memes/$foto", file_get_contents($data["data"]["url"]));
}
