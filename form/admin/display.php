<?php
session_start();
$array_result = array();
if(array_key_exists('user_id',$_SESSION)){
if($_SESSION['user_id'] !='') {

$array_result = FetchValue();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Record</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
</head>
<body>
<?php if(!empty($array_result)){ ?>
<table id="customers">
<?php include "index_table.php"; ?>
</table>
    <a href="form/admin/logout.php" class="href">Logout</a>
<?php }
else{
    ?>
    <p>Please <a href="/form/admin/login.php">login</a></p>

<?php
}

?>

</body>
</html>
<?php

function FetchValue(){

    $array_result = array();

        include $_SERVER['DOCUMENT_ROOT']."/form/database.php";
        
        $return_value = false;

        $sql = "select * from contact_form";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $array_result = $result->fetch_all(MYSQLI_ASSOC);
        }
        else 
        {
        echo  $conn->error;
        }
        $conn->close();
        return $array_result;
    }



    ?>