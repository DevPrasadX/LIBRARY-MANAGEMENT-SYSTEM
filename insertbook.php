<?php
    include('connection.php');
    include('sessionhandle.php');
    $name = $_POST['name'];
    $author = $_POST['author'];
    $bookid = $_POST['bookid'];
    $copies = $_POST['copies'];
    $cost = $_POST['cost'];

    // Prepare the SQL statement
    $sql = "INSERT INTO NewBook (name, author, copies, cost, bookid) VALUES ('$name', '$author', '$copies', '$cost', '$bookid')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
?>
