<?php
$serverName = "localhost";
$dbuser = "root";
$password = "";
$dbname = "tabara3_new";

$conn = mysqli_connect($serverName , $dbuser , $password , $dbname);

if(!$conn){
    echo "Error Connect";
}
