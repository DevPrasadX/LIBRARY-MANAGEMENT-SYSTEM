<link rel="stylesheet" type="text/css" href="err.css">

<?php
include('connection.php');
include('sessionhadle.php');
$Studentname= $_POST['studname'];
$name = $_POST['bookname'];
$id= $_POST['book_id'];
$ERPNO = $_POST['ERPID'];
$MAIL = $_POST['mailid'];
$ISSUEDATE = $_POST['issuedate'];

// Check if the book has already been issued to the student
$query = "SELECT * FROM issue_book WHERE erp='$ERPNO' AND return_date IS NULL";
$result = $conn->query($query);
if ($result->num_rows > 0) {
  // The book has already been issued to the student, redirect to returnbook.php
 // 
 setcookie('erp', $ERPNO, time() + 3600, "/"); // Set the ERP number as a cookie
  echo '
  <form method="POST" action="nav.php">
  <div class="container">
  <div class="err">
  BOOK ALREADY EXIST FOR ERP ';echo $ERPNO;
  echo'
  <button type="submit" name="sub">Head to Return Book</div> 
  </div>

  </div>
  </form>';
 

  
  exit();
}
else{
  
// The book has not been issued yet, insert a new record into the issue_book table
$sql="INSERT INTO issue_book (book_id,book_name, erp, issue_date,return_date,gmail,StudentName)VALUES ('$id','$name', '$ERPNO', '$ISSUEDATE',NULL,'$MAIL','$Studentname');";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location:Data.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}
// Close the database connection
$conn->close();
?>  