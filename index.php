<?php
// Include database connection
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

// Fetch available items from the database
$sql = "SELECT * FROM food";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Cafeteria</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Header -->
  <header>
    <div class="logo">CafeteriaHub</div>
    <nav>
      <ul class="nav-links">
        <li><a href="#menu">Menu</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <h1>Welcome to Our School Cafeteria</h1>
    <p>Fresh meals, great taste, and quick service await you!</p>
    <button> <a href="userdb.php"> View Menu </a></button>
  </section>

  <!-- Menu Section -->
  <section id="menu" class="menu">
    <h2>Available Meals</h2>
    <div class="section1">
      <div class="menu-grid">
        <?php
        // Check if any items are available in the database
        if ($result->num_rows > 0) {
          // Loop through each item and display it as a card
          while ($row = $result->fetch_assoc()) {
            $image_path = 'uploads' . $row['image']; // Ensure path is correct
            if (file_exists($image_path)) {
              echo "<div class='menu-item'>
                    <!--<img src='" . $image_path . "' alt='" . $row['name'] . "'>-->
                    <h3>" . $row['name'] . "</h3>
                    <p>Price: $" . $row['price'] . "</p>
                    <button><a href='userdb.php'>Order Now</a></button>
                  </div>";
            } else {
              // Fallback to default image if the file is not found
              echo "<div class='menu-item'>
                    <!--<img src='$['image]' alt='" . $row['name'] . "'>-->
                    <h3>" . $row['name'] . "</h3>
                    <p>Price: " . $row['price'] . "</p>
                    <button><a href='userdb.php'>Order Now</a></button>
                  </div>";
            }
          }
        } else {
          echo "<p>No menu items available</p>";
        }
        ?>
      </div>
    </div>

    <!-- SECTION 2 -->
    <div class="section2">
      <div class="menu-grid">
        <!-- Add more menu items here if needed -->
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer>
    <p>&copy; 2024 School Cafeteria. All Rights Reserved | <a href="#">Privacy Policy</a></p>
  </footer>
</body>

</html>