<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <!-- Add Item Form (Initially Hidden) -->
  <div id="addItemForm" class="add-item-form hidden">
    <form action="add_items.php" method="POST" enctype="multipart/form-data">
      <?php if (!empty($errors)) {
        echo "<div class='error'>" . implode("<br>", $errors) . "</div>";
      } ?>
      <input type="text" name="item_name" placeholder="Item Name" required>
      <input type="text" name="item_price" placeholder="Item Price" required>
      <input type="time" name="available_time" placeholder="Availability Time" required>
      <input type="number" name="quantity" placeholder="Quantity Available" required>
      <input type="file" name="item_image" accept="image/*" required>
      <button type="submit">Add Item</button>
    </form>
  </div>
</body>

</html>