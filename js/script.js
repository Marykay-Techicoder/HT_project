function validateForm() {
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const message = document.getElementById("message").value;
  let isValid = true;

  if (!email || !message) {
    alert("Email and message fields are required.");
    isValid = false;
  }

  return isValid;
}

document.getElementById("messageForm").onsubmit = function () {
  setTimeout(function () {
    document.getElementById("successMessage").style.display = "block";
    setTimeout(function () {
      document.getElementById("successMessage").style.display = "none";
    }, 3000); // Hide the success message after 3 seconds
  }, 1000); // Simulate a short delay for submission
};
