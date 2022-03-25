<?php
include "database.php";

$sql = "CREATE TABLE `form`.`contact_form` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(233) NOT NULL , 
    `email` VARCHAR(233) NOT NULL , 
    `mobile` INT(30) NOT NULL ,
     `message` VARCHAR(60) NOT NULL ,
      PRIMARY KEY (`id`)) ENGINE = InnoDB";
   if ($conn->query($sql) === TRUE) {
    echo "Table Contact Form created successfully";
    } else {
    echo "Error creating table: " . $conn->error;
    }
    $conn->close();
    
?>