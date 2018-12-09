<?php
require('header.php');
require_once("sqlconnect.php");
$id= $_GET['id'];

$connection = new Connection();
$conn = $connection->getConnection();

$sql = $conn->prepare("DELETE $id FROM user_jobs");
$sql->execute();
return null;

//TESTING FOR RETURN
//echo "<h1>$id</h1>";

header("location:../admin/leaveforms.php");
