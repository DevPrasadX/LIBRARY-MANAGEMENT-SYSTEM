<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <link rel="stylesheet" type="text/css" href="issue.css">
    <script src="jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<script>
    $(function() {
      $("#navbar").load("navigation.html");
    });
  </script>
<body>
  <?php
  include('sessionhandle.php');
  ?>
        <div id="navbar"></div>
        <div class="grid-container">
        <form method="POST" action="issue.php">

            <div>
              <label for="name">Name:</label>
              <input type="text" id="studname" name="studname">
            </div>

            <div>
              <label for="erp">ERP ID:</label>
              <input type="number" id="ERP" name="ERPID">
            </div>
            <div>
              <label for="mail">Email ID:</label>
              <input type="email" id="EMAILID" name="mailid">
            </div>
            <div>
              <label for="name">Book Name :</label>
              <input type="text" id="bookname" name="bookname">
            </div>
            <div>
              <label for="name">Book ID :</label>
              <input type="number" id="book_id" name="book_id">
            </div>
            <div>
              <label for="ISSUEDATE">Issue Date</label>
              <input type="date" id="ISSUEDATE" name="issuedate">
            </div>
            
            <div>
              <input type="submit" value="Issue Book"></button>
            </div>
        </form>
        <div class="image-container">
          <img src="image/6888606.jpg" alt="your-image-description">
        </div>
</div>


</body>
</html>