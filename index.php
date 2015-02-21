<html>
<head>
	<title>Books AJAX</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<script language="javascript" type="text/javascript">
//Browser Support Code
function ajaxFunc(){
	var ajaxReq;
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxReq = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxReq = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxReq = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	

	ajaxReq.onreadystatechange = function(){
		if(ajaxReq.readyState == 4){
			document.getElementById("output").innerHTML = ajaxReq.responseText;
		}
	}	
	
	var selection = document.bookSelection.Books.value;
	

	ajaxReq.open("GET", "ajax.php?selection=" + selection, true);
	ajaxReq.send(null); 
}
</script>
<h1 align="center">Using AJAX</h1>

<form name='bookSelection'>
<select name="Books" onchange="ajaxFunc()">
<?php

	$mysql_access = mysql_connect("localhost", "n00687362", 'Drakos$$h');

	if (!$mysql_access)
	{
		echo "Connection failed.";
		exit;
	}

	mysql_select_db("n00687362");

	$query = "Select DISTINCT Genre from Books";

	$result = mysql_query($query);

	while ($record = mysql_fetch_array($result) ) {
		
		echo "<option value='$record[0]'>$record[0]</option>";
	}

	mysql_close($mysql_access);
?>
</select>
</form>
<br><br>
<p id="output"></p>
<br>
<a href='../index.html'>Go Back to Homepage</a>
</body>
</html>
