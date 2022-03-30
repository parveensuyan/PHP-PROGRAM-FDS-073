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
</head>
<body>
<table id="customers">

<?php if(!empty($array_result)) {?>
<tr>
 <th>Name</th>
 <th>Email</th>
 <th>Mobile</th>
 <th>Message</th>
 <th>Action</th>
</tr>

<?php 
// print_r(1234);

foreach($array_result as $value){?>
<tr>
 <td><?php echo $value['name'];?></td>
 <td><?php echo $value['email'];?></td>
 <td><?php echo $value['mobile'];?></td>
 <td><?php echo $value['message'];?></td>
 <td>
     <a href="edit.php/?id=<?php echo $value['id'];?>">Edit</a> | <a class="delete-anchor-nn"
   href="#">Delete</a></td>
</tr>
<?php } 
}
else{ ?>
    <p>NO RECORD FOUND</p>
<?php }?></table>
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
        echo "Error " . $conn->error;
        }
        $conn->close();
        return $array_result;
    }
    ?>
