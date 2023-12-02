
<?php
include('sessionhandle.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" type="text/css" href="navigation.css">
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DATAtable.css">
    <title>Document</title>
    <script>
        $(function() {
          $("#navbar").load("navigation.html");
        });
      </script>
</head>
<body>
<div id="navbar"></div>
<?php
include('connection.php');

$sql = "SELECT * FROM issue_book";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Sr. No.</th>
                <th>ERP</th>
                <th>Name</th>
                <th>Book Name</th>
                <th>Book ID</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>";
    $count = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $count . "</td>
                <td>" . $row["erp"] . "</td>
                <td>" . $row["StudentName"] . "</td>
                <td>" . $row["book_name"] . "</td>
                <td>" . $row["book_id"] . "</td>
                <td>" . $row["issue_date"] . "</td>
                <td>" . $row["return_date"] . "</td>
                <td>";
        // Check if book is returned or not
        if ($row["return_date"] == "0000-00-00" || $row["return_date"] == null) {
            echo "Not Returned";
        } else {
            echo "Returned";
        }
        echo "</td></tr>";
        $count++;
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

// Close database connection
$conn->close();
?>

</body>
</html>