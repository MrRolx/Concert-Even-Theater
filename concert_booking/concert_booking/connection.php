<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'concert_booking';

$conn = mysqli_connect($hostname, $username, $password, $database);

// if (!$conn) {
//     header("Location: db-error.php");

// } else {
//     echo '<h1>Success</h1>';
// }
?>