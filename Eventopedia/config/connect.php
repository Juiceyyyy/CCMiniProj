<?php
$servername = 'miniproj.mysql.database.azure.com';
$username='miniproj1server';
$password='Joshua*2024';
$dbname="miniproj";
function connect()
{

	global $servername, $username, $password, $dbname;
	try{
			$conn= new PDO("mysql:host=$servername; dbname=$dbname",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			return $conn;
	}
	catch(Exception $e){
		echo "Connection Failed".$e->getmessage();
	}
}
function connect_close()
{
	$conn=null;
}
date_default_timezone_set("Asia/Calcutta");

?>