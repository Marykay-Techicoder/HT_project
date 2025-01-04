<?php
// register.php
session_start();

// Database connection
$server = "localhost";
$username = "root";
$password = "";
$database = "cafeteria";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $student_id = trim($_POST['student_id']);
  $name = trim($_POST['name']);
  $semester = trim($_POST['semester']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $passport = $_FILES['passport']['name'];

  // Validation for Student ID
  if (empty($student_id)) {
    $errors['student_id'] = "Student ID is required!";
  }

  // Validation for Name
  if (empty($name)) {
    $errors['name'] = "Full Name is required!";
  }

  // Validation for Semester
  if (empty($semester)) {
    $errors['semester'] = "Semester is required!";
  }

  // Validation for Email
  if (empty($email)) {
    $errors['email'] = "Email is required!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format!";
  }

  // Validation for Password
  if (empty($password)) {
    $errors['password'] = "Password is required!";
  } elseif (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters!";
  }

  // Check if the student ID or email already exists
  if (empty($errors)) {
    $check_query = "SELECT * FROM students WHERE student_id = ? OR email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $student_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $errors['duplicate'] = "Student ID or Email already exists!";
    } else {
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Handle file upload for passport
      if (!empty($passport)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["passport"]["name"]);
        move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file);
      }

      // Insert data into the database
      $insert_query = "INSERT INTO students (student_id, name, semester, email, password, passport) VALUES (?, ?, ?, ?, ?, ?)";
      $stmt = $conn->prepare($insert_query);
      $stmt->bind_param("ssssss", $student_id, $name, $semester, $email, $hashed_password, $passport);

      if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful!";
        header("Location: login.php");
        exit();
      } else {
        $errors['db'] = "Database error: " . $conn->error;
      }
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
  <title>Registration - School Cafeteria</title>
  <link rel="stylesheet" href="styles.css">
  <style>
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
    margin-bottom: 10px;
  }

  a {
    color: #2d6187;
    text-decoration: none;
  }

  a:hover {
    text-decoration: underline;
  }

  .registration-container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    padding: 20px;
    animation: fadeIn 1s ease-in-out;
  }

  .registration-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  input {
    padding: 9px;
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
    padding: 8px;
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
    background-color: #ffe0e0;
    padding: 8px;
    border-radius: 5px;
    margin-top: -15px;
    font-size: 14px;
  }

  .login-link {
    text-align: center;
    margin-top: 10px;
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(-30px);
    }

    100% {
      opacity: 1;
      transform: translateY();
    }
  }

  @media (max-width: 768px) {
    .registration-container {
      padding: 20px;
    }

    input,
    button {
      font-size: 14px;
    }
  }
  </style>
</head>

<body>
  <div class="registration-container">
    <form action="register.php" method="POST" enctype="multipart/form-data" class="registration-form">
      <h2>Register to Cafeteria</h2>

      <input type="text" name="student_id" placeholder="Student ID"
        value="<?php echo isset($student_id) ? $student_id : ''; ?>">
      <?php if (isset($errors['student_id'])) echo "<div class='error'>{$errors['student_id']}</div>"; ?>

      <input type="text" name="name" placeholder="Full Name" value="<?php echo isset($name) ? $name : ''; ?>">
      <?php if (isset($errors['name'])) echo "<div class='error'>{$errors['name']}</div>"; ?>

      <input type="text" name="semester" placeholder="Semester"
        value="<?php echo isset($semester) ? $semester : ''; ?>">
      <?php if (isset($errors['semester'])) echo "<div class='error'>{$errors['semester']}</div>"; ?>

      <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>">
      <?php if (isset($errors['email'])) echo "<div class='error'>{$errors['email']}</div>"; ?>

      <input type="password" name="password" placeholder="Password">
      <?php if (isset($errors['password'])) echo "<div class='error'>{$errors['password']}</div>"; ?>

      <input type="file" name="passport" accept="image/*">
      <?php if (isset($errors['duplicate'])) echo "<div class='error'>{$errors['duplicate']}</div>"; ?>

      <button type="submit">Register</button>

      <div class="login-link">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</body>

</html>