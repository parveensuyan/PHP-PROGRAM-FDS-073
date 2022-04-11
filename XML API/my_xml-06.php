<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XML JavaScript</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>
<body>

<h2>XML with PHP</h2>



<?php
$xml=simplexml_load_file("my_xml-02.xml") or die("Error: Cannot create object");

foreach($xml->children() as $books) {
        echo "<b>" . $books->title . "</b>, ";
        echo $books->author . ", ";
        echo $books->year . ", ";
        echo $books->price . "<br>";
}
?>



</body>
</html>