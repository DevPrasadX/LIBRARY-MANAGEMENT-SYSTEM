<?php 
include('connection.php');
include('sessionhandle.php');
if (isset($_POST['update'])) {
  // Get the updated return date from form
  $return_date = $_POST['returndate'];
 
  $erp = $_POST['hidden_erpnum']; // changed from 'erp' to 'hidden_erpnum'
  $return_date_sql = "$return_date";


  $sql = "UPDATE issue_book SET return_date='$return_date_sql' WHERE erp='$erp'";
  if ($conn->query($sql) === TRUE) {
    echo "<p>Return date updated successfully!</p>";
  } else {
    echo "<p>Error updating return date: " . $conn->error . "</p>";
  }
}
?>