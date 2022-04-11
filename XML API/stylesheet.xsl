<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html>
<head>
<style>

body {
	font-size: 100%;
}

table { 
	width: 100%;
	max-width: 600px;
	margin: auto;
     	background-color : lightyellow;
	text-align: left;
	border-spacing: 0;
    	border-collapse: collapse;
	font-family: arial;
	font-size: .75rem;
	box-shadow: 3px 3px 5px rgba(0,0,0,.2);
}

h2 {
	width: 100%;
	max-width: 600px;
	margin: auto;
}

th {
     	background-color : black;
	color: white;
	padding: 5px 10px;
}

tr:hover {
    	background-color : rgba(0,0,0,.6);
	color: white;
}

td {
	cursor: pointer;
	padding: 3px 10px;
}
</style>
</head>
<body>
<h2>Booklist</h2>
<table>
	<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Year</th>
		<th>Price</th>
    	</tr>
    
	<xsl:for-each select="bookstore/book">
<xsl:sort select="year"/>
    	<tr>
      		<td><xsl:value-of select="title"/></td>
      		<td><xsl:value-of select="author"/></td>
      		<td><xsl:value-of select="year"/></td>
      		<td><xsl:value-of select="price"/></td>
    	</tr>
    	</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
