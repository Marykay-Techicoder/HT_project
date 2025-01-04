<?php
include('../db.php');

$name = $_POST['name'];
$price = $_POST['price'];
$time = $_POST['time'];

$sql = "INSERT INTO food (name, price, available_time) VALUES ('$name', '$price', '$time')";

if ($conn->query($sql) === TRUE) {
  header("Location: ../admin/dashboard.php?success=1");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();