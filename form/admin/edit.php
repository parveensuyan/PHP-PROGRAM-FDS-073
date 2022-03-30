<?php 
// print_r($_SERVER);exit;
$array_result = FetchRow();
$error_log =  CheckValidation(); //function call

if(empty($error_log)){
   unset($error_log);
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
    <link rel="stylesheet" href = "http://<?php echo $_SERVER['HTTP_HOST'];?>/form/index.css">
</head>
<body>
<div class="container">
    <div class="maindiv">
    <div class="col-6">
    <?php echo !empty($error_log) ? $error_log ['success'] : '';?>

    <form action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
    <label for="name">Name <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="name" name = "name"
                    value = "<?php  echo empty($name) ? $array_result['name']:$name ;?>">

    <p class="error-msg"><?php echo !empty($error_log) ? $error_log ['name'] : '';?></p>
    <label for="email">Email <span class = "error-msg" >*<span></label>
    <input type="email" class ="input-div-nn" id="email" name = "email"
                    value = "<?php  echo empty($email) ? $array_result['email']:$email ;?>">
    <p class="error-msg"><?php echo !empty($error_log) ? $error_log ['email'] : '';?></p>
    <label for="mobile">Mobile Number <span class = "error-msg" >*<span></label>
    <input type="text" class ="input-div-nn" id="mobile" name = "mobile"
                    value = "<?php  echo empty($mobile) ? $array_result['mobile']:$mobile ;?>">
   <p  class="error-msg"><?php echo !empty($error_log) ? $error_log ['mobile'] : '';?></p>
    <label for="message">Message <span class = "error-msg" >*<span></label>
    <textarea name="message" class ="input-div-nn"><?php  echo empty($message) ? $array_result['message']:$message ;?></textarea>
    <p  class="error-msg"><?php echo !empty($error_log) ? $error_log ['message'] : '';?></p>
    <input type = "submit" class="submit" value  = 'Submit'>
    </form>
  <a href="/form/admin/display.php" class="">Back</a>
</div>
</div>
</div>

</body>
</html>

<?php
function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }
  
  echo url();
    
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
                $statusCheck =  UpdateRecord($_GET['id']);

                // $statusCheck = InsertValue(); //data inserted 
                if($statusCheck == true){
                    $error_log['success'] = "<p class = 'success'>Data Updated!</p>";
                    unset($_POST); //unset the value for the array post
                }
              
            }
      }
      return $error_log;
    }

    function FetchRow(){
        include "database.php";
        $id = $_GET['id'];
        
        $sql = "select * from contact_form where id = $id";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $array_result = $result->fetch_assoc(); 
        }
        else 
        {
        echo "Error " . $conn->error;
        }
        $conn->close();
        return $array_result;
    }
    function UpdateRecord($id)
    {
        $return_value = false;
        include "database.php";   
        $sql = "update contact_form set name = '$_POST[name]',email = '$_POST[email]',
        mobile = '$_POST[mobile]',message = '$_POST[message]' where id = $id";
        // echo $sql;
        // exit;
        if($conn->query($sql)=== true){
            $return_value = true;
        }
        else{
        echo "error".$conn->connect_error;    
        }
        $conn->close();
        return $return_value;
    }
?>

