<?php session_start(); ?>
<?php 

$_SESSION['fname'] = null;
$_SESSION['type'] = null;

header("Location:login.php")
?>