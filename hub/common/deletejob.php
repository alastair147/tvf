<?php
require('header.php');
require_once("sqlconnect.php");

    $userrole = "Driver"; // Allows all users to access
    include "../../login/misc/pagehead.php";

$id= $_GET['id'];
$u = $_GET['user'];
$uid = $_SESSION['uid'];
$user = $_SESSION['username'];

    $connection = new Connection();
    $conn = $connection->getConnection();

    $sql = $conn->prepare("SELECT id, username FROM user_jobs WHERE id =?");
    $sql->bindParam(1,$id);
    $sql->execute();

    $row = $sql->fetch();

    $ui = $row["id"];
    $username = $row["username"];

    // Check if the user who ran the query owns the job
    if ($u == $uid && $username == $user) {
        $currentuser = 1;
    } else {
        $currentuser = 0;
    }


    // If the user owns the job, allow it to delete, else check if Admin or HR. Else deny them to delete.
    if ($currentuser == 1 || $auth->isSuperAdmin() || $auth->isAdmin() || $auth->isHR()) {

        $sql = $conn->prepare( "DELETE FROM user_jobs WHERE id =:id" );
        $sql->bindParam(':id', $id);
        $sql->execute();

        //echo "IF: $ui <br> $uid <br>  $username <br> $id <br> $u";
        header("location:../RemovedJob.php");
        die();

    } else {

        // Error no permission to delete the job.
        header("location:../ErrorLogged.php");
        die();
        //echo "ELSE: $ui <br> $uid <br>  $username <br> $id <br> $u";

    }



return null;