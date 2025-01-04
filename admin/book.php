<?php
// Replace with actual credentials
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "cafeteria"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT id, username, student_id, number, image, name, price, available_time, quantity, created_at FROM `order`";
$result = $conn->query($sql);



$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafeteria Orders</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f9;
  }

  h1 {
    text-align: center;
    color: #333;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table,
  th,
  td {
    border: 1px solid #ddd;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  td img {
    max-width: 50px;
    height: auto;
  }

  .container {
    width: 80%;
    margin: 0 auto;
  }
  </style>
</head>

<body>

  <div class="container">
    <h1>Cafeteria Orders</h1>

    <table>
      <thead>
        <tr>
          <!-- <th>ID</th> -->
          <th>Username</th>
          <th>Student ID</th>
          <th>Phone Number</th>
          <!--<th>Image</th>-->
          <th>Name</th>
          <th>Price</th>
          <th>Available Time</th>
          <th>Quantity</th>
          <th>Created At</th>
        </tr>
      </thead>
      <tbody>

        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                            
                            <td>" . $row["username"] . "</td>
                            <td>" . $row["student_id"] . "</td>
                            <td>" . $row["number"] . "</td>
                            <!--<td><img src='uploads" . $row["image"] . "' alt='Food image'></td>-->
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["price"] . "</td>
                            <td>" . $row["available_time"] . "</td>
                            <td>" . $row["quantity"] . "</td>
                            <td>" . $row["created_at"] . "</td>
                          </tr>";
          }
        } else {
          echo "<tr><td colspan='10'>No orders found.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>