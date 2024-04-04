<?php
// $con = mysqli_init();
// mysqli_ssl_set($con,NULL,NULL, "{path to CA cert}", NULL, NULL);
// mysqli_real_connect($conn, "miniproj.mysql.database.azure.com", "miniproj1server", "Joshua*2024", "eventopedia", 3306, MYSQLI_CLIENT_SSL);
$servername = 'miniproj.mysql.database.azure.com';
$username='miniproj1server';
$password='Joshua*2024';
$dbname="eventopedia";
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
