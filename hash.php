<?php

$record_no = $_GET['q'];
# record number will be taken from auto incrementing id in mysql table
# now we need to generate hash out of it (one to one)
$n = $record_no;
$hash = '';

while($n>0)	#record_no will begin from 1
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
echo $hash;
?>