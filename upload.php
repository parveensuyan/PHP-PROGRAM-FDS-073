<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="index.css">
<body>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
    <label for="image">Upload Image<span class = "error-msg" >*<span></label>
    <input type="file" class ="input-div-nn" name = "image">
    <!-- <p>allowed format (png,jpg)</p> -->
    <input type="hidden" class ="input-div-nn" name = "hidden" value="1">
     <input type="submit" class="submit" value="Upload the file">
    </form>
</body>
</html>
<?php include "upload_function.php"; ?>