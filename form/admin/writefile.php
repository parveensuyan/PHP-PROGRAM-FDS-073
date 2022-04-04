<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read File</title>
</head>
<body>
   <?php 
   $filename = "newfile.txt";
   $file = fopen($filename ,'w');
   if($file == false){
       echo "erro in opening the file";exit;
   }
   $status = fwrite($file,'This is the text file, have a great day!');
//    if(){
//        echo "file upload successfully"
//    }
   fclose($file);

   ?>
</body>
</html>