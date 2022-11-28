<?php 
session_start();
$_SESSION = [];
header('location: ../admin/login.php');