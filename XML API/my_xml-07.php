<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>XML JavaScript</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>XML with PHP</h2>

<section>

<?php
$xml=simplexml_load_file("my_xml-02.xml") or die("Error: Cannot create object");
foreach($xml->children() as $books) {
        echo '<article><img src="' . $books->photo . '" />';
        echo "<div><b>" . $books->title . "</b></div> ";
        echo "<div>" . $books->author;
        echo " (" . $books->year . ")</div><br />";
        echo "<div>" . $books->price . "</div></article>";
}
?>


</section>

</body>
</html>