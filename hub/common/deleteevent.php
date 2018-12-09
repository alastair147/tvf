<?php
require('header.php');
require_once("sqlconnect.php");
    $userrole = "Events"; // Allows all users to access
    include "../../login/misc/pagehead.php";
$id = $_GET['id'];

//TESTING FOR RETURN
echo "<h1>$id</h1>";

$connection = new Connection();
$conn = $connection->getConnection();

$sql = $conn->prepare("DELETE FROM events WHERE id=$id");
$sql->execute();

header("location:../admin/adminevents.php");
die;
