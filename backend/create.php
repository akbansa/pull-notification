<?php
/**
 * Created by PhpStorm.
 * User: akbansal
 * Date: 11/13/17
 * Time: 9:09 PM
 */
require_once('config.php');

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ".$db_name;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn, $db_name);

$sql = "CREATE TABLE notifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
text TEXT NOT NULL,
is_read INT(1) DEFAULT 0
)";

//create table
if ($conn->query($sql) === TRUE) {
  echo "Table notifications created successfully \n";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
