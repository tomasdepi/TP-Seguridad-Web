<?php
ini_set("session.cookie_domain", "ctf.nearpod.com");
ini_set("session.cookie_lifetime", "3600");
@session_destroy();

if(!isset($_POST["submit"])){
	header("Location: login.html");
	die();
}

$servername = "mysql";
$username = "root";
$password = "segu-web-1234";
$dbname = "segu_web";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = md5($_POST["password"]);
$sql = "SELECT * FROM Users where email='$email' and password='$password'";

$result = $conn->query($sql);
$error = addslashes($conn->error);

$rows = $result->num_rows;
if ($result && $rows !=0) {
	session_start();
	$_SESSION['login_user']=$email;
	header("location: gallery.php");
} else {
	$error_msg = "Username or Password is invalid";
}
echo $error_msg;
$conn->close();

$sql = addslashes($sql);
echo "<script>console.log('$sql','$error')</script>";





