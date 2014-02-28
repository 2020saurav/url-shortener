<html>
<head>
<title>URL Shortener</title>
<link rel='stylesheet' href='stylesheets/bootstrap.min.css' type='text/css'/>
</head>
<body>

<?php
include ("dbconnect.php");

if (empty($_POST['longurl']))
$longurl = ''; # default value
else
$longurl = $_POST['longurl'];

echo"
<div>
	<form action='url.php' method='post' class='bs-example bs-example-form'>
	<div id='searchbox1' class='col-lg-6'>
		<h1 align='center'>URL Shortener</h1>
		<br/>
			<div class='input-group'>
				<input type='text' name='longurl' value=".$longurl." placeholder='Enter the URL to shorten' class='form-control'/>
				<span class='input-group-btn'>
					<button type='submit' class='btn btn-default'>Shorten</button>
				</span>
			</div>
	</div>
	</form>
</div>";

if ($longurl !== '')
{
	# push the URL into DB and get its ID.
	# then use hash.php's code here

}


echo "</body>
</html>";

?>