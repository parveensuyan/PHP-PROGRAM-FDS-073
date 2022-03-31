<?php
$array_result = FetchValue();
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
<table id="customers">
<?php include "index_table.php"; ?>
</table>
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
