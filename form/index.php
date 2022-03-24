<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
            <div class="maindiv">
    <div class="col-6">
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post
    ">
    <label for="name">Name <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="name" name = "name"
                    value = "">
    <label for="email">Email <span class = "error-msg" >*<span></label>
    <input type="email" class ="input-div-nn" id="email" name = "email"
                    value = "">
    <label for="mobile">Mobile Number <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="mobile" name = "mobile"
                    value = "">
    <label for="message">Message <span class = "error-msg" >*<span></label>
    <textarea name="message" class ="input-div-nn"></textarea>
    <input type = "submit" class="submit" value  = 'Submit'>
    </form>
</div>
</div>
</div>

</body>
</html>
<?php print_r($_POST);?>
