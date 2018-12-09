<?php
require_once("sqlconnect_old.php");
require "../../filehandler/autoload.php";

    $userrole = "Media"; // Allows all users to access
    include "../../login/misc/pagehead.php";


if((isset($_POST['name'])&& $_POST['name'] !='') && (isset($_POST['image'])&& $_POST['image'] !=''))
    {
    $name = $conn->real_escape_string($_POST['name']);
    $image = $conn->real_escape_string($_POST['image']);



    $sql=""; // SQL Statmement to insert into DB if required.


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
    $name = $conn->real_escape_string($_POST['eventname']);
    $image = $conn->real_escape_string($_POST['username']);
    //DERP


    echo "Error Submitting Event - Please contact @sshadmin";
    echo '<br>';
    echo $name;
    echo '<br>';
    echo $image;
}
