<?php

session_start();
$_SESSION['user_id'] =1;

$db = new PDO('mysql:dbname=todo;host:localhost','root','kamehameha');

if (isset($_SESSION['user_id'])) {
	# code...
	die("you are not signed in");
}
