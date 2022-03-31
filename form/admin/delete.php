<?php 
$contact_id = $_POST['contact_id'];
DeleteValue($contact_id);
function DeleteValue($contact_id){

    include $_SERVER['DOCUMENT_ROOT']."/form/database.php";

    $sql = "delete from contact_form where id = $contact_id";

        if ($conn->query($sql)) {
           $array_result =  FetchValue();
           $html = include "index_table.php";
           return $html;
        }
        else 
        {
        echo "Error " . $conn->error;
        }
        $conn->close();
        return;

}
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
