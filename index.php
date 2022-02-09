<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>File Upload</title>
</head>
<body>

<form method="post" action="index.php" enctype="multipart/form-data">
    <label for="inputfile">Upload File</label>
    <input type="file" id="inputfile" name="image" multiple accept="image/gif, image/jpeg, image/jpg, image/png">

    <input type="submit" value="Click To Upload">
</form>

</body>
</html>

<?php
//ini_set('upload_max_filesize','1M');
$downloadDir = './download/';
$newUrl = 'http://hometaskform.loc/redirect.php';
if (isset($_FILES) && isset($_FILES['image'])) {
    $fileData = $_FILES['image'];

    $fileSize = $fileData['size'];
    if ($fileSize > 4 * 1024 * 1024) {
        exit("File is too big");
    }

    if ($fileData['error'] === UPLOAD_ERR_OK) {
        $fileName = $fileData['name'];
        $tmpName = $fileData['tmp_name'];
        $destinationDir = $downloadDir . $fileName;
        if (move_uploaded_file($tmpName, $destinationDir)) {
            echo 'File Uploaded';
            header('Location:' . $newUrl, true, 307);
        } else {
            echo 'No File Uploaded';
        }
    }
}
//print_r($_FILES);

?>



