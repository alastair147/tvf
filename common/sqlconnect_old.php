<?php
//$host = "localhost";
$userName = "root";
$password = "";
$dbName = "sgc_hub";
$rowsPerPage = 15;
$pageNum = 1;
$offset = ($pageNum - 1) * $rowsPerPage;


// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
