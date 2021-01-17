<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if ($password['password'] !== $password_confirm['password_confirm']) {
	die('Password and confirm password should match');
}
$servername = "localhost";
$dbUser = "jack";
$dbPassword = "jack123";
$dbName = "project";
$conn = new mysqli($servername, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO record (username, email, password) VALUES ('$username', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
	echo "registration successfull";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
} 
$conn->close();
?>