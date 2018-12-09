<?php
require('header.php');
require_once("sqlconnect.php");
$id = $_GET['id'];
    $userrole = "Staff"; // Allows all users to access
    include "../../login/misc/pagehead.php";


//TESTING FOR RETURN
echo "<h1>$id</h1>";

$connection = new Connection();
$conn = $connection->getConnection();

$sql = $conn->prepare("DELETE FROM loa WHERE id=$id");
$sql->execute();

header("location:../admin/leaveforms.php");
die;
