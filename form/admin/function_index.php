<?php
    $username = $pwd = '';
    if(!empty($_POST)){
        if($_POST['username'] !='' ){
            $username = $_POST['username'];
        }
        if($_POST['pwd'] !='' ){
            $pwd = $_POST['pwd'];
        }
    }
    $error_log = array();
    $error_log = formValidation();
    //requirement was to the get the error message
    function formValidation(){
        $error_log['username'] = $error_log['pwd'] = '';

        if(isset($_POST) && !empty($_POST)  ){
            
            if(trim($_POST['username']) == ''){
            $error_log['username'] = 'Please enter your UserName';   
            //push the string value for the key name and the array name is error_log
            }
            else{
                $result =  FetchValue();
                if(!empty($result)){
                 $error_log['username'] = 'Username already exist!';
                }
            }
            if($_POST['pwd'] == ''){
            $error_log['pwd'] = 'Please enter your Password';
            }
        
            if($_POST['username']!='' && $_POST['pwd']!=''){
           if($error_log['username']==''){
            $status =  InsertValue();
            if($status == true){
             $error_log['sucess'] = '<p class="success">User created successfully</p>';
            
             }
           }
              
            }
           
    }
    return $error_log;
    }
    function FetchValue(){

        $array_result = array();
    
            include $_SERVER['DOCUMENT_ROOT']."/form/database.php";
            
            $return_value = false;
    
            $sql = "select * from user where username = '$_POST[username]'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $array_result = $result->fetch_all(MYSQLI_ASSOC);
            }
            else 
            {
            echo $conn->error;
            }
            $conn->close();
            return $array_result;
        }
    function InsertValue(){
    include $_SERVER['DOCUMENT_ROOT']."/form/database.php";
    $ciphering = "AES-128-CTR";
    // Use OpenSSl Encryption method
     $iv_length = openssl_cipher_iv_length($ciphering);
     $options = 0;

    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
    // Store the encryption key
    $encryption_key = "GeeksforGeeks";
    $encryption = openssl_encrypt($_POST['pwd'], $ciphering,
	$encryption_key, $options, $encryption_iv);
     if($conn ->connect_error){
                die("Failed! ". $conn->connect_error);
    }
    $sql = "insert into user (username,pwd) values('$_POST[username]', 
            '$encryption')";    
    $return_value = false;

    if($conn->query($sql)=== true){
        $return_value = true;
     }
    else{
    echo $conn->connect_error;
      }
 $conn->close();
 return $return_value;
}

    ?>