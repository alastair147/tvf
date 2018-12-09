<?php

class Connection
{
    private $connection = null;
    private $conn = null;
    public function getConnection(){
        try{
            return new PDO("mysql:host=localhost;dbname=sgchub", 'root', 'Catys147');
        }catch(Exception $e){
            echo "Can't connect to DATABASE!";
            return null;
        }
    }
}
