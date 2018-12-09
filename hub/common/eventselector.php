<?php
//Requirements
require_once("common/sqlconnect_old.php");
$connection = new Connection();
$conn = $connection->getConnection();
    $userrole = "Driver"; // Allows all users to access
    include "../login/misc/pagehead.php";



//$job = "1";
$id = $_GET['id'];

//SQL Query
$sql = $conn->prepare("SELECT id, event_name, organiser, date, start_time, truck, details, made_by, image_link, video_link, forum_link FROM events WHERE id = ?");
$sql->bindParam(1, $id);
$sql->execute();
$row = $sql->fetch();

$event_name = $row["event_name"];
$organiser = $row["organiser"];
$d = $row["date"];
$start_time = $row["start_time"];
$truck = $row["truck"];
$details = $row["details"];
$made_by = $row["made_by"];
$image = $row['image_link'];
$video = $row['video_link'];
$forum = $row['forum_link'];



$youtube = "<iframe width=\"615\" height=\"315\" src=\"https://www.youtube.com/embed/$video?rel=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";


//if ($job == 1) {

//}
//else {
//
//  $row = $result->fetch_assoc();
//  $id = $row["id"];
//  $organiser = $row["organiser"];
//  $d = $row["date"];
//  $start_time = $row["start_time"];
//  $truck = $row["truck"];
//  $details = $row["details"];
//  $made_by = $row["made_by"];
//
//
//}


//VARIABLES

//$row = $result->fetch_assoc();



