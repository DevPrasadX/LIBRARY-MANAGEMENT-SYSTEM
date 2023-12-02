<?php
include("sessionhandle.php"); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="add.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <script src="jquery-3.6.0.min.js"></script>
</head>
<script>
    $(function() {
      $("#navbar").load("navigation.html");
    });
  </script>
   <div id="navbar"></div>
<body>

          <div class="container">
  <div class="form-container">
    <form method="POST" action="insertbook.php">
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="data" required>
      </div>
      <div>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author"class="data" required>
      </div>
      <div>
        <label for="bookid">Book ID:</label>
        <input type="number" id="bookid" name="bookid"class="data" required>
      </div>
      <div>
        <label for="copies">Copies:</label>
        <input type="number" id="copies" name="copies" class="data" required min="1">
      </div>
      <div>
        <label for="cost">Cost:</label>
        <input type="number" id="cost" name="cost"class="data" required>
      </div>
      <div>
        <button type="submit">Upload</button>
      </div>
    </form>


  </div>
  
  <div class="image-container">
    <img src="image/5836.jpg" alt="your-image-description">
  </div>
</div>


</body>

</html>
