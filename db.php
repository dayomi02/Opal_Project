<?php
	session_start();
	header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

	// $db = new mysqli("localhost","root","mirim2","opal"); 
	$db = mysqli_connect('localhost','opal','fPD15Nt7LNXwdTvQ','opal','22');
	//$db = mysqli_connect('localhost','root','mirim2','opal','3307');
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>