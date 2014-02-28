<?php
$dbHost = "mysql14.000webhost.com"; #using free server 000webhost
$dbUser = "fakeusername";	#protecting db credentials for sake of uploading!
$dbPass = "fakepassword";
$dbDatabase = "fakedbname";
 
//connect to the database
 
$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
 
mysql_select_db("$dbDatabase", $db) or die ("Couldn't select the database.");
?>