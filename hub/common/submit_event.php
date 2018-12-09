<?php
require_once("sqlconnect_old.php");
    $userrole = "Events"; // Allows all users to access
    include "../../login/misc/pagehead.php";
if((isset($_POST['eventname'])&& $_POST['eventname'] !='') && (isset($_POST['username'])&& $_POST['username'] !='') && (isset($_POST['date'])&& $_POST['date'] !='') && (isset($_POST['start_time'])&& $_POST['start_time'] !='') && (isset($_POST['truck'])&& $_POST['truck'] !='') && (isset($_POST['detail'])&& $_POST['detail'] !='') & (isset($_POST['username2'])&& $_POST['username2'] !=''))
    {
    $eventname = $conn->real_escape_string($_POST['eventname']);
    $username = $conn->real_escape_string($_POST['username']);
    $date = $conn->real_escape_string($_POST['date']);
    $start_time = $conn->real_escape_string($_POST['start_time']);
    $truck = $conn->real_escape_string($_POST['truck']);
    $detail = $conn->real_escape_string($_POST['detail']);
    $made_by = $conn->real_escape_string($_POST['username2']);


    $sql="INSERT INTO events (event_name, organiser, date, start_time, truck, details, made_by) VALUES ('".$eventname."','".$username."', '".$date."', '".$start_time."', '".$truck."', '".$detail."', '".$made_by."')";


    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        header("Location: ../logged.php");
        die();
        echo "Thank you! We will contact you soon";
    }
}
else
{
    //TO TROUBLESHOOT, REMOVE ALL COMMENTED OUT LINES OTHER THAN DERP

    //DERP
    $eventname = $conn->real_escape_string($_POST['eventname']);
    $username = $conn->real_escape_string($_POST['username']);
    $date = $conn->real_escape_string($_POST['date']);
    $start_time = $conn->real_escape_string($_POST['start_time']);
    $truck = $conn->real_escape_string($_POST['truck']);
    $detail = $conn->real_escape_string($_POST['detail']);
    $username2 = $conn->real_escape_string($_POST['username2']);
    //DERP


    echo "Error Submitting Event - Please contact @sshadmin";
    echo '<br>';
    echo $eventname;
    echo '<br>';
    echo $username;
    echo '<br>';
    echo $date;
    echo '<br>';
    echo $start_time;
    echo '<br>';
    echo $truck;
    echo '<br>';
    echo $detail;
    echo '<br>';
    echo $username2;
}
