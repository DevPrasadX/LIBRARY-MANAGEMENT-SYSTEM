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
</head>
<script>
$(function() {
      $("#navbar").load("navigation.html");
    });
  
</script>
<div id="navbar"></div>
<body>
<div class="input-group">
<link rel="stylesheet" type="text/css" href="Home.css">
<form method="POST" action="Home.php" style="width:100%;">
  <div style="display: flex; justify-content: center;">
    <div style="width: 100%;">
      <input type="search" name="search_data" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="width: 100%;" />
    </div>
    <div>
      <button type="submit" class="btn btn-outline-primary" name="submit">Search</button>
    </div>
  </div>
</form>
</div>
<?php
include('connection.php');


// retrieve book details from database
if(isset($_POST["submit"])) {
    $search_query = $_POST["search_data"];
    $sql = "SELECT * FROM NewBook WHERE name LIKE '%$search_query%' OR author LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM NewBook";
}
$result = $conn->query($sql);

// display book details in table
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="box">';
        echo '<div class="image">';
        echo '<img src="image/mdi_book.svg" alt="your-image-description">';
        echo '</div>';
        echo '<div class="data">';
        echo '<table>';
        echo '<tr>';
        echo '<td>NAME</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>AUTHOR</td>';
        echo '<td>' . $row["author"] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>COST</td>';
        echo '<td>' . $row["cost"] . '</td>';
        echo '</tr>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No books found.";
}

// close database connection
mysqli_close($conn);
?>

</body>
</html>
