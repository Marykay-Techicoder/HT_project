 <?php
  // Start session
  session_start();

  // Database connection
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "cafeteria";

  $conn = new mysqli($server, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $error = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validation
    if (empty($email) || empty($password)) {
      $error = "Both fields are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "Invalid email format!";
    } else {
      // Check if the email exists in the database
      $sql = "SELECT * FROM students WHERE email = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
          // Set session variables
          $_SESSION['student_id'] = $user['student_id'];
          $_SESSION['name'] = $user['name'];
          $_SESSION['email'] = $user['email'];

          // Redirect to dashboard or home
          header("Location: index.php");
          exit();
        } else {
          $error = "Incorrect password!";
        }
      } else {
        $error = "No account found with this email!";
      }

      $stmt->close();
    }
  }

  $conn->close();
  ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - School Cafeteria</title>
   <link rel="stylesheet" href="styles.css">
 </head>
 <style>
/* General Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

h2 {
  color: #2d6187;
  text-align: center;
  margin-bottom: 20px;
}

/* Login Form Styles */
.login-container {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 40px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

input {
  padding: 15px;
  font-size: 16px;
  border: 1px solid #ddd;
  border-radius: 5px;
  outline: none;
  transition: all 0.3s ease;
}

input:focus {
  border-color: #2d6187;
}

button {
  padding: 15px;
  background-color: #2d6187;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #1d4570;
}

.error {
  color: #ff4d4d;
  font-size: 14px;
  margin-top: -10px;
}

.register-link {
  text-align: center;
  margin-top: 20px;
}

.register-link a {
  color: #2d6187;
  text-decoration: none;
  font-weight: bold;
}
 </style>

 <body>
   <div class="login-container">
     <form action="login.php" method="POST" class="login-form">
       <h2>Login to Cafeteria</h2>

       <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

       <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>">
       <input type="password" name="password" placeholder="Password">
       <button type="submit">Login</button>

       <div class="register-link">
         <p>Don't have an account? <a href="register.php">Register</a></p>
       </div>
     </form>
   </div>
 </body>

 </html>