<html>
<head>
<title>Writing a file using PHP</title>
</head>
<body>
<?php
$filename = "newfile.txt";
$file = fopen( $filename, "r" );
if( $file == false ) {
echo ( "Error in opening file" );
exit();
}
$filesize = filesize( $filename );
$filetext = fread( $file, $filesize );
fclose( $file );
echo ( "File size : $filesize bytes" );
echo ( "$filetext" );
echo("file name: $filename");
// $status =  str_contains($filetext,'php');
// $statusCheck = $status == true ? "yes":"no";
// echo $statusCheck;
?>
</body>
</html>