<?php
$comic_id = rand(1, 1000);
$api_url = "https://xkcd.com/{$comic_id}/info.0.json";


$response = file_get_contents($api_url);
$response = json_decode($response, TRUE);
$img_url = $response['img'];
echo $response['img'];
?>

<html>

<body>
   <img src="<?php echo $img_url; ?>" alt="" width="1000px" height="1000px">
</body>

</html>