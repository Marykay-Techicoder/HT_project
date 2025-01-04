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

// Initialize messages
$errors = [];
$success_message = "";

// Handle form submission for adding items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_item'])) {
  $item_name = $_POST['item_name'];
  $item_price = $_POST['item_price'];
  $available_time = $_POST['available_time'];
  $quantity = $_POST['quantity'];
  $item_image = $_FILES['item_image']['name'];
  $item_image_temp = $_FILES['item_image']['tmp_name'];

  // Validate fields
  if (empty($item_name) || empty($item_price) || empty($available_time) || empty($quantity)) {
    $errors[] = "All fields are required!";
  }

  if (!is_numeric($item_price) || !is_numeric($quantity)) {
    $errors[] = "Price and quantity must be numeric!";
  }

  if (empty($item_image)) {
    $errors[] = "Please upload an image!";
  } else {
    // Check if the uploaded file is an image
    $check = getimagesize($item_image_temp);
    if ($check === false) {
      $errors[] = "The uploaded file is not a valid image.";
    }
  }

  // Proceed if no errors
  if (empty($errors)) {
    // File upload logic
    $target_dir = "uploads";
    $target_file = $target_dir . uniqid() . "_" . basename($item_image);

    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
      // Insert into database
      $sql = "INSERT INTO food (name, price, available_time, quantity, image) 
                    VALUES ('$item_name', '$item_price', '$available_time', '$quantity', '$target_file')";
      if ($conn->query($sql) === TRUE) {
        $success_message = "Item added successfully!";
      } else {
        $errors[] = "Error: " . $conn->error;
      }
    } else {
      $errors[] = "Failed to upload image!";
    }
  }
}

// Handle delete request
if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];
  $sql = "DELETE FROM food WHERE id = $delete_id";
  if ($conn->query($sql) === TRUE) {
    $success_message = "Item deleted successfully!";
  } else {
    $errors[] = "Error deleting item: " . $conn->error;
  }
}

// Fetch items
$sql = "SELECT * FROM food";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Items - Admin Dashboard</title>
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

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .add-item-btn {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
  }

  .add-item-btn:hover {
    background-color: #218838;
  }

  .add-item-form {
    margin-top: 20px;
  }

  .hidden {
    display: none;
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

  .error {
    color: red;
    margin-bottom: 10px;
  }

  .success {
    color: green;
    margin-bottom: 10px;
  }

  .delete-btn {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 5px;
  }

  .delete-btn:hover {
    background-color: #c82333;
  }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="book.php">Bookings</a>
  </nav>

  <!-- Main Content -->
  <div class="container">
    <!-- Available Items Heading and Add Button -->
    <div class="header">
      <h2>Available Items</h2>
      <button id="addItemButton" class="add-item-btn">+ Add Item</button>
    </div>

    <!-- Display Messages -->
    <?php
    if (!empty($errors)) {
      echo "<div class='error'>" . implode("<br>", $errors) . "</div>";
    }
    if (!empty($success_message)) {
      echo "<div class='success'>$success_message</div>";
    }
    ?>

    <!-- Add Item Form (Initially Hidden) -->
    <div id="addItemForm" class="add-item-form hidden">
      <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="add_item" value="1">
        <input type="text" name="item_name" placeholder="Item Name">
        <input type="text" name="item_price" placeholder="Item Price">
        <input type="time" name="available_time">
        <input type="number" name="quantity" placeholder="Quantity Available">
        <input type="file" name="item_image" accept="image/*">
        <button type="submit">Add Item</button>
      </form>
    </div>

    <!-- Table of Available Items -->
    <table class="item-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Available Time</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['available_time'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td><a href='?delete_id=" . $row['id'] . "' class='delete-btn'>Delete</a></td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No items available</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
  // Toggle Add Item Form Visibility
  const addItemButton = document.getElementById("addItemButton");
  const addItemForm = document.getElementById("addItemForm");

  addItemButton.addEventListener("click", () => {
    addItemForm.classList.toggle("hidden");
  });
  </script>
</body>

</html>