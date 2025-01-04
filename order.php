<?php
// Start session (if necessary)
session_start();

// Initialize an array to store error messages
$errors = [];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST['username'];
  $student_id = $_POST['student_id'];
  $number = $_POST['number'];
  $name = $_POST['name'];
  $price = $_POST['price'];  // Price comes as a string
  $available_time = $_POST['available_time'];
  $quantity = $_POST['quantity'];

  // Validate form fields
  if (empty($username)) {
    $errors[] = "Username is required.";
  }
  if (empty($student_id)) {
    $errors[] = "Student ID is required.";
  }
  if (empty($number) || !preg_match("/^[0-9]{11}$/", $number)) {
    $errors[] = "Valid contact number is required (10 digits).";
  }
  if (empty($name)) {
    $errors[] = "Item name is required.";
  }
  if (empty($price) || !is_numeric($price)) {
    $errors[] = "Valid item price is required.";
  }
  if (empty($available_time)) {
    $errors[] = "Available time is required.";
  }
  if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
    $errors[] = "Quantity should be a positive number.";
  }

  // Handle image upload
  $image = $_FILES['image']['name'];
  $target_dir = "uploads";
  $target_file = $target_dir . basename($image);

  // Check if file is a valid image
  $check = getimagesize($_FILES['image']['tmp_name']);
  if ($check === false) {
    $errors[] = "File is not an image.";
  }

  // Check if file upload was successful
  if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    $errors[] = "There was an error uploading the image.";
  }

  // Move the uploaded file to the target directory if no errors
  if (empty($errors)) {
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
      $errors[] = "Sorry, there was an error uploading your file.";
    }
  }

  // If no errors, proceed with inserting data into the database
  if (empty($errors)) {
    // Database connection
    $server = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "cafeteria";

    $conn = new mysqli($server, $username_db, $password_db, $database);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO `order` (username, student_id, number, name, price, available_time, image, quantity, created_at) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if ($stmt === false) {
      $errors[] = "Error preparing statement: " . $conn->error;
    } else {
      // Ensure price is a float for the database (since it's numeric)
      $price = (float)$price;

      // Bind parameters to the prepared statement
      $stmt->bind_param("ssssdssi", $username, $student_id, $number, $name, $price, $available_time, $image, $quantity);

      // Execute the prepared statement
      if ($stmt->execute()) {
        // Success, redirect to index.php after displaying success message
        echo "Booking placed successfully!";
        header("Location: Submit.php"); // Redirect after successful submission
        exit(); // Ensure the script stops after redirect
      } else {
        $errors[] = "Error executing statement: " . $stmt->error;
      }

      // Close the statement
      $stmt->close();
    }

    // Close the connection
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personalized Booking</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
  }

  .form-container {
    max-width: 600px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .form-container h2 {
    text-align: center;
  }

  .form-container input,
  .form-container select,
  .form-container button {
    width: 95%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .form-container button {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
  }

  .form-container button:hover {
    background-color: #45a049;
  }

  .error {
    color: red;
    font-size: 14px;
    margin-top: 10px;
  }
  </style>
</head>

<body>

  <div class="form-container">
    <h2>Personalized Booking Form</h2>

    <?php
    // Display error messages if validation fails
    if (!empty($errors)) {
      echo "<div class='error'>";
      foreach ($errors as $error) {
        echo "<p>$error</p>";
      }
      echo "</div>";
    }
    ?>

    <form action="order.php" method="POST" enctype="multipart/form-data">
      <!-- User Inputs -->
      <input type="text" name="username" placeholder="Username" value="<?php echo isset($username) ? $username : ''; ?>"
        required>
      <input type="text" name="student_id" placeholder="Student ID"
        value="<?php echo isset($student_id) ? $student_id : ''; ?>" required>
      <input type="text" name="number" placeholder="Contact Number" value="<?php echo isset($number) ? $number : ''; ?>"
        required>

      <!-- Item Details -->
      <input type="text" name="name" placeholder="Item Name" value="<?php echo isset($name) ? $name : ''; ?>" required>
      <input type="text" name="price" placeholder="Item Price" value="<?php echo isset($price) ? $price : ''; ?>"
        required>
      <input type="time" name="available_time" placeholder="Available Time"
        value="<?php echo isset($available_time) ? $available_time : ''; ?>" required>
      <input type="number" name="quantity" placeholder="Quantity"
        value="<?php echo isset($quantity) ? $quantity : ''; ?>">

      <!-- Image Upload -->
      <input type="file" name="image" accept="image/*" required>

      <!-- Submit Button -->
      <button type="submit">Submit Booking</button>
    </form>
  </div>

</body>

</html>