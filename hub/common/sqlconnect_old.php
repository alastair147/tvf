<?php
$host = "localhost";
$userName = "root_tvfhub";
$password = "nzivhVPC";
$dbName = "root_tvfhub";
$rowsPerPage = 15;
$pageNum = 1;
$offset = ($pageNum - 1) * $rowsPerPage;


// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
