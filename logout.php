<?php
require_once('data.php');
session_start();
unset($_SESSION['user']);
header('location: index.php');
?>
