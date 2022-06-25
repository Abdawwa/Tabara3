<?php
$serverName = "localhost";
$dbuser = "root";
$password = "";
$dbname = "tabara3_new";

define('PAYPAL_ID', 'sb-jfsro16588172@business.example.com');
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE

define('PAYPAL_RETURN_URL', 'http://localhost/Tabara3/home.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/Tabara3/login.php');
define('PAYPAL_NOTIFY_URL', 'http://localhost/Tabara3/signup.php');
define('PAYPAL_CURRENCY', 'USD');

define('PAYPAL_URL', (PAYPAL_SANDBOX == true) ? "https://www.sandbox.paypal.com/cgi-bin/webscr" : "https://www.paypal.com/cgi-bin/webscr");
$conn = mysqli_connect($serverName, $dbuser, $password, $dbname);

if (!$conn) {
    echo "Error Connect";
}
