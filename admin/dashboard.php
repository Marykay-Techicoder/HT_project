<?php
// Start session
session_start();

// Check if admin is logged in

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Cafeteria</title>
  <style>
  /* General Styles */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
  }

  .admin-dashboard-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }

  .admin-header {
    background-color: #2d6187;
    color: #fff;
    padding: 20px;
    width: 100%;
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .admin-header h1 {
    margin: 0;
  }

  .logout-btn {
    background-color: #ff4d4d;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
  }

  .logout-btn:hover {
    background-color: #cc0000;
  }

  .admin-main {
    margin-top: 40px;
    width: 100%;
    max-width: 600px;
  }

  .dashboard-links {
    display: flex;
    justify-content: center;
    /* Center the cards horizontally */
    gap: 40px;
    /* Add more spacing between cards */
    margin-top: 50px;
    /* Adjust top margin for better spacing */
    flex-wrap: wrap;
    /* Ensure cards wrap on smaller screens */
  }

  .dashboard-link {
    background-color: #ffffff;
    color: #2d6187;
    padding: 70px;
    /* Increase padding for larger cards */
    text-align: center;
    text-decoration: none;
    font-size: 24px;
    /* Larger font size */
    font-weight: bold;
    border-radius: 15px;
    /* Slightly larger border-radius */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    /* Slightly stronger shadow */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    flex: 1;
    max-width: 350px;
    /* Set larger maximum width for cards */
    min-width: 250px;
    /* Ensure minimum size */
  }

  .dashboard-link:hover {
    transform: scale(1.1);
    /* Enhance hover effect */
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
  }
  </style>
</head>

<body>
  <div class="admin-dashboard-container">
    <header class="admin-header">
      <h1>Welcome, Admin</h1>
      <a href="admin_logout.php" class="logout-btn">Logout</a>
    </header>

    <main class="admin-main">
      <div class="dashboard-links">
        <a href="add.php" class="dashboard-link">
          <h3>Add Food Items</h3>
        </a>
        <a href="book.php" class="dashboard-link">
          <h3>View Bookings</h3>
        </a>
      </div>
    </main>
  </div>
</body>

</html>