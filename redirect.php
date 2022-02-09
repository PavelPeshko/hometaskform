<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<p>How to view this image</p>
<?php
$directory = "./download";
$allowed_types = ["jpg", "png", "gif", "jpeg"];
$file_parts = [];
$ext = "";
$title = "";
$i = 0;

$dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");
while ($file = readdir($dir_handle)) {
    if ($file == "." || $file == "..") continue;
    $file_parts = explode(".", $file);
    $ext = strtolower(array_pop($file_parts));


    if (in_array($ext, $allowed_types)) {
        echo '<div class = "blok_img" >
                <img src="' . $directory . '/' . $file . '" class="pimg" title="' . $file . '" />
            </div>';
        $i++;
    }

}
closedir($dir_handle);  //закрыть папку


echo '<br><input type="button" onclick="history.back();" value="Back"/>';
?>
</body>
</html>