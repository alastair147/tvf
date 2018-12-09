<?php
    require_once("../common/sqlconnect.php");
    $connection = new Connection();
    $conn = $connection->getConnection();

    $id = $_GET['key'];

    if ($id == null) {
        echo "False - No Key Supplied.";
    } else{
        $sql = $conn->prepare("SELECT id FROM u_members WHERE id =?");
        $sql->bindParam(1,$id);
        $sql->execute();
        $result = $sql->rowCount();
        if ($result > 0) {
            $sql = $conn->prepare("SELECT id, banned FROM u_members WHERE id =?");
            $sql->bindParam(1,$id);
            $sql->execute();
            $row = $sql->fetch();
            if ($row["banned"] == 0) {
                echo "true";
            } else {
                echo "False - User is banned. You may not log Job's well your account is banned";
            }
        } else {
            echo "False - User Not Found";
        }
    }

