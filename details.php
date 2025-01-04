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

$success = "";
$errors = [];

// Retrieve item details from the URL
$item_id = isset($_GET['item_id']) ? $_GET['item_id'] : '';
$item_name = isset($_GET['name']) ? $_GET['name'] : '';
$item_price = isset($_GET['price']) ? $_GET['price'] : '';
$item_available_time = isset($_GET['available_time']) ? $_GET['available_time'] : '';
$item_quantity = isset($_GET['quantity']) ? $_GET['quantity'] : '';  // Retrieve quantity

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve and validate form data
  $username = trim($_POST['username']);
  $student_id = trim($_POST['student_id']);
  $number = trim($_POST['number']);

  // Handle image upload
  $image = $_FILES['image'];
  $image_name = $image['name'];
  $image_tmp = $image['tmp_name'];
  $image_size = $image['size'];
  $image_error = $image['error'];

  // Validate image
  $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
  $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

  if ($image_error !== UPLOAD_ERR_OK) {
    $errors[] = "Error uploading the image.";
  } elseif (!in_array($image_extension, $allowed_extensions)) {
    $errors[] = "Only JPG, JPEG, PNG, and GIF files are allowed.";
  } elseif ($image_size > 5000000) { // 5MB max file size
    $errors[] = "Image file size must be less than 5MB.";
  } else {
    // Generate a unique name for the image and move it to the uploads folder
    $image_new_name = uniqid('', true) . "." . $image_extension;
    $image_upload_dir = 'uploads/'; // Folder where images will be saved

    if (!is_dir($image_upload_dir)) {
      mkdir($image_upload_dir, 0777, true); // Create the uploads directory if it doesn't exist
    }

    $image_upload_path = $image_upload_dir . $image_new_name;

    if (!move_uploaded_file($image_tmp, $image_upload_path)) {
      $errors[] = "Failed to move uploaded image.";
    }
  }

  // Validate other form inputs
  if (empty($username)) {
    $errors[] = "Username is required.";
  }
  if (empty($student_id)) {
    $errors[] = "Student ID is required.";
  }
  if (empty($number) || !preg_match("/^[0-9]{10}$/", $number)) {
    $errors[] = "A valid 10-digit phone number is required.";
  }

  // If no errors, insert data into the database
  if (empty($errors)) {
    echo "Username: " . $username . "<br>";
    echo "Student ID: " . $student_id . "<br>";
    echo "Phone Number: " . $number . "<br>";
    echo "Image Path: " . $image_upload_path . "<br>";
    echo "Item Name: " . $item_name . "<br>";
    echo "Item Price: " . $item_price . "<br>";
    echo "Available Time: " . $item_available_time . "<br>";
    echo "Quantity: " . $item_quantity . "<br>";

    // Correct SQL query with proper handling of item details and image path
    $sql = "INSERT INTO `order` (username, student_id, number, image, name, price, available_time, quantity) 
            VALUES ('$username', '$student_id', '$number', '$image_upload_path', '$item_name', '$item_price', '$item_available_time', '$item_quantity')";

    if ($conn->query($sql) === TRUE) {
      echo "Record inserted successfully!";
      // Redirect to index.php
      header("Location: submit.php");
      exit(); // Make sure to exit after the redirect
    } else {
      echo "Error: " . $conn->error;
    }
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Form</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }

  .container {
    padding: 20px;
    max-width: 500px;
    margin: 40px auto;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
  }

  h2 {
    text-align: center;
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="time"],
  input[type="number"],
  input[type="file"] {
    width: 97%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    display: block;
    width: 100%;
  }

  .btn:hover {
    background-color: #0056b3;
  }

  .message {
    margin-top: 15px;
    text-align: center;
  }

  .success {
    color: green;
  }

  .error {
    color: red;
  }
  </style>
</head>

<body>
  <div class="container">
    <h2>Order Form</h2>
    <?php
    if (!empty($success)) {
      echo "<p class='message success'>$success</p>";
    }
    if (!empty($errors)) {
      foreach ($errors as $error) {
        echo "<p class='message error'>$error</p>";
      }
    }
    ?>
    <form action="details.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="form-group">
        <label for="student_id">Student ID</label>
        <input type="text" name="student_id" id="student_id" required>
      </div>
      <div class="form-group">
        <label for="number">Phone Number</label>
        <input type="text" name="number" id="number" required>
      </div>

      <!-- Item Details (Pre-filled) 
      <div class="form-group">
        <label for="image">Item Image</label>
        <input type="file" name="image" id="image" required>
      </div>-->
      <div class="form-group">
        <label for="name">Item Name</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($item_name); ?>" readonly>
      </div>
      <div class="form-group">
        <label for="price">Item Price</label>
        <input type="text" name="price" id="price" value="<?php echo htmlspecialchars($item_price); ?>" readonly>
      </div>
      <div class="form-group">
        <label for="available_time">Available Time</label>
        <input type="time" name="available_time" id="available_time"
          value="<?php echo htmlspecialchars($item_available_time); ?>" readonly>
      </div>
      <div class="form-group">
        <label for="quantity">Item Quantity</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($item_quantity); ?>"
          readonly>
      </div>

      <button type="submit" class="btn">Submit</button>
    </form>
  </div>
</body>

</html>