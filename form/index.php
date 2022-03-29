<?php 
$error_log =  CheckValidation(); //function call
if(empty($error_log)){
    $error_log ['name'] =  $error_log ['email'] =  '';
}
$name = $email = $mobile = $message = '';
if(!empty($_POST)){
    if($_POST['name'] !='' ){
        $name = $_POST['name'];
    }
    if($_POST['email'] !='' ){
        $email = $_POST['email'];
    }
    if($_POST['mobile'] !='' ){
        $mobile = $_POST['mobile'];
    }
    if($_POST['message'] !='' ){
        $message = $_POST['message'];
    }
}
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
    <?php echo !empty($error_log) ? $error_log ['success'] : '';?>

    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <label for="name">Name <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="name" name = "name"
                    value = "<?php echo $name ;?>">
    <p class="error-msg"><?php echo !empty($error_log) ? $error_log ['name'] : '';?></p>
    <label for="email">Email <span class = "error-msg" >*<span></label>
    <input type="email" class ="input-div-nn" id="email" name = "email"
                    value = "<?php echo $email ;?>">
    <p class="error-msg"><?php echo $error_log ['email'];?></p>
    <label for="mobile">Mobile Number <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="mobile" name = "mobile"
                    value = "<?php echo $mobile ;?>">
   <p  class="error-msg"><?php echo !empty($error_log) ? $error_log ['mobile'] : '';?></p>
    <label for="message">Message <span class = "error-msg" >*<span></label>
    <textarea name="message" class ="input-div-nn"><?php echo $message ;?></textarea>
    <p  class="error-msg"><?php echo !empty($error_log) ? $error_log ['message'] : '';?></p>
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
      $error_log ['success'] =  $error_log ['name'] =  $error_log ['email'] = $error_log ['mobile']  =  $error_log ['message']  =  '';
        if(isset($_POST) && !empty($_POST)){

           if(trim($_POST['name']) == ''){ //trim all the whitespaces
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
            if($_POST['name']!='' && $_POST['email']!='' && $_POST['mobile'] != '' && $_POST['message'] !=''){  
                
                $statusCheck = InsertValue(); //data inserted 

                if($statusCheck == true){
                    $error_log['success'] = "<p class = 'success'>Thank you we will reach out to you shortly!</p>";
                    unset($_POST); //unset the value for the array post
                }
              
            }
      }
      return $error_log;
    }
    function InsertValue(){
        include "database.php";

        $sql = "insert into contact_form (name,email,mobile,message) values
        ('$_POST[name]','$_POST[email]',$_POST[mobile],'$_POST[message]')";

        if ($conn->query($sql) === TRUE) {
            return true;
        }
        else 
        {
        echo "Error creating table: " . $conn->error;
        }
        $conn->close();
        return false;
    }
?>
