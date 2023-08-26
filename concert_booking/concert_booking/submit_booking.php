<?php
 include 'connection.php';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $ticketType = $_POST['ticket-type'];
  $ticketCount = $_POST['ticket-count'];
  $paymentMethod = $_POST['payment-method'];
  $cardNumber = $_POST['card-number'];
  $expiryDate = $_POST['expiry-date'];
  $cvv = $_POST['cvv'];

 $sql = "INSERT INTO Booking ('name', 'email', 'phone', 'ticket-type', 'ticket-count', 'payment-method', 'card-number', 'expiry-date', 'cvv')
        VALUES ('$name', '$email', '$phone', '$ticketType', '$ticketCount', '$paymentMethod', '$cardNumber', '$expiryDate', '$cvv')";

 if ($conn->query($sql) === TRUE) {
    echo "Booking submitted successfully.";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }

$conn->close();
?>