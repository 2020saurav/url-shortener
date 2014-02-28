<?php
include ("dbconnect.php");
$surl = $_GET['q']; # this is redirection page. uses get method. 
$id = 0;
$last='';
$pow = 1;

while($surl !== '')	# decodes hash back to number from which it was created.
{ # inverse of mod62 hashing.
$last = substr($surl,-1);

if (ord($last)>=ord('a') && ord($last) <= ord('z'))
	$id = $id + ($pow * (ord($last)-ord('a')));

else if (ord($last)>=ord('A') && ord($last) <= ord('Z'))
	$id = $id + ($pow * (ord($last)-ord('A')+26));

else
	$id = $id + ($pow * (ord($last)-ord('0')+52));

$pow = $pow * 62;
$surl = substr($surl,0,-1);
}
# $id now has to be inverse-hashed against another hash: perfect hash using prime

$prime = 1000003;
$invmod = 861624; # pow(87659944, $prime -2) % $prime
$id = ($id * $invmod )% $prime;
# id now contains original record number of MySQL DB.
# search could have been done on shorturl data by adding in DB, but this search will be slow as we will be searching on 'random' strings
# without any order. However, if we use direct address method, there is no searching! MySQL's internal search will search faster
# on the field with auto_increment numbering.
$res = mysql_query("SELECT * FROM urlshort WHERE id = $id",$db);
$res1 = mysql_fetch_array($res);
$lurl = $res1['url'];
header('Location: '.(string)$lurl); # redirect to the long URL requested

?>