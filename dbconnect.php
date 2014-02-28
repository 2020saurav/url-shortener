<?php
$dbHost = "mysql14.000webhost.com";
$dbUser = "a7773326_admin";
$dbPass = "fakepassword";
$dbDatabase = "a7773326_intern";
 
//connect to the database
 
$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
 
mysql_select_db("$dbDatabase", $db) or die ("Couldn't select the database.");
?>