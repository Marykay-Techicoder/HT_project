<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card with Checkbox</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    padding: 20px;
    text-align: center;
    position: relative;
  }

  .card h3 {
    margin-bottom: 10px;
    font-size: 1.5em;
  }

  .card p {
    margin-bottom: 15px;
    color: #666;
  }

  .checkbox-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
  }

  .checkbox-container input[type="checkbox"] {
    margin-right: 10px;
    width: 20px;
    height: 20px;
    cursor: pointer;
  }

  .checkbox-container label {
    font-size: 1em;
    color: #333;
    cursor: pointer;
  }

  .card button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    margin-top: 15px;
  }

  .card button:hover {
    background-color: #0056b3;
  }

  /* Success mark styles */
  .success-mark {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 2em;
    color: #28a745;
    display: none;
  }

  .card.success .success-mark {
    display: block;
  }
  </style>
</head>

<body>
  <div class="card" id="orderCard">
    <div class="success-mark">✔️</div>
    <h3>Order Confirmation</h3>
    <p>Thank you for your order! Please agree to the terms to proceed.</p>
    <div class="checkbox-container">
      <input type="checkbox" id="cardCheckbox" onclick="toggleSuccess()">
      <label for="cardCheckbox">I agree to the terms</label>
    </div>
    <a href="index.php"><button onclick="submitOrder()">Submit</button></a>
  </div>

  <script>
  // Function to toggle the success mark
  function toggleSuccess() {
    const card = document.getElementById('orderCard');
    const checkbox = document.getElementById('cardCheckbox');
    if (checkbox.checked) {
      card.classList.add('success');
    } else {
      card.classList.remove('success');
    }
  }

  // Function to handle the submit button click
  function submitOrder() {
    const checkbox = document.getElementById('cardCheckbox');
    if (checkbox.checked) {
      alert("Your order has been successfully submitted!");
    } else {
      alert("Please agree to the terms before submitting.");
    }
  }
  </script>
</body>

</html>