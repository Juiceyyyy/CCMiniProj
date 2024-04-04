<?php
// Azure MySQL database connection parameters
$servername = 'miniproj.mysql.database.azure.com';
$username = 'miniproj1server';
$password = 'Joshua*2024';
$dbname = 'eventopedia';

// Attempt MySQL server connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
