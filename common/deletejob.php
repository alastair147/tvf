<?php
require('header.php');
require_once("sqlconnect.php");
$id= $_GET['id'];

$connection = new Connection();
$conn = $connection->getConnection();

//$id = $_POST['id'];
$sql = $conn->prepare( "DELETE FROM user_jobs WHERE id =:id" );
$sql->bindParam(':id', $id);
$sql->execute();
if( ! $sql->rowCount() ) echo "Deletion failed";

header("location:../loggedjobs.php");
return null;