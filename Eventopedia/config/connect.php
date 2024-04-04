<?php
// Initialize MySQLi object
$conn = mysqli_init();

// Set SSL options (replace {path to CA cert} with the actual path to the CA certificate)
mysqli_ssl_set($conn, NULL, NULL, "{path to CA cert}", NULL, NULL);

// Connect to the MySQL server using SSL
mysqli_real_connect($conn, "miniproj.mysql.database.azure.com", "miniproj1server", "Joshua*2024", "eventopedia", 3306, MYSQLI_CLIENT_SSL);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

// Perform database operations here...

// Close connection
mysqli_close($conn);
?>
