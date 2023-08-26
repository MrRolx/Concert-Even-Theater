<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ticketType = $_POST['ticket-type'];
$bookingType = $_POST['booking-type'];
$ticketCount = $_POST['ticket-count'];
$paymentMethod = $_POST['payment-method'];
$cardNumber = $_POST['card-number'];
$expiryDate = $_POST['expiry-date'];
$cvv = $_POST['cvv'];
$bookingTime = date('H:i:s');

$sql = "INSERT INTO bookings (`name`, `email`, `phone`, `type`, `booking_type`,`ticket_count`,`booking_time`, `method`, `card`, `exp_date`, `cvv`,`created_at`,`updated_at`)
  VALUES ('$name', '$email', '$phone', '$ticketType', '$bookingType','$ticketCount','$bookingTime', '$paymentMethod', '$cardNumber', '$expiryDate', '$cvv',NOW(),NOW())";


if (mysqli_query($conn, $sql)) {
   echo "Booking Confirmed";
   sleep(3);
   header('location:book.html');
   exit;
} else {
   echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
