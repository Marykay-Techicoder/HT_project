<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard - Available Items</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    background-color: #333;
    padding: 10px 20px;
  }

  .navbar a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
  }

  .navbar a:hover {
    text-decoration: underline;
  }

  .container {
    padding: 20px;

  }

  .container h2 {

    text-align: center
  }

  .item-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .item-table th,
  .item-table td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
  }

  .item-table th {
    background-color: #f4f4f4;
  }

  .item-table img {
    width: 80px;
    height: auto;
    border-radius: 5px;
  }

  .order-button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
  }

  .order-button:hover {
    background-color: #218838;
  }

  .personalized-order {
    margin-top: 30px;
  }

  .order-form {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: 20px 0;
  }

  .order-form input {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .order-form button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
  }

  .order-form button:hover {
    background-color: #0056b3;
  }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <!-- Navbar content can go here -->
  </nav>

  <!-- Main Content -->
  <div class="container">
    <!-- Available Items Table -->
    <h2>Available Items</h2>
    <table class="item-table">
      <thead>
        <tr>
          <!--<th>Image</th>-->
          <th>Name</th>
          <th>Price</th>
          <th>Available Time</th>
          <th>Quantity</th>
          <!--<th>Order</th>-->
        </tr>
      </thead>
      <tbody>
        <?php
        session_start();
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "cafeteria";

        // Create connection
        $conn = new mysqli($server, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Fetch available items from the 'food' table
        $sql = "SELECT * FROM food";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // Ensure that the image path is correct
            $image_path = $row['image'];
            // Checking if the image is stored in the 'uploads/' directory, otherwise use a default image
            $image_url = !empty($image_path) ? 'uploads' . $image_path : 'uploads/default-image.jpg';

            echo "<tr>
              <!--<td><img src='uploads" . $image_url . "' alt='" . $row['name'] . "'></td>-->
              <td>" . $row['name'] . "</td>
              <td>" . $row['price'] . "</td>
              <td>" . $row['available_time'] . "</td>
              <td>" . $row['quantity'] . "</td>
              <!--<td><a href='details.php?item_id=" . $row['id'] . "&name=" . urlencode($row['name']) . "&price=" . urlencode($row['price']) . "&available_time=" . urlencode($row['available_time']) . "&quantity=" . urlencode($row['quantity']) . "' class='order-button'>Order</a></td>-->
            </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No items available</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>

    </table>

    <!-- Personalized Order Form-->
    <div class="personalized-order">
      <h3><a href="order.php" class='order-button'>Order</a></h3>
    </div>
  </div>
</body>

</html>