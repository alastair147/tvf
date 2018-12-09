<?php
require_once("sqlconnect.php");
if((isset($_POST['date'])&& $_POST['date'] !='') && (isset($_POST['reason'])&& $_POST['reason'] !='') && (isset($_POST['leaving'])&& $_POST['leaving'] !='') && (isset($_POST['username'])&& $_POST['username'] !=''))
{
$date = $conn->real_escape_string($_POST['date']);
    $username = $conn->real_escape_string($_POST['username']);
    $reason = $conn->real_escape_string($_POST['reason']);
    $leaving = $conn->real_escape_string($_POST['leaving']);

    $sql="INSERT INTO loa (date, username, leaving, reason) VALUES ('".$date."','".$username."', '".$leaving."', '".$reason."')";


    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        echo "Thank you! We will contact you soon";
    }
}
else
{
    echo "Error Submitting Leave Form";
}
