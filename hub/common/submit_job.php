<?php
require_once("sqlconnect_old.php");

    $userrole = "Driver"; // Allows all users to access
    include "../../login/misc/pagehead.php";

if((isset($_POST['date'])&& $_POST['date'] !='') && (isset($_POST['username'])&& $_POST['username'] !='') &&
    (isset($_POST['pickupcity'])&& $_POST['pickupcity'] !='') && (isset($_POST['destinationcity'])&& $_POST['destinationcity'] !='') &&
    (isset($_POST['pickupcompany'])&& $_POST['pickupcompany'] !='') && (isset($_POST['destinationcompany'])&& $_POST['destinationcompany'] !='') &&
    (isset($_POST['distance'])&& $_POST['distance'] !='') && (isset($_POST['convoy'])&& $_POST['convoy'] !='')&& (isset($_POST['cargo'])&& $_POST['cargo'] !='') &&
    (isset($_POST['weight'])&& $_POST['weight'] !='') && (isset($_POST['potentialincome'])&& $_POST['potentialincome'] !='') && (isset($_POST['totalincome'])&& $_POST['totalincome'] !='') &&
    (isset($_POST['totaldamage'])&& $_POST['totaldamage'] !=''))
{
    $username = $conn->real_escape_string($_POST['username']);
    $d = $conn->real_escape_string($_POST['date']);
    $pcity = $conn->real_escape_string($_POST['pickupcity']);
    $dcity = $conn->real_escape_string($_POST['destinationcity']);
    $pcompany = $conn->real_escape_string($_POST['pickupcompany']);
    $dcompany = $conn->real_escape_string($_POST['destinationcompany']);
    $distance = $conn->real_escape_string($_POST['distance']);
    $convoy = $conn->real_escape_string($_POST['convoy']);
    $cargo = $conn->real_escape_string($_POST['cargo']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $pincome = $conn->real_escape_string($_POST['potentialincome']);
    $totalincome = $conn->real_escape_string($_POST['totalincome']);
    $totaldamage = $conn->real_escape_string($_POST['totaldamage']);
    //$notes = $conn->real_escape_string($_POST['notes']);
    $trackerjob = 0;
    $manualjob = 1;



    $sql="INSERT INTO user_jobs (username, date, pickup_city, destination_city, pickup_company, destination_company, distance, convoy, cargo, weight, potential_income, total_income, total_damage, trackerjob, manualjob) 
    VALUES ('".$username ."','".$d ."', '".$pcity."', '".$dcity."','".$pcompany."','".$dcompany."','".$distance."','".$convoy."','".$cargo."','".$weight."','".$pincome."','".$totalincome."','".$totaldamage."','".$trackerjob."','".$manualjob."')";


    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        header("Location: ../logged.php");
        die();

        echo "Job Submitted";
    }
}
else
{
    echo "Error Submitting Job.";

    echo "<h2>DEBUGGING AREA:</h2>";
    $username = $conn->real_escape_string($_POST['username']);
    $d = $conn->real_escape_string($_POST['date']);
    $pcity = $conn->real_escape_string($_POST['pickupcity']);
    $dcity = $conn->real_escape_string($_POST['destinationcity']);
    $pcompany = $conn->real_escape_string($_POST['pickupcompany']);
    $dcompany = $conn->real_escape_string($_POST['destinationcompany']);
    $distance = $conn->real_escape_string($_POST['distance']);
    $convoy = $conn->real_escape_string($_POST['convoy']);
    $cargo = $conn->real_escape_string($_POST['cargo']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $pincome = $conn->real_escape_string($_POST['potentialincome']);
    $totalincome = $conn->real_escape_string($_POST['totalincome']);
    $totaldamage = $conn->real_escape_string($_POST['totaldamage']);
    echo " ";
    echo $username;
    echo $d;
    echo '<br>';
    echo $pcity;
    echo '<br>';
    echo $dcity;
    echo '<br>';
    echo $pcompany;
    echo '<br>';
    echo $dcompany;
    echo '<br>';
    echo $distance;
    echo '<br>';
    echo $convoy;
    echo '<br>';
    echo $weight;
    echo '<br>';
    echo $pincome;
    echo '<br>';
    echo $totalincome;
    echo '<br>';
    echo $totaldamage;

    echo "<h2>DEBUGGING AREA FINISH //</h2>";

}
