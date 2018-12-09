<?php

class Connection
{
    private $connection = null;
    public function getConnection(){
        try{
            return new PDO("mysql:host=localhost;dbname=root_tvfhub", 'root_tvfhub', 'nzivhVPC');
        }catch(Exception $e){
            echo "Can't connect to DATABASE!";
            return null;
        }
    }
}
