<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Basic validation
  if (empty($email) || empty($message)) {
    echo "Email and message are required!";
    exit;
  }

  // Send email (simplified)
  $to = "akinyodemary4@gmail.com";
  $subject = "Message from $name";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Failed to send message.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - School Cafeteria</title>

  <script src="js/script.js" defer></script>
</head>
<style>
/* nav bar*/
a {
  text-decoration: none;
}

ul {
  list-style: none;
}

/* Nav-bar Styling */
nav-bar {
  background: #2d6187;
  color: #fff;
  padding: 20px 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  font-size: 1.8rem;
  font-weight: bold;
}

.nav-links {
  display: flex;
  gap: 20px;
}

.nav-links a {
  color: #fff;
  font-weight: 500;
  padding: 8px 12px;
  transition: background 0.3s;
}

.nav-links a:hover {
  background: #1a3955;
  border-radius: 5px;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f8fb;
  margin: 0;
  padding: 0;
  color: #333;
}

header {
  background: linear-gradient(rgba(45, 97, 135, 0.9), rgba(0, 0, 0, 0.5)),
    url("https://via.placeholder.com") no-repeat center/cover;
  color: #fff;
  padding: 20px;
  text-align: center;
}

h1 {
  font-size: 2.5em;
}

.form-container {
  background-color: white;
  padding: 20px;
  margin: 20px auto;
  width: 80%;
  max-width: 600px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
  font-weight: bold;
  margin-top: 10px;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

textarea {
  height: 100px;
  resize: vertical;
}

button {
  background-color: #2d6187;
  color: white;
  border: none;
  padding: 10px;
  width: 100%;
  margin-top: 10px;
  cursor: pointer;
  border-radius: 4px;
}

button:hover {
  background-color: #45a049;
}

#successMessage {
  display: none;
  padding: 10px;
  background-color: #2d6187;
  color: white;
  margin-top: 20px;
  text-align: center;
  border-radius: 4px;
}

.hidden {
  display: none;
}

.check-mark {
  font-size: 20px;
}

#social-media ul {
  list-style-type: none;
  padding: 0;
}

#social-media ul li {
  display: inline;
  margin: 10px;
}

#social-media ul li img {
  width: 50px;
  height: 50px;
}

footer {
  text-align: center;
  padding: 20px;
  background-color: #2d6187;
  color: white;
}
</style>

<body>
  <nav-bar>
    <div class="logo">CafeteriaHub</div>
    <nav>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </nav-bar>
  <header>
    <h1>Contact the School Cafeteria</h1>
  </header>

  <section id="contact-form">
    <div class="form-container">
      <h2>Send Us a Message</h2>
      <form id="messageForm" action="" method="POST" onsubmit="return validateForm()">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name">

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email">

        <label for="message">Your Message:</label>
        <textarea id="message" name="message" placeholder="Write your message here..."></textarea>

        <button type="submit" id="submitMessage">Send Message</button>
      </form>
      <div id="successMessage" class="hidden">
        <p>Message sent successfully! <span class="check-mark">✔️</span></p>
      </div>
    </div>
  </section>

  <section id="email-section">
    <div class="form-container">
      <h2>Contact via Email</h2>
      <p>For urgent inquiries, you can also email us directly at:</p>
      <a href="mailto:akinyodemary@gmail.com" class="email-link">cafeteria@example.com</a>
    </div>
  </section>

  <section id="social-media">
    <div class="form-container">
      <h2>Follow Us on Social Media</h2>
      <ul>
        <li><a href="https://facebook.com/schoolcafeteria" target="_blank"><img src="image/facebook.avif"
              alt="Facebook"></a></li>
        <li><a href="https://instagram.com/schoolcafeteria" target="_blank"><img src="image/instagram-icon.avif"
              alt="Instagram"></a></li>
        <li><a href="https://whatsapp.com/schoolcafeteria" target="_blank"><img src="image/whatsapp-logo.avif"
              alt="Instagram"></a></li>
        <li><a href="https://twitter.com/schoolcafeteria" target="_blank"><img src="image/twitter.avif"
              alt="Twitter"></a>
        </li>
      </ul>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 School Cafeteria</p>
  </footer>
</body>

</html>