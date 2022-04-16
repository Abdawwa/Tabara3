<?php
$serverName = "localhost";
$dbuser = "root";
$password = "";
$dbname = "tabara3";

$conn = mysqli_connect($serverName , $dbuser , $password , $dbname);

if(!$conn){
    echo "Error Connect";
}
