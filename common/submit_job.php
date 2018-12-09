<?php
require_once("sqlconnect.php");
if((isset($_POST['date'])&& $_POST['date'] !='') &&
    (isset($_POST['pickupcity'])&& $_POST['pickupcity'] !='') && (isset($_POST['destinationcity'])&& $_POST['destinationcity'] !='') &&
    (isset($_POST['pickupcompany'])&& $_POST['pickupcompany'] !='') && (isset($_POST['destinationcompany'])&& $_POST['destinationcompany'] !='') &&
    (isset($_POST['distance'])&& $_POST['distance'] !='') && (isset($_POST['convoy'])&& $_POST['convoy'] !='')&& (isset($_POST['cargo'])&& $_POST['cargo'] !='') &&
    (isset($_POST['weight'])&& $_POST['weight'] !='') && (isset($_POST['potentialincome'])&& $_POST['potentialincome'] !='') && (isset($_POST['totalincome'])&& $_POST['totalincome'] !='') &&
    (isset($_POST['totaldamage'])&& $_POST['totaldamage'] !=''))
{
    //$username = $conn->real_escape_string($_POST['username']);
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



    $sql="INSERT INTO user_jobs (date, pickup_city, destination_city, pickup_company, destination_company, distance, convoy, cargo, weight, potential_income, total_income, total_damage) 
    VALUES ('".$d ."', '".$pcity."', '".$dcity."','".$pcompany."','".$dcompany."','".$distance."','".$convoy."','".$cargo."','".$weight."','".$pincome."','".$totalincome."','".$totaldamage."')";


    if(!$result = $conn->query($sql)){
        die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
        echo "Job Submitted";
    }
}
else
{
    echo "Error Submitting Job.";

    echo "<h2>DEBUGGING AREA:</h2>";
    $d = $conn->real_escape_string($_POST['date']);
    $pcity = $conn->real_escape_string($_POST['pickupcity']);
    $dcity = $conn->real_escape_string($_POST['destinationcity']);
    $pcompany = $conn->real_escape_string($_POST['pickupcompany']);
    $dcompany = $conn->real_escape_string($_POST['destinationcompany']);
    $distance = $conn->real_escape_string($_POST['distance']);
    $convoy = $conn->real_escape_string($_POST['convoy']);
    $cargo = $conn->real_escape_string($_POST['cargo']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $potential_income = $conn->real_escape_string($_POST['potentialincome']);
    $totalincome = $conn->real_escape_string($_POST['totalincome']);
    $totaldamage = $conn->real_escape_string($_POST['totaldamage']);
    echo " ";
    echo $d;
    echo $pcity;
    echo $dcity;
    echo $pcompany;
    echo $dcompany;
    echo $distance;
    echo $convoy;
    echo $weight;
    echo $pincome;
    echo $totalincome;
    echo $totaldamage;

    echo "<h2>DEBUGGING AREA FINISH //</h2>";

}
