<?php 
if(!empty($_FILES)){
    $target_dir = "upload/"; //folder name
    $target_file = $target_dir.$_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // echo $target_file;
    //$size = getimagesize($_FILES['image']['tmp_name']);
    $upload_error_log = false;
    if(file_exists($target_file) ){
 // file already exists in the upload folder
      echo " file already exists";
      $upload_error_log = true;
    }
   
    // if($_FILES['image']['size'] > 7000){
    //     echo " file is too large";
    //   $upload_error_log = true;
    // }
    // if($imageFileType !='jpg' && $imageFileType !='png'){
    //         echo " allowed format  jpg and png";
    //         $upload_error_log = true;
    // }
    if($upload_error_log == false)
    {
       if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) 
       {
        echo "File upload successfully";
       }
       else{
           echo "Sorry thee was an error uploading your file";
       }
    }
}
// else{
//     echo "Please upload the file";
// }



?>