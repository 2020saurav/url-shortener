<html>
<head>
<title>URL Shortener</title>
<link rel='stylesheet' href='stylesheets/bootstrap.min.css' type='text/css'/>
</head>
<body>

<?php
include ("dbconnect.php");

if (empty($_POST['longurl']))
$longurl = ''; # default value when accessed first time or without posting anything
else
$longurl = $_POST['longurl'];

echo"
	<div id='searchbox1' class='col-lg-6'>

	<form action='url.php' method='post' class='bs-example bs-example-form'>
		<h1 align='center'>URL Shortener</h1>
		<br/>
			<div class='input-group'>
				<input type='text' name='longurl' value='".$longurl."' placeholder='Enter the URL to shorten' class='form-control'/>
				<span class='input-group-btn'>
					<button type='submit' class='btn btn-default'>Shorten</button>
				</span>
			</div>
	</form>
	</div>
	
";

if ($longurl !== '') # non blank post req. Shorten the URL and generate link and display
{
	mysql_query("INSERT INTO urlshort (url) VALUES ('$longurl')", $db);

	$record_no = mysql_insert_id();
# record number will be taken from auto incrementing id in mysql table
# now we need to generate hash out of it (one to one)

	#we will use 2 hashing methods: 1st: (a*n + b)%prime and 2nd: modulo62

$prime = 1000003;
$a = 87659944;
$n = ($record_no * $a) % $prime;	# perfect hashing, assuming number of records not exceeding $prime.

$hash = '';

while($n>0)	#generation of hash by 2nd function : mod62. [a-z: 26, A-Z: 26, 0-9: 10 = 62]
{
	$rem = $n % 62;
	if($rem < 26)
	{
		$hash = chr($rem + ord('a')) . $hash;
	}
	else if ($rem < 52 )
	{
		$hash = chr($rem - 26 + ord('A')) . $hash;
	}
	else
	{
		$hash = chr($rem - 52 + ord('0')) . $hash;
	}
	$n = (int) ($n / 62);

}
echo "
<div id ='urldisplay' >  <font color = '#3c763d'>
 <b>Shortened URL: </b> 
http://saurav.webuda.com/r.php?q=".$hash."</font>
</div>

";

	

}



echo "</body>
</html>";

?>