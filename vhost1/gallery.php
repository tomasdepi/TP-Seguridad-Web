<?php
ini_set("session.cookie_domain", "seguridad-web.com");
ini_set("session.cookie_lifetime", "3600");
session_start();
if(!isset($_SESSION['login_user'])){
	header("location: login.php");
	die();
}

if(isset($_GET["file"])){
	header("Content-Type: image/jpeg");
	echo file_get_contents("images/".$_GET["file"]); # Disable php basedir protection

}else{
	$user = $_SESSION['login_user'];
	echo "<p>Welcome: $user</p>";

	$dir_content = scandir("images/");
	foreach ($dir_content as $file) {
		if ($file == "." or $file == ".."){
			continue;
		}
		echo "<a href='gallery.php?file=$file'>$file<br/>";
	}
}