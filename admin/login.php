<?php
// login.php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username == "student" && $password == "password123") {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
  } else {
    $error_message = "Invalid Username or Password!";
  }
}
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
/* Global Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  background-color: #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

h2 {
  text-align: center;
  color: #2d6187;
  /* Blue from homepage */
  margin-bottom: 20px;
}

a {
  color: #2d6187;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

/* Login Form Styles */
.login-container {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  padding: 40px;
  animation: fadeIn 1s ease-in-out;
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
  /* Blue from homepage */
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #1d4570;
  /* Darker blue on hover */
}

.error {
  color: #ff4d4d;
  background-color: #ffe0e0;
  padding: 10px;
  border-radius: 5px;
  text-align: center;
}

/* Sign-up link */
.signup-link {
  text-align: center;
  margin-top: 20px;
}

/* Keyframe Animation for fading in */
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(-30px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive Styles */
@media (max-width: 768px) {
  .login-container {
    padding: 30px;
  }

  input,
  button {
    font-size: 14px;
  }
}
</style>

<body>
  <div class="login-container">
    <form action="login.php" method="POST" class="login-form">
      <h2>Login to Cafeteria</h2>
      <h5>Admin login</h5>
      <?php if (isset($error_message)) {
        echo "<div class='error'>$error_message</div>";
      } ?>
      <input type="text" name="username" placeholder="Enter Username" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit">Login</button>
      <div class="signup-link">
      </div>
    </form>
  </div>
</body>

</html>