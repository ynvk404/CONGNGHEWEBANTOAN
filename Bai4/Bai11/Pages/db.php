<?php
$host = "localhost";
$user = "root"; // username MySQL
$pass = "";     // password MySQL
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
