<?php

$servername = "localhost";
$dBUsername = "caleb";
$dbPassword = "Mydigital!1";
$dbName = "loginsystemtuts";


//running a connection
$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}
