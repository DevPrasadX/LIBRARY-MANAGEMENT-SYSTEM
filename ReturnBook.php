<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="return.css">
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <script src="jquery-3.6.0.min.js"></script>
    
    <title>Document</title>
    <script>
        $(function() {
          $("#navbar").load("navigation.html");
        });
      </script>
</head>
<body>
    <div id="navbar"></div>
    <div class="grid-container">
        <form method="POST" action="ReturnBook.php">
        <div class="image-container">
          <img src="image/6888606.jpg" alt="your-image-description">
        </div>
        <div>
          <label for="name">ERP ID</label>
          <input type="number" id="name" name="erp" <?php if(isset($_POST['verify'])) echo "value='".$_POST['erp']."' disabled"; else if(isset($_COOKIE['erp'])) echo "value='".$_COOKIE['erp']."'"; ?>>
        </div>
      
        <div>
              <button type="submit" class="ver" name="verify">VERIFY</button>
            </div>
        </form>
        <?php
include('connection.php');
include('sessionhandle.php');

if (isset($_POST['verify'])) {
  // Get the return date from form

  // Check if ERP ID and name have a registered book in the database
  $erp = $_POST['erp'];

  $sql = "SELECT * FROM issue_book WHERE erp = '$erp'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<script>
          $(document).ready(function() {
              $('.ver').hide();
          });
      </script>";
      // Display the book details and form to update return date
      $row = $result->fetch_assoc();
      $book_name = $row['book_name'];
      $book_id = $row['book_id'];
      $issued_date = $row['issue_date'];
 

     echo "
      <form method='POST' action='updatedate.php' >
       
        <div style: 'left:0;'>
          <label for='book_name'>BOOK NAME</label>
          <input type='text' id='book_name' name='book_name' value='$book_name' disabled>
        </div>
        <div>
          <label for='book_id'>BOOK ID</label>
          <input type='text' id='book_id' name='book_id' value='$book_id' disabled>
        </div>
        <div>
          <label for='issued_date'>ISSUED ON</label>
          <input type='text' id='issued_date' name='issued_date' value='$issued_date' disabled>
        </div>
        <div>
          <label for='return_date'>Return Date:</label>
          <input type='date' id='return_date' name='returndate'>
        </div>
        <div>
      
        <input type='hidden' name='hidden_erpnum' value='$erp'>
          <button type='submit' name='update'>Update Return Date</button>
        </div>
        <div>  
        </div>
      </div>
      
    </form>";
         
          
  } else {
      // Display error message if no book found
      echo "<p>No book found with given ERP ID and name.</p>";
  }

  // Close

}

// Close database connection
$conn->close();
?>

    </div>
</body>
</html>