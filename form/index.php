<?php 

$error_log =  CheckValidation(); //function call
if(empty($error_log)){
    $error_log ['name'] =  $error_log ['email'] =  '';
}
print_r($error_log);
 ?>
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
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <label for="name">Name <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="name" name = "name"
                    value = "">
    <p class="error-msg"><?php echo $error_log ['name'];?></p>
    <label for="email">Email <span class = "error-msg" >*<span></label>
    <input type="email" class ="input-div-nn" id="email" name = "email"
                    value = "">
    <p class="error-msg"><?php echo $error_log ['email'];?></p>
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
<?php
    
    function CheckValidation(){// function define/header
        $error_log = array();
       
      if(isset($_POST) && !empty($_POST)){

            if($_POST['name'] == ''){
                $error_log ['name'] = 'The name is required';
            }
            if($_POST['email'] == ''){
                $error_log ['email'] = 'The email is required';
            }
            if($_POST['mobile'] == ''){
                $error_log ['mobile'] = 'The mobile is required';
            }
            if($_POST['message'] == ''){
               $error_log ['message'] = 'The message is required';
            }
      }
      return $error_log;
    }
 
?>
