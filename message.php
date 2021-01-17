<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];
echo $email;
echo $password;
$con = new mysqli("localhost", "jack", "jack123", "project");
session_start();
if($con->connect_error) {
    die("Failed to connect : " .$con->connect_error);
} else {
    $stmt = mysqli_prepare($con, "SELECT * FROM record WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password and $data['username'] === $username) { 
            $_SESSION['user_name'] = $username;
            header('location:home.php');
        } else {
            echo "<h2>Invalid username and password";
        }
    } else {
        echo "<h2> Invalid username and password";
    }
}
?>