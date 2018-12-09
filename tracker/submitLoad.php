<?php
    require_once("sqlconnect.php");

    $connection = new Connection();
    $conn = $connection->getConnection();

    $sql = $conn->prepare("INSERT INTO user_jobs (username, date, pickup_city, destination_city, pickup_company, destination_company, distance, convoy, cargo, weight, potential_income, total_income, total_damage, trackerjob, manualjob) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute([$_POST['id'], $_POST['date']]);



    if (!$result = $conn->query($sql)) {
        die('Error. Unable to submit job. [' . $conn->error . ']');
    } else {
        echo "true";
    }

    //echo "Error Submitting Job.";

    //echo "<h2>DEBUGGING AREA:</h2>";
    $username = $conn->real_escape_string($_POST['id']);
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
