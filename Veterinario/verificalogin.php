<?php
session_start();
if(!$_SESSION['usuario']) {
	header('location: loginvet.php');
	exit();
}
