<?php
session_start();
    $username = $pwd  = '';

    if(!empty($_POST)){
        if($_POST['username'] !='' ){
            $username = $_POST['username'];
        }
        if($_POST['pwd'] !='' ){
            $pwd = $_POST['pwd'];
        }
    } 
    $_SESSION['user_id'] = ''; 
    $error_log = array();
    $error_log = formValidation();
    //requirement was to the get the error message
    function formValidation(){
        $error_log['username'] = $error_log['pwd'] = '';

        if(isset($_POST) && !empty($_POST)  ){
            
            if(trim($_POST['username']) == ''){

            $error_log['username'] = 'Please enter your Name';   
            //push the string value for the key name and the array name is error_log
            }
            if($_POST['pwd'] == ''){
            $error_log['pwd'] = 'Please enter your Password';
            }
            if($_POST['username']!='' && $_POST['pwd']!=''){
            $error_log['sucess'] = '<p class="success">Thank you we will contact you soon</p>';
            $name = '';
            }
    }

    return $error_log;

    }
    if(isset($error_log['sucess']) && !empty($error_log['sucess'])){
       $error_log =  CheckValue();
        $name = $email = $mobile = $message = '';
    }

    function CheckValue(){
            $error_log = array();
            $error_log['username'] = $error_log['pwd']   = '';
            include $_SERVER['DOCUMENT_ROOT']."/form/database.php";
            $ciphering = "AES-128-CTR";
            
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
      // Non-NULL Initialization Vector for encryption
        // Store the encryption key
        $decryption_iv = '1234567891011121';
        // Store the decryption key
        $decryption_key = "GeeksforGeeks";

            if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
            }
            $sql = "select * from user where username = '$_POST[username]'";    
           
            $result = $conn->query($sql);
            if($result->num_rows >0){
                // $_POST['username'] = 
                $row = $result->fetch_assoc();
                
                $decryption=openssl_decrypt ($row['pwd'], $ciphering,
                $decryption_key, $options, $decryption_iv);
                //decrypt the saved in the db
                // user enterted  = decrypt
                if($_POST['pwd'] == $decryption){
                    $_SESSION['user_id'] = $row['user_id'];
                   
                    header("Location: display.php"); //redirect
                    die();
                 }
                 else{
                    $error_log['pwd'] = 'Incorrect password try again!';
                 }
             }
            else{
                echo "error".$conn->connect_error;
                $error_log['username'] = 'Please try again!';
                }
                $conn->close();
                return $error_log;
    }
    ?>